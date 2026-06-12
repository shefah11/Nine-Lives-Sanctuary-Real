@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container">
    <div style="max-width: 400px; margin: 50px auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <h1 style="text-align: center; margin-bottom: 30px; color: #4A3B32;">Welcome Back!</h1>
        <p style="text-align: center; color: #6B5B4F; margin-bottom: 20px;">Log in to track your rescue & adoption journey.</p>

        @if ($errors->any())
            <div style="background: #F8D7DA; color: #721C24; padding: 12px; border-radius: 10px; margin-bottom: 20px;">
                @foreach ($errors->all() as $error)
                    <p style="margin: 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div style="background: #D4EDDA; color: #155724; padding: 12px; border-radius: 10px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Sign In 🐾</button>
        </form>

        <p style="text-align: center; margin-top: 20px;">
            Don't have an account? <a href="{{ route('register') }}" style="color: #E8A35E;">Register here</a>
        </p>
    </div>
</div>
@endsection