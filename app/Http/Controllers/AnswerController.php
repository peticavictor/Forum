<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function update(Request $request) {
        $questionId = $request['question_id'];
        $answerId = $request['answer_id'];
        
        DB::table('answer')
                ->where('id', $answerId)
                ->update(['best_answer' => true]);

        return redirect('/' . $questionId);
    }
}
