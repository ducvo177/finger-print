<!DOCTYPE html>
<html>

<head>
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bao gồm JavaScript của Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- In the <head> section of your layout or HTML file -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Add this to your HTML file -->
  <!-- FullCalendar CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
  <!-- FullCalendar JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

</head>
<style>
  .logout {
    position: absolute;
    top: 0;
    right: 0;
  }
</style>

<body>
  <div class="container-content">
    @if(auth()->user())
    <form action="{{ route('logout') }}" method="POST" style="position: absolute; right:0; top:0;">
      @csrf
      <button type="submit">Đăng xuất</button>
    </form>
    @endif
    @yield('content')
  </div>

  <script src="{{ mix('js/app.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
  <script>
    var successMessage = '<?php echo addslashes(session('success')); ?>';
    if (successMessage) {
      Swal.fire({
        icon: 'success',
        title: 'Thành công',
        text: successMessage,
        showConfirmButton: false,
        timer: 2000 // Display for 2 seconds
      });
    }

    // Check for error message in the session
    var errorMessage = '<?php echo addslashes(session('error')); ?>';
    if (errorMessage) {
      Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: errorMessage,
        showConfirmButton: false,
        timer: 2000 // Display for 2 seconds
      });
    }
  </script>
</body>

</html>