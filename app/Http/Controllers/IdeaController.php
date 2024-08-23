<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    public function store(CreateIdeaRequest $request)
    {

        $validated = $request->validated();

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

    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        Gate::authorize('update', $idea);


        $validated = $request->validated();

        $idea->update(['idea' => $validated['idea-content']]);

        return redirect()->route("ideas.show", $idea->id)->with('success', "Idea updated!");
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }
}
