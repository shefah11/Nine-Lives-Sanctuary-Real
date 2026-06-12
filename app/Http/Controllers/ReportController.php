<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    // Display all cases on the Admin dashboard list
    public function index()
    {
        $reports = Report::latest()->get();
        return view('reports.index', compact('reports'));
    }

    // Return the view containing the public submission form
    public function create()
    {
        return view('reports.create');
    }

    // Handle incoming data validation, store photos, and create row records
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // 2MB restriction
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            // Saves image safely inside storage/app/public/stray_cases
            $photoPath = $request->file('photo')->store('stray_cases', 'public');
        }

        Report::create([
            'location' => $request->location,
            'description' => $request->description,
            'photo_path' => $photoPath,
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
        ]);

        return redirect()->route('reports.create')->with('success', 'Stray report submitted successfully!');
    }

    // View specific report entry metrics
    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    // Handle admin status updates
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'status' => 'required|string|in:Pending,Investigating,Resolved'
        ]);

        $report->update(['status' => $request->status]);

        return redirect()->route('reports.index')->with('success', 'Case status modified successfully.');
    }

    // Delete a record completely from storage and database tables
    public function destroy(Report $report)
    {
        if ($report->photo_path) {
            Storage::disk('public')->delete($report->photo_path);
        }
        $report->delete();
        
        return redirect()->route('reports.index')->with('success', 'Report record discarded.');
    }
}
