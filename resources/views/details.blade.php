@extends('layouts.app')

@section('title', $cat['name'])

@section('content')
<div class="container">
    <div style="max-width: 800px; margin: 0 auto; padding: 40px 0;">
        
        <div style="display: flex; gap: 30px; flex-wrap: wrap;">
            <div style="flex: 1;">
                <img src="{{ asset($cat['images'][0]) }}" alt="{{ $cat['name'] }}" style="width: 100%; border-radius: 20px;">
            </div>
            <div style="flex: 1;">
                <h1 style="font-size: 2.5rem; color: #4A3B32;">{{ $cat['name'] }}</h1>
                <p><strong>Gender:</strong> {{ $cat['gender'] }}</p>
                <p><strong>Age:</strong> {{ $cat['age'] }}</p>
                <p><strong>Adoption Fee:</strong> {{ $cat['fee'] }}</p>
                <p style="margin-top: 20px;">{{ $cat['long_desc_1'] }}</p>
                <p>{{ $cat['long_desc_2'] }}</p>
                <a href="/adoptions/apply/{{ $id }}" class="btn btn-primary" style="margin-top: 20px;">Apply for Adoption</a>
                <a href="/cats" class="btn btn-outline">← Back to Gallery</a>
            </div>
        </div>
    </div>
</div>
@endsection