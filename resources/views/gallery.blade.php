@extends('layouts.app')

@section('title', 'Adoption Gallery')

@section('content')
<div class="container">
    <div class="hero">
        <h1>🐱 Meet Our Cats</h1>
        <p>Find your perfect feline companion!</p>
    </div>
    
    <div class="grid-3">
        @foreach($allCats as $id => $cat)
        <div class="card">
            <img src="{{ $cat['images'][0] }}" alt="{{ $cat['name'] }}" style="width: 100%; height: 200px; object-fit: cover;">
            <div class="card-content">
                <h3 class="card-title">{{ $cat['name'] }}</h3>
                <p class="card-text">{{ $cat['short_desc'] }}</p>
                <a href="/cats/{{ $id }}" class="btn btn-primary">View Details</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection