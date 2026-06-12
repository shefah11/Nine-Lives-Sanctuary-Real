@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <!-- Welcome Section -->
    <div style="background: linear-gradient(135deg, #E8A35E 0%, #D4914A 100%); border-radius: 20px; padding: 40px; margin: 30px 0; color: white;">
        @auth
            <h1 style="font-size: 2rem; margin-bottom: 10px;">Welcome back, {{ Auth::user()->name }}! 🐱</h1>
            <p style="opacity: 0.9;">Manage cat adoptions, report stray cats, and access healthcare guides.</p>
        @else
            <h1 style="font-size: 2rem; margin-bottom: 10px;">Welcome to Nine Lives Sanctuary! 🐱</h1>
            <p style="opacity: 0.9;">Please <a href="/login" style="color: white; text-decoration: underline;">login</a> or <a href="/register" style="color: white; text-decoration: underline;">register</a> to start your adoption journey.</p>
        @endauth
    </div>

    <!-- Quick Links Section -->
    <h2 style="color: #4A3B32; margin: 30px 0 20px;">Quick Links</h2>
    <div class="grid-4">
        <a href="/report/create" style="text-decoration: none;">
            <div class="card" style="text-align: center; padding: 20px;">
                <i class="fas fa-paw" style="font-size: 2.5rem; color: #E8A35E; margin-bottom: 10px;"></i>
                <h3 class="card-title">Report a Cat</h3>
                <p class="card-text">Report stray or injured cats</p>
            </div>
        </a>

        <a href="/cats" style="text-decoration: none;">
            <div class="card" style="text-align: center; padding: 20px;">
                <i class="fas fa-cat" style="font-size: 2.5rem; color: #E8A35E; margin-bottom: 10px;"></i>
                <h3 class="card-title">Adoption Gallery</h3>
                <p class="card-text">Find your new best friend</p>
            </div>
        </a>

        <a href="/health" style="text-decoration: none;">
            <div class="card" style="text-align: center; padding: 20px;">
                <i class="fas fa-heartbeat" style="font-size: 2.5rem; color: #E8A35E; margin-bottom: 10px;"></i>
                <h3 class="card-title">Healthcare Guide</h3>
                <p class="card-text">Learn about cat care</p>
            </div>
        </a>

        @auth
            <a href="/profile" style="text-decoration: none;">
                <div class="card" style="text-align: center; padding: 20px;">
                    <i class="fas fa-user" style="font-size: 2.5rem; color: #E8A35E; margin-bottom: 10px;"></i>
                    <h3 class="card-title">My Profile</h3>
                    <p class="card-text">Update your information</p>
                </div>
            </a>
        @else
            <a href="/login" style="text-decoration: none;">
                <div class="card" style="text-align: center; padding: 20px;">
                    <i class="fas fa-sign-in-alt" style="font-size: 2.5rem; color: #E8A35E; margin-bottom: 10px;"></i>
                    <h3 class="card-title">Login</h3>
                    <p class="card-text">Access your account</p>
                </div>
            </a>
        @endauth
    </div>

    <!-- Admin Quick Links (only shown when logged in as admin) -->
    @if(auth()->check() && auth()->user()->role === 'admin')
    <h2 style="color: #4A3B32; margin: 30px 0 20px;">Admin Panel</h2>
    <div class="grid-3">
        <a href="/admin/health" style="text-decoration: none;">
            <div class="card" style="text-align: center; padding: 20px; background: #FFF5E8;">
                <i class="fas fa-book-medical" style="font-size: 2rem; color: #E8A35E;"></i>
                <h3 class="card-title">Manage Guides</h3>
                <p class="card-text">Add/Edit healthcare articles</p>
            </div>
        </a>
    </div>
    @endif

    <!-- Our Impact Section -->
    <h2 style="color: #4A3B32; margin: 30px 0 20px;">Our Impact</h2>
    <div class="grid-3">
        <div class="card" style="text-align: center;">
            <div class="card-content">
                <i class="fas fa-cat" style="font-size: 2rem; color: #E8A35E;"></i>
                <h3 class="card-title">Cats Rescued</h3>
                <p style="font-size: 2rem; font-weight: bold;">50+</p>
            </div>
        </div>
        <div class="card" style="text-align: center;">
            <div class="card-content">
                <i class="fas fa-heart" style="font-size: 2rem; color: #E8A35E;"></i>
                <h3 class="card-title">Happy Adoptions</h3>
                <p style="font-size: 2rem; font-weight: bold;">30+</p>
            </div>
        </div>
        <div class="card" style="text-align: center;">
            <div class="card-content">
                <i class="fas fa-users" style="font-size: 2rem; color: #E8A35E;"></i>
                <h3 class="card-title">Active Volunteers</h3>
                <p style="font-size: 2rem; font-weight: bold;">20+</p>
            </div>
        </div>
    </div>
</div>
@endsection