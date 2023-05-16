<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:room,id',
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->room_id = $request->room_id;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->back()->with('success', 'Comment saved successfully.');
    }
}
