@extends('layouts.app')

@section('title', 'Healthcare Guide')

@section('content')
<div class="container">
    <!-- Hero section -->
    <div class="hero-bg">
        <div class="hero-overlay">
            <h1>🐱 Cat Healthcare Guide</h1>
            <p>Learn how to keep your feline friend healthy and happy</p>
        </div>
    </div>
    
    <div class="grid-3">
        @foreach($healths as $health)
        <div class="card">
            @if($health->image_url)
                <img src="{{ $health->image_url }}" alt="{{ $health->title }}">
            @else
                <img src="https://placekitten.com/400/200" alt="Cat">
            @endif
            <div class="card-content">
                <h3 class="card-title">{{ $health->title }}</h3>
                <p class="card-text">{{ Str::limit($health->content, 100) }}</p>
                <a href="/health/{{ $health->id }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
        @endforeach
    </div>
    
    @if($healths->isEmpty())
        <p style="text-align: center; padding: 50px;">No healthcare guides available yet. Check back soon!</p>
    @endif
</div>
@endsection