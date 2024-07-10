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

        try {
            Idea::create([
                'idea' => request()->get('idea-content', '')
            ]);
            return redirect()->route("dashboard")->with('sucess', 'Idea created!!');
        } catch (\Throwable $th) {
            return redirect()->route("dashboard")->with('error', 'Idea not created!!');
        }
    }

    public function destroy(Idea $id) //Using Route Model Binding, we can reduce or code
    {
        $id->delete();

        return redirect()->route("dashboard")->with('sucess', 'Idea deleted!');;
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea
        ]);
    }
}
