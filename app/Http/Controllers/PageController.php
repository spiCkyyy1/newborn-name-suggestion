<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function showFamily(Family $family)
    {
        return Inertia::render('Home', [
            'family' => $family,
            'suggestions' => $family->suggestions()->latest()->get(),
        ]);
    }
}
