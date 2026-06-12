@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container">
    <div style="max-width: 500px; margin: 50px auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <h1 style="text-align: center; margin-bottom: 30px; color: #4A3B32;">Create an Account</h1>
        <p style="text-align: center; color: #6B5B4F; margin-bottom: 20px;">Join our sanctuary network to help local cats.</p>

        @if ($errors->any())
            <div style="background: #F8D7DA; color: #721C24; padding: 12px; border-radius: 10px; margin-bottom: 20px;">
                @foreach ($errors->all() as $error)
                    <p style="margin: 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Mahallah (Campus Residence) - Optional</label>
                <input type="text" name="mahallah" value="{{ old('mahallah') }}" placeholder="e.g., Mahallah Salahuddin">
            </div>

            <div class="form-group">
                <label>Phone Number - Optional</label>
                <input type="text" name="phone_number" value="{{ old('phone_number') }}" placeholder="e.g., 0123456789">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Register Account 🐾</button>
        </form>

        <p style="text-align: center; margin-top: 20px;">
            Already have an account? <a href="{{ route('login') }}" style="color: #E8A35E;">Log in here</a>
        </p>
    </div>
</div>
@endsection