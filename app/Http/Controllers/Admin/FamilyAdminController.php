<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class FamilyAdminController extends Controller
{
    public function index()
    {
        $families = Family::latest()->get();

        return Inertia::render('Admin/Families', [
            'families' => $families,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $slug = Str::slug($validated['name']);
        $accessCode = Str::uuid();

        $family = Family::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'access_code' => $accessCode,
        ]);

        return back()->with('success', "Family created! Share this link: " . url('/family/' . $slug));
    }
}
