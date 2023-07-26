@extends('layout')

@section('title', 'Dashboard')

@section('content')
<!-- Add the custom CSS section -->


<div class="container-com">
    <div class="row">
        <div class="col-md-6">
            <h2 class='scan-title'>Đặt tay vào thiết bị quét vân tay</h2>
            <!-- Left side with fingerprint image and scan button -->
            <div class="fingerprint-container" style="display: flex;">
                <img src="/image/image.jpg" alt="Fingerprint" class="fingerprint-img">
                <button class="btn btn-success scan-button-2">Quét</button>
                
            </div>
        </div>
        <div class="col-md-6">
        <h2 class='scan-title'>Vân tay sau xử lý</h2>
        <canvas id="skeletonCanvas" class="fingerprint-img" style="margin:90px 0;"></canvas>
        </div>
    </div>

    <script>
        // Tạo hàm để vẽ ảnh skeleton
        function drawSkeletonImage() {
            // Đường dẫn đến ảnh vân tay gốc
            const imageSrc = "/image/image.jpg";
            const img = new Image();
            img.src = imageSrc;

            // Đợi cho ảnh tải hoàn thành
            img.onload = function() {
                const canvas = document.getElementById("skeletonCanvas");
                const ctx = canvas.getContext("2d");

                // Đặt kích thước canvas bằng kích thước ảnh
                canvas.width = img.width;
                canvas.height = img.height;

                // Vẽ ảnh gốc lên canvas
                ctx.drawImage(img, 0, 0);

                // Lấy dữ liệu pixel từ ảnh
                const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                const data = imageData.data;

                // Xử lý dữ liệu pixel để biến ảnh thành dạng skeleton
                for (let i = 0; i < data.length; i += 4) {
                    // Lấy giá trị mức xám trung bình của pixel (R + G + B) / 3
                    const gray = (data[i] + data[i + 1] + data[i + 2]) / 3;

                    // Thiết lập các kênh màu R, G, B của pixel thành mức xám
                    data[i] = gray; // R
                    data[i + 1] = gray; // G
                    data[i + 2] = gray; // B
                }

                // Đặt lại dữ liệu pixel đã xử lý vào canvas
                ctx.putImageData(imageData, 0, 0);
            };
        }

        // Gọi hàm để vẽ ảnh skeleton khi tải trang xong
        window.onload = drawSkeletonImage;
    </script>

</div>
@endsection