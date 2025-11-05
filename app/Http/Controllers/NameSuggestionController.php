<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNameSuggestionRequest;
use App\Models\NameSuggestion;
use Illuminate\Http\Request;

class NameSuggestionController extends Controller
{
    public function index()
    {
        return NameSuggestion::orderBy('created_at', 'desc')->get();
    }


    public function store(StoreNameSuggestionRequest $request)
    {
        $data = $request->validated();
        $data['submitted_at'] = now();
        $suggestion = NameSuggestion::create($data);


        return response()->json($suggestion, 201);
    }


    public function pickRandom(Request $request)
    {
        // Return a shuffled single record with chosen name (boy/girl) depending on type
        $type = $request->query('type', 'boy'); // 'boy' or 'girl'


        $rows = NameSuggestion::whereNotNull($type.'_name')->get();
        if ($rows->isEmpty()) {
            return response()->json(['message' => 'No suggestions found for type '.$type], 404);
        }


        $random = $rows->shuffle()->first();
        return response()->json([
            'suggestion' => $random,
            'selected_name' => $random->{$type.'_name'},
        ]);
    }


    public function destroy(NameSuggestion $nameSuggestion)
    {
        $nameSuggestion->delete();
        return response()->json(['deleted' => true]);
    }
}
