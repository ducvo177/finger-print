@extends('layout')

@section('title', 'Login')

@section('content')
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login-check') }}">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
    </div>

@endsection