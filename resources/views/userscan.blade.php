@extends('layout')

@section('title', 'Dashboard')

@section('content')
<!-- Add the custom CSS section -->


<div class="container-com">
    <div class="row">
        <div class="col-md-12" style="text-align: left; ">
            <h2 class='scan-title' style="margin:50px 0; margin-left:500px; font-size: 30px;">Thiết lập vân tay cho nhân viên: {{ $user->name }} <br/> Mã nhân viên: {{$user->maNV}}</h2>

            <div class="fingerprint-container" style="display: flex; margin:auto">
                <form action="/user/scan/save" enctype="multipart/form-data" method='post'>
                    @csrf
                    <!-- Thẻ img để hiển thị ảnh đã tải lên -->
                    <img id="preview-image" src="/image/image.jpg" alt="Fingerprint" class="fingerprint-img">
                    <br>
                    <!-- Thẻ input tải ảnh lên -->
                    <input type="file" accept="image/*" placeholder="quét vân tay" name='url' id='url' style="margin:auto; margin-top:30px; align-items:center; color:#fff; opacity:0;">
                    <br>

                    <!-- Nút Quét để hiển thị ảnh đã tải lên -->
                    <input type="hidden" name='id' value="{{ $user->id }}"/>
                    <br>
                    <button class="btn btn-success scan-button-2" type="submit" style="margin-top:30px;">Quét</button>
                </form>
            </div>
        </div>

        <button class="btn btn-outline-light scan-button-2 mt-2" onclick="backToHome()">Trở về</button>
    </div>

    <script>
        var imageSrc = null;

        function backToHome() {
            window.history.back();
        }

        function uploadImage() {
            const fileInput = document.getElementById('url');
            const file = fileInput.files[0];

            if (!file) {
                alert('Please select an image file.');
                return;
            }

            const formData = new FormData();
            formData.append('image', file);
    
        }
        document.getElementById('url').addEventListener('change', function(event) {
            if (event.target.files && event.target.files[0]) {
                const file = event.target.files[0];
                const tempUrl = URL.createObjectURL(file);
                document.getElementById('preview-image').src = tempUrl;
            }
        });
    </script>

</div>
@endsection