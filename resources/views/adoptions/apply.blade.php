@extends('layouts.app')

@section('title', 'Adoption Application')

@section('content')
<div class="container">
    <div style="max-width: 600px; margin: 50px auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <h1 style="text-align: center; margin-bottom: 30px;">🐱 Cat Adoption Application</h1>
        
        @if(isset($cat))
            <div style="background: #FFF5E8; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                <p>You are applying to adopt: <strong>{{ $cat['name'] }}</strong></p>
                <input type="hidden" name="cat_name" value="{{ $cat['name'] }}">
            </div>
        @endif
        
        @if(session('success'))
            <div style="background: #D4EDDA; color: #155724; padding: 12px; border-radius: 10px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('adoptions.store') }}">
            @csrf
            
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name" required>
            </div>
            
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone_number" required>
            </div>
            
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" rows="3" required></textarea>
            </div>
            
            <div class="form-group">
                <label>Why do you want to adopt {{ isset($cat) ? $cat['name'] : 'a cat' }}?</label>
                <textarea name="reason" rows="3" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Application</button>
        </form>
    </div>
</div>
@endsection