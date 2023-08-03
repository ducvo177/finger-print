@extends('layout')

@section('title', 'User')

@section('content')

<div class="container-com">
    <div class="row">
        <div class="col-md-5">
            <div class="fingerprint-container">
                <form action="{{route('user-update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <img src="{{ asset($user->avatar) }}" alt="avatar" class="avatar-img" id="avatarPreview">
                    <br />
                    <input type="file" name="avatar" style="color: #fff; margin:10px 0;" id="avatarInput" onchange="previewAvatar()">

                    <div style="text-align: left; margin-left: 100px; font-size: 18px; color: #fff;">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="route" value="admin">
                        <input type="hidden" name="avatar" value="{{$user->avatar}}">
                        <div style="display: flex;">
                            <div class="update-text"><strong>Mã Nhân Viên:</strong> </div><input type="text" name="maNV" class="update-input" value="{{ $user->maNV }}">
                        </div>
                        <div style="display: flex;">
                            <div class="update-text"> <strong>Nhân viên:</strong> </div><input type="text" name="name" class="update-input" value="{{ $user->name }}">
                        </div>
                        <div style="display: flex;">
                            <div class="update-text"><strong>Email:</strong> </div><input type="email" name="email" class="update-input" value="{{ $user->email }}">
                        </div>
                        <div style="display: flex;">
                            <div class="update-text"><strong>Địa chỉ:</strong></div> <input type="text" name="address" class="update-input" value="{{ $user->address }}">
                        </div>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-success scan-button">Cập Nhật</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div>
                <h1 class=" table-title" style="font-size:24px;">Dữ liệu chấm công của nhân viên</h1>
                <div id="calendar" style="width:700px; background-color: #fff; border-radius: 10px;"></div>
                <diV style="display: flex;">
                    <button class="btn btn-light" style="margin-top:30px; width:200px; margin-left:150px" onclick="routeBack()">Back</button>
                    <button class="btn btn-danger" style="margin-top:30px; width:200px; margin-left:20px" onclick="routeToScan()">Thêm dấu vân tay cho nhân viên</button>
                </diV>

            </div>

        </div>
    </div>
</div>
</div>

<script>
    function routeBack() {
        window.location.href = '/admin';
    }

    function routeToScan() {
        var user_id = <?php echo $user->id; ?>;
        window.location.href = '/user/scan?user_id=' + user_id;
    }

    function previewAvatar() {
        var fileInput = document.getElementById('avatarInput');
        var imagePreview = document.getElementById('avatarPreview');
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            imagePreview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {

        const events = @json($fingerscanData);

        const uniqueDates = Array.from(new Set(events.map((fingerscan) => fingerscan.date)));


        const formattedEvents = uniqueDates.map((date) => {
            return {
                title: 'Đã chấm công',
                start: date,
                color: 'green'
            };
        });

        $('#calendar').fullCalendar({
            defaultView: 'month',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: '',
            },
            dayRender: function(date, cell) {
                const dateString = date.format('YYYY-MM-DD');
                if (uniqueDates.includes(dateString)) {
                    cell.css('background-color', 'green');
                }
            },
            events: formattedEvents,
        });
    });
</script>
@endsection