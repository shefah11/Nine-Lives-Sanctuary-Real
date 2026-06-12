@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card mx-auto shadow" style="max-width: 500px;">
        @if($report->photo_path)
            <img src="{{ asset('storage/' . $report->photo_path) }}" class="card-img-top">
        @endif
        <div class="card-body">
            <h4>Location: {{ $report->location }}</h4>
            <p>{{ $report->description }}</p>
            <a href="{{ route('reports.index') }}" class="btn btn-sm btn-secondary">Return to List</a>
        </div>
    </div>
</div>
@endsection
