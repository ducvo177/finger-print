@extends('layout')

@section('title', 'Register')

@section('content')
<div class="register-box login-box">
            <h2>Register</h2>
            <form method="POST" action="{{ route('register-store') }}" enctype="multipart/form-data">
                @csrf
                <label for="name">Tên của bạn:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address" required>
                <br>
                <label for="avatar">Ảnh đại diện:</label>
                <input type="file" accept="image/*" id="avatar" name="avatar" required>
                <br>
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
</div>
@endsection

