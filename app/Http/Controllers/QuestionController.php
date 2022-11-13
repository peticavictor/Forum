<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function createQuestion() {
        $user = Auth::user();
        return view('/createQuestion', ['user' => $user]);
    }

    public function store(Request $request) {
        $form = $request -> validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        Question::create($form);

        return redirect('/');
    }
}
