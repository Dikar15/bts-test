<?php

namespace App\Http\Controllers;

use App\Models\ChecklistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Checklist;

class ChecklistItemController extends Controller
{
    public function index($checklistId)
    {
        $checklist = Checklist::where('id', $checklistId)->where('user_id', Auth::id())->first();

        if (!$checklist) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return ChecklistItem::where('checklist_id', $checklistId)->get();
    }

    public function store(Request $request, $checklistId)
    {
        $checklist = Checklist::where('id', $checklistId)->where('user_id', Auth::id())->first();

        if (!$checklist) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $request->validate(['name' => 'required|string']);

        $item = ChecklistItem::create([
            'checklist_id' => $checklistId,
            'name' => $request->name
        ]);

        return response()->json($item, 201);
    }

    public function update(Request $request, ChecklistItem $item)
    {
        $checklist = Checklist::where('id', $item->checklist_id)->where('user_id', Auth::id())->first();

        if (!$checklist) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $request->validate(['name' => 'required|string', 'is_completed' => 'boolean']);
        $item->update($request->only(['name', 'is_completed']));

        return response()->json($item);
    }

    public function destroy(ChecklistItem $item)
    {
        $checklist = Checklist::where('id', $item->checklist_id)->where('user_id', Auth::id())->first();

        if (!$checklist) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $item->delete();

        return response()->json(['message' => 'Checklist item deleted']);
    }
}
