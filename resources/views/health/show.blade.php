@extends('layouts.app')

@section('title', $health->title)

@section('content')
<div class="container">
    <div style="max-width: 800px; margin: 0 auto; padding: 40px 0;">
        @if($health->image_url)
            <img src="{{ $health->image_url }}" alt="{{ $health->title }}" style="width: 100%; border-radius: 20px; margin-bottom: 30px;">
        @endif
        
        <h1 style="font-size: 2.5rem; color: #4A3B32; margin-bottom: 10px;">{{ $health->title }}</h1>
        <p style="color: #6B5B4F; margin-bottom: 30px;">By {{ $health->author }} | {{ $health->created_at->format('F j, Y') }}</p>
        
        <div style="line-height: 1.8; font-size: 1.1rem;">
            {!! nl2br(e($health->content)) !!}
        </div>
        
        
        <a href="/health" class="btn btn-outline" style="margin-top: 40px;">← Back to All Guides</a>
    </div>
</div>
@endsection