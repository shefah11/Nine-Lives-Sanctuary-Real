<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function showApplyForm($cat_id = null)
    {
        $catController = new CatController();
        $cats = $catController->getCatsData();
        $cat = $cats[$cat_id] ?? null;
        
        return view('adoptions.apply', compact('cat', 'cat_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
            'reason' => 'required|string',
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully! We will contact you soon.');
    }
}