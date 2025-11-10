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
            'logoutUrl' => route('admin.logout'),
            'addFamilyUrl' => route('admin.family.store'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|min:3|unique:families',
        ]);

        $slug = Str::slug($validated['name']);
        $accessCode = Str::uuid();

        Family::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'access_code' => $accessCode,
        ]);

        return back()->with('success', 'Family created! Share this link: '.url('/family/'.$slug));
    }
}
