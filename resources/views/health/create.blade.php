@extends('layouts.app')

@section('title', 'Add Guide')

@section('content')
<div class="container">
    <div style="max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 20px;">
        <h1>Add New Healthcare Guide</h1>
        
        <form action="/admin/health" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" required>
            </div>
            
            <div class="form-group">
                <label>Category</label>
                <select name="category" required>
                    <option value="">Select Category</option>
                    <option value="Kitten Care">Kitten Care</option>
                    <option value="Nutrition">Nutrition</option>
                    <option value="Vaccines">Vaccines</option>
                    <option value="First Aid">First Aid</option>
                    <option value="Grooming">Grooming</option>
                    <option value="Common Illnesses">Common Illnesses</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" rows="10" required></textarea>
            </div>
            
            <div class="form-group">
                <label>Image URL (optional)</label>
                <input type="url" name="image_url" placeholder="https://example.com/cat.jpg">
            </div>
            
            <button type="submit" class="btn btn-primary">Save Guide</button>
            <a href="/admin/health" class="btn btn-outline">Cancel</a>
        </form>
    </div>
</div>
@endsection