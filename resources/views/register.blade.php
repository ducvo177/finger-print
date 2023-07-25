@extends('layout')

@section('title', 'Register')

@section('content')
<div class="login-box">
            <h2>Register</h2>
            <form method="POST" action="{{ route('register-store') }}">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
</div>
@endsection

