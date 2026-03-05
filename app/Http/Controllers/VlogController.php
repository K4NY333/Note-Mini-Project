<?php

namespace App\Http\Controllers;

use App\Models\note;
use App\Models\UserLogin;
use App\Models\vlog;
use Illuminate\Http\Request;

class VlogController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:userlogin,id',
            'title' => 'required',
            'content' => 'required'
        ]);

        $notes = Note::create($request->only('user_id', 'title', 'content'));

        return response()->json([
            'message' => 'Saved Successfully',
            'data' => $notes
        ], 201);
    }

    public function option(Request $request)
    {
        $validated = $request->validate([
            'note_id' => 'required|exists:notes,id',
            'user_id' => 'required|exists:userlogin,id',
            'status' => 'required|string|max:255',
        ]);

        $vlogs = Vlog::create($validated);

        return response()->json([
            'message' => 'Status Updated Successfully',
            'data' => $vlogs
        ], 201);
    }

    public function StatusFilter(Request $request)
    {
        $request->validate([
            'status' => 'required|string|in:hide,show,edit,private',
        ]);

        $status = $request->input('status');

        $vlogs = Vlog::where('status', $status)->get();

        return response()->json([
            'message' => "Vlogs with status '{$status}'",
            'data' => $vlogs
        ], 200);
    }
}




