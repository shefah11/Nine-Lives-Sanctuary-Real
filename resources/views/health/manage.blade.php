@extends('layouts.app')

@section('title', 'Manage Guides')

@section('content')
<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin: 30px 0;">
        <h1>Manage Healthcare Guides</h1>
        <a href="/admin/health/create" class="btn btn-primary">+ Add New Guide</a>
    </div>
    
    @if(session('success'))
        <div style="background: #D4EDDA; color: #155724; padding: 12px; border-radius: 10px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif
    
    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 15px; overflow: hidden;">
        <thead style="background: #E8A35E; color: white;">
            <tr><th style="padding: 15px; text-align: left;">Title</th><th style="padding: 15px; text-align: left;">Category</th><th style="padding: 15px; text-align: center;">Actions</th></tr>
        </thead>
        <tbody>
            @foreach($healths as $health)
            <tr style="border-bottom: 1px solid #F0E8DF;">
                <td style="padding: 15px;">{{ $health->title }}</td>
                <td style="padding: 15px;">{{ $health->category }}</td>
                <td style="padding: 15px; text-align: center;">
                    <a href="/admin/health/{{ $health->id }}/edit" style="color: #E8A35E; margin-right: 15px;">Edit</a>
                    <form action="/admin/health/{{ $health->id }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red; background: none; border: none; cursor: pointer;" onclick="return confirm('Delete this guide?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection