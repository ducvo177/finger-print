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
                <h1 class="mt-5 table-title">Dữ liệu các lần quét</h1>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered custom-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Tên nhân viên</th>
                                <th>Ngày quét</th>
                                <th>Máy quét vân tay số</th>
                                <!-- Add more table headers for other attributes as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fingerscanData as $fingerscan)
                            <tr>
                                <td>{{ $fingerscan->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ date('d/m/Y', strtotime($fingerscan->date)) }}</td>
                                <td>{{ $fingerscan->scanmachine_id }}</td>
                               
                                <!-- Add more table cells for other attributes as needed -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function routeToScan() {
            window.location.href = '/scan';
        }
    </script>
@endsection

