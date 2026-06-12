<?php

namespace App\Http\Controllers;

use App\Models\Health;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    // Public: Show all guides
    public function index()
    {
        $healths = Health::where('is_published', true)
                        ->orderBy('created_at', 'desc')
                        ->get();
        return view('health.index', compact('healths'));
    }
    
    // Public: Show one guide
    public function show($id)
    {
        $health = Health::findOrFail($id);
        return view('health.show', compact('health'));
    }
    
    // Admin: Manage all guides
    public function manage()
    {
        $healths = Health::orderBy('created_at', 'desc')->get();
        return view('health.manage', compact('healths'));
    }
    
    // Admin: Show create form
    public function create()
    {
        return view('health.create');
    }
    
    // Admin: Save new guide
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string',
            'image_url' => 'nullable|url',
        ]);

        
        Health::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'image_url' => $request->image_url,
            'author' => 'Admin',
            'is_published' => $request->has('is_published'),
        ]);
        
        return redirect()->route('health.manage')
                         ->with('success', 'Guide created successfully!');
    }
    
    // Admin: Show edit form
    public function edit($id)
    {
        $health = Health::findOrFail($id);
        return view('health.edit', compact('health'));
    }
    
    // Admin: Update guide
    public function update(Request $request, $id)
    {
        $health = Health::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string',
            'image_url' => 'nullable|url',
        ]);
        
        $health->update([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'image_url' => $request->image_url,
            'is_published' => $request->has('is_published'),
        ]);
        
        return redirect()->route('health.manage')
                         ->with('success', 'Guide updated successfully!');
    }
    
    // Admin: Delete guide
    public function destroy($id)
    {
        $health = Health::findOrFail($id);
        $health->delete();
        
        return redirect()->route('health.manage')
                         ->with('success', 'Guide deleted successfully!');
    }
}