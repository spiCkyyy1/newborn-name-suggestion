<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNameSuggestionRequest;
use App\Models\Family;
use App\Models\NameSuggestion;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NameSuggestionController extends Controller
{
    public function showFamily(Family $family)
    {
        return Inertia::render('Home', [
            'family' => $family,
            'suggestions' => $family->suggestions()->latest()->get(),
        ]);
    }
    public function store(StoreNameSuggestionRequest $request, Family $family)
    {
        $data = $request->validated();
        $data['submitted_at'] = now();
        $family->suggestions()->create($data);
        return redirect()->back()->with('success', 'Suggestion added successfully!');
    }

    public function pickRandom(Request $request)
    {
        // Return a shuffled single record with chosen name (boy/girl) depending on type
        $type = $request->query('type', 'boy'); // 'boy' or 'girl'


        $rows = NameSuggestion::whereNotNull($type . '_name')->get();
        if ($rows->isEmpty()) {
            return response()->json(['message' => 'No suggestions found for type ' . $type], 404);
        }


        $random = $rows->shuffle()->first();
        return response()->json([
            'suggestion' => $random,
            'selected_name' => $random->{$type . '_name'},
        ]);
    }

    public function shuffle(Family $family, Request $request)
    {
        // Validate the 'type' query parameter
        $type = $request->query('type', 'boy');
        if (!in_array($type, ['boy', 'girl'])) {
            return response()->json(['error' => 'Invalid type parameter'], 422);
        }

        // Fetch one random suggestion that has the chosen name type filled
        $suggestion = $family->suggestions()
            ->whereNotNull("{$type}_name")
            ->inRandomOrder()
            ->first();

        // Handle case: no suggestions available for that type
        if (!$suggestion) {
            return response()->json([
                'message' => "No {$type} name suggestions found for this family.",
                'suggestion' => null,
                'selected_name' => null,
                'success' => true,
            ], 200);
        }

        // Return the randomly selected suggestion
        return response()->json([
            'message' => ucfirst($type) . ' name selected successfully.',
            'suggestion' => $suggestion,
            'selected_name' => $suggestion->{"{$type}_name"},
            'success' => true,
        ]);
    }

    public function destroy(Family $family, $id)
    {
        $suggestion = $family->suggestions()->findOrFail($id);
        $suggestion->delete();
        return redirect()->back()->with('success', 'Suggestion deleted successfully!');
    }
}
