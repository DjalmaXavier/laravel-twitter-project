<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    public function store()
    {

        $rules = [
            'idea-content' => 'required|min:5|max:240',
        ];
        $message = [
            'idea-content.required' => "The idea field is required.",
            'idea-content.min' => "The idea field must be at least 5 characters.",
            'idea-content.max' => "The idea field must not be greater than 240 characters."
        ];
        $validated = request()->validate($rules, $message);

        Idea::create([
            'idea' => $validated['idea-content'],
            'user_id' => auth()->id()
        ]); //We removed request()->all() because it's better to validate the data and use the validated data for creating records.

        return redirect()->route("dashboard")->with('success', 'Idea created!!');
    }

    public function destroy(Idea $idea) //Using Route Model Binding, we can reduce or code
    {
        //Gate::authorize('idea.delete', $idea); If we are using gate, this is what we should use.

        Gate::authorize('delete', $idea);

        $idea->delete();

        return redirect()->route("dashboard")->with('success', 'Idea deleted!');;
    }

    public function edit(Idea $idea)
    {
        Gate::authorize('update', $idea);
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        Gate::authorize('update', $idea);

        $rules = [
            'idea-content' => 'required|min:5|max:240',
        ];
        $message = [
            'idea-content.required' => "The idea field is required.",
            'idea-content.min' => "The idea field must be at least 5 characters.",
            'idea-content.max' => "The idea field must not be greater than 240 characters."
        ];
        $validated = request()->validate($rules, $message);

        $idea->update(['idea' => $validated['idea-content']]);

        return redirect()->route("ideas.show", $idea->id)->with('success', "Idea updated!");
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }
}
