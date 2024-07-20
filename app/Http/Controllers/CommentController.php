<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        $rules = [
            'content' => 'required|min:1|max:240',
        ];
        $message = [
            'content.required' => "The idea field is required.",
            'content.min' => "The idea field must be at least 1 characters.",
            'content.max' => "The idea field must not be greater than 240 characters."
        ];
        $validated = request()->validate($rules, $message);
        $validated['user_id'] = auth()->id();
        $validated['idea_id'] = $idea->id;


        Comment::create([
            'content' => $validated['content'],
            'user_id' => auth()->id(),
            'idea_id' => $idea->id
        ]);

        return redirect()->route('idea.show', $idea->id)->with('success', "Comment posted sucessfully!");
    }
}
