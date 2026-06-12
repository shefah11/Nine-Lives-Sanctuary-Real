@extends('layouts.app')

@section('title', 'Adoption Gallery')

@section('content')
<div class="container">
    <div class="hero">
        <h1>🐱 Meet Our Cats</h1>
        <p>Find your perfect feline companion!</p>
    </div>
    
    <div class="grid-3">
        <div class="card">
            <img src="https://placekitten.com/400/300" alt="Cat">
            <div class="card-content">
                <h3 class="card-title">Coming Soon!</h3>
                <p class="card-text">Member 3 is working on the adoption gallery. Check back soon for available cats!</p>
            </div>
        </div>
    </div>
</div>
@endsection