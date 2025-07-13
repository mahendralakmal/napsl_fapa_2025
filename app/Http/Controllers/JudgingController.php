<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JudgingController extends Controller
{
    public function submitMark(Request $request)
    {
        $validated = $request->validate([
            'image_id' => 'required|integer|exists:exhibition_entries,id', // adjust table name if needed
            'mark' => 'required|integer|min:1|max:10',
        ]);

        // Save the mark (you may need to create a Judging model/table)
        \App\Models\Judging::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'image_id' => $request->image_id,
            ],
            [
                'mark' => $request->mark,
            ]
        );

        return response()->json(['status' => 'success']);
    }
}
