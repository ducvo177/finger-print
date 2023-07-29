@extends('layout')

@section('title', 'Dashboard')

@section('content')
<!-- Add the custom CSS section -->

<div class="container-com">
    <div class="row">
        <div class="col-md-4">
            <!-- Left side with fingerprint image and scan button -->
            <div class="fingerprint-container">
                <img src="/image/image.jpg" alt="Fingerprint" class="fingerprint-img">
                <button class="btn btn-success scan-button" onclick="routeToScan()">Quét</button>
            </div>
        </div>
        <div class="col-md-8">
            <!-- Right side with the table -->
            <h1 class=" table-title" style="font-size:24px;">Dữ liệu các lần quét</h1>
            <!-- Add a new <div> to hold the calendar -->
            <div id="calendar" style="width:700px; background-color: #fff; border-radius: 10px;" ></div>
        </div>
    </div>
</div>
</div>

<script>
    // Your existing JavaScript code
    function routeToScan() {
        window.location.href = '/scan';
    }

    // Create a calendar using FullCalendar
    document.addEventListener('DOMContentLoaded', function() {
        // Parse the $fingerscanData to get events for the calendar
        const events = @json($fingerscanData);

        const uniqueDates = Array.from(new Set(events.map((fingerscan) => fingerscan.date)));

        // Map the unique dates to the format required by FullCalendar
        const formattedEvents = uniqueDates.map((date) => {
            return {
                title: 'Đã chấm công',
                start: date,
                color:'green'
            };
        });

        // Initialize FullCalendar
        $('#calendar').fullCalendar({
            defaultView: 'month',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: '',
            },
            dayRender: function (date, cell) {
                const dateString = date.format('YYYY-MM-DD');
                if (uniqueDates.includes(dateString)) {
                    cell.css('background-color', 'green');
                }
            },
            events: formattedEvents, // Set the events to be displayed on the calendar
        });
    });
</script>
@endsection