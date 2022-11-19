<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    // public function createAnswer() {
    //     $user = Auth::user();
    //     $questionId = 101;
    //     return view('/createAnswer', ['user' => $user, 'questionId' => $questionId]);
    // }

    public function store(Request $request) {
        $questionId = $request['question_id'];
        $form = $request -> validate([
            'answer' => 'required',
            'best_answer' => 'required',
            'user_id' => 'required',
            'question_id' => 'required',
        ]);

        Answer::create($form);

        return redirect('/' . $questionId);
    }
}
