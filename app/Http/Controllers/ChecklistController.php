<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
    public function index()
    {
        return Checklist::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string']);

        $checklist = Checklist::create([
            'user_id' => Auth::id(),
            'name' => $request->name
        ]);

        return response()->json($checklist, 201);
    }

    public function show(Checklist $checklist)
    {
        if ($checklist->user_id !== Auth::id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return response()->json($checklist);
    }

    public function update(Request $request, Checklist $checklist)
    {
        if ($checklist->user_id !== Auth::id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $request->validate(['name' => 'required|string']);
        $checklist->update($request->only('name'));

        return response()->json($checklist);
    }

    public function destroy(Checklist $checklist)
    {
        if ($checklist->user_id !== Auth::id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $checklist->delete();
        return response()->json(['message' => 'Checklist deleted']);
    }
}
