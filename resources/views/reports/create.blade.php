@extends('layouts.app')

@section('title', 'Report a Cat')

@section('content')
<div class="container">
    <div style="max-width: 600px; margin: 50px auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <h1 style="text-align: center; margin-bottom: 30px;">🐱 Report a Stray or Injured Cat</h1>
        
        @if(session('success'))
            <div style="background: #D4EDDA; color: #155724; padding: 12px; border-radius: 10px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" placeholder="e.g., Near KICT, IIUM" required>
            </div>
            
            <div class="form-group">
                <label>Cat's Condition</label>
                <select name="condition" required>
                    <option value="">Select condition</option>
                    <option value="Healthy">Healthy - just needs a home</option>
                    <option value="Injured">Injured - needs medical help</option>
                    <option value="Sick">Sick - looks unwell</option>
                    <option value="Kitten">Kitten - young and alone</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Priority Level</label>
                <select name="priority" required>
                    <option value="">Select priority</option>
                    <option value="Low">Low - Can wait a few days</option>
                    <option value="Medium">Medium - Needs attention soon</option>
                    <option value="High">High - Emergency, needs immediate help</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Upload Photo (optional)</label>
                <input type="file" name="cat_image" accept="image/*">
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Report</button>
        </form>
    </div>
</div>
@endsection