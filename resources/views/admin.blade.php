@extends('layout')

@section('title', 'Admin')

@section('content')
<!-- Add the custom CSS section -->


<div class="container-com">
    <div class="row">
        <div class="col-md-4">
            <!-- Left side with fingerprint image and scan button -->
            <div class="fingerprint-container">
                <img src="/image/159470802-jurist-avatar-icon-flat-style.webp" alt="Fingerprint" class="fingerprint-img">
                <span style="color: #fff; font-size:30px; margin:25px 0;">Bạn đang truy cập dưới quyền Admin</span>
                <!-- <button class="btn btn-success scan-button" onclick="routeToScan()">Quét</button> -->
            </div>
        </div>
        <div class="col-md-8">
            <!-- Right side with the table -->
            <div style="display: flex;">
                <h1 class="mt-5 table-title">Danh sách nhân viên</h1>
                <div class="input-group" style="display: flex; height:fit-content; width:300px; margin-top:60px; margin-left:200px">
                    <input type="text" class="form-control" placeholder="Nhập từ khóa..." id="searchInput">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="searchButton">
                            <i class="fa fa-search"></i> <!-- Sử dụng icon search của Bootstrap -->
                        </button>
                    </div>
                </div>
            </div>


            <div class="table-responsive mt-4">
                <table class="table table-bordered custom-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>
                                <div style="display:flex;">
                                    Tên nhân viên
                                    <div style="display:flex; padding-left:10px; flex-direction: column;">
                                        <a href="?sort_by=maNV&sort_order=asc" style="height:6px;"><i class="fa fa-sort-up"></i></a>
                                        <a href="?sort_by=maNV&sort_order=desc" style="height:6px;"><i class="fa fa-sort-down"></i></a>
                                    </div>
                                </div>


                            </th>
                            <th>
                                <div style="display:flex;">
                                    Mã nhân viên
                                    <div style="display:flex; padding-left:10px; flex-direction: column;">
                                        <a href="?sort_by=name&sort_order=asc" style="height:6px;"><i class="fa fa-sort-up"></i></a>
                                        <a href="?sort_by=name&sort_order=desc" style="height:6px;"><i class="fa fa-sort-down"></i></a>

                                    </div>
                                </div>
                            </th>
                            <th>Email</th>
                            <th>Ngày tạo tài khoản</th>
                            <!-- Add more table headers for other attributes as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)

                        <tr>
                            <td>{{ $user->id }}</td>
                            <td> <a href="/user?user_id={{ $user->id }}">{{ $user->maNV }} </a></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
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

    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');

    searchButton.addEventListener('click', function() {
        const keyword = searchInput.value.trim();
        if (keyword) {
            window.location.href = '/admin?search=' + encodeURIComponent(keyword);
        }else{
            window.location.href = '/admin'
        }
    });
</script>
@endsection