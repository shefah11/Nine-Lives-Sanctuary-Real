@extends('layouts.app')

@section('title', 'Edit Healthcare Guide')

@section('content')
<div class="container">
    <div style="max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <h1 style="margin-bottom: 20px;">Edit Healthcare Guide</h1>
        
        <form action="/admin/health/{{ $health->id }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="{{ $health->title }}" required>
            </div>
            
            <div class="form-group">
                <label>Category</label>
                <select name="category" required>
                    <option value="Kitten Care" {{ $health->category == 'Kitten Care' ? 'selected' : '' }}>Kitten Care</option>
                    <option value="Nutrition" {{ $health->category == 'Nutrition' ? 'selected' : '' }}>Nutrition</option>
                    <option value="Vaccines" {{ $health->category == 'Vaccines' ? 'selected' : '' }}>Vaccines</option>
                    <option value="First Aid" {{ $health->category == 'First Aid' ? 'selected' : '' }}>First Aid</option>
                    <option value="Grooming" {{ $health->category == 'Grooming' ? 'selected' : '' }}>Grooming</option>
                    <option value="Common Illnesses" {{ $health->category == 'Common Illnesses' ? 'selected' : '' }}>Common Illnesses</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" rows="10" required>{{ $health->content }}</textarea>
            </div>
            
            <div class="form-group">
                <label>Image URL (optional)</label>
                <input type="url" name="image_url" value="{{ $health->image_url }}" placeholder="https://example.com/cat.jpg">
            </div>
            
         
            
            <div style="display: flex; gap: 15px; margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Update Guide</button>
                <a href="/admin/health" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection