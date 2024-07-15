<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

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
        request()->validate($rules, $message);


        $idea =  Idea::create(request()->all()); // We can use the request()->all(), becase we had used $fillable in idea.php

        return redirect()->route("dashboard")->with('sucess', 'Idea created!!');
    }

    public function destroy(Idea $id) //Using Route Model Binding, we can reduce or code
    {
        $id->delete();

        return redirect()->route("dashboard")->with('sucess', 'Idea deleted!');;
    }

    public function edit(Idea $idea)
    {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        $rules = [
            'idea-content' => 'required|min:5|max:240',
        ];
        $message = [
            'idea-content.required' => "The idea field is required.",
            'idea-content.min' => "The idea field must be at least 5 characters.",
            'idea-content.max' => "The idea field must not be greater than 240 characters."
        ];
        request()->validate($rules, $message);


        $idea->idea = request()->get('idea-content', '');
        $idea->save();
        $editing = false;
        return redirect()->route("idea.show", $idea->id)->with('sucess', "Idea updated!");
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }
}
