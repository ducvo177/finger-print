@extends('layout')

@section('title', 'Dashboard')

@section('content')
<!-- Add the custom CSS section -->


<div class="container-com">
    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            <h2 class='scan-title' style="margin:50px 0; font-size: 30px;">Đặt tay vào thiết bị quét vân tay</h2>

            <div class="fingerprint-container" style="display: flex; margin:auto">
                <form action="/scan/check" enctype="multipart/form-data" method='post'>
                    @csrf
                    <!-- Thẻ img để hiển thị ảnh đã tải lên -->
                    <img id="preview-image" src="/image/image.jpg" alt="Fingerprint" class="fingerprint-img">
                    <br>
                    <!-- Thẻ input tải ảnh lên -->
                    <input type="file" accept="image/*" placeholder="quét vân tay" name='url' id='url' style="margin:auto; margin-top:30px; align-items:center; color:#fff; opacity:0;">
                    <br>
                    <input type='hidden' name='isCorrect' id='isCorrect' value='0'/>
                    <br>
                    <button class="btn btn-success scan-button-2" type="submit" style="margin-top:30px;">Chấm công</button>
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
            formData.append('user_id',<?php echo $userId; ?>)
            // Gửi ảnh lên phía server để kiểm tra
            // fetch('/fingerprints/check', {
            //         method: 'POST',
            //         body: formData
            //     })
            //     .then(response => response.json())
            //     .then(data => {
            //         document.getElementById('isCorrect').value = data.isCorrect;
            //     })
            //     .catch(error => {
            //         console.error('Error:', error);
            //     });
        }
        document.getElementById('url').addEventListener('change', function(event) {
            uploadImage()
            if (event.target.files && event.target.files[0]) {
                const file = event.target.files[0];
                const tempUrl = URL.createObjectURL(file);
                document.getElementById('preview-image').src = tempUrl;
            }
        });
    </script>

</div>
@endsection