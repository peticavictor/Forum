<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Brick\Math\BigInteger;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        $questions = DB::table('question')
            ->join('users', 'users.id', '=', 'question.user_id')
            ->select('question.*', 'users.name')
            ->orderByDesc('question.id')
            ->get();
            
        $answers = DB::table('answer')
            ->join('question', 'question.id', '=', 'answer.question_id')
            ->join('users', 'users.id', '=', 'answer.user_id')
            ->select('answer.*', 'users.*', 'question.*')
            ->get();
        
        $uniqueQuestion = null;
            
        return view('index', ['questions' => $questions, 'answers' => $answers, 'uniqueQuestion' => $uniqueQuestion]);
    }

    public function secondIndex( $questionId) {
        $questions = DB::table('question')
            ->join('users', 'users.id', '=', 'question.user_id')
            ->select('question.*', 'users.name')
            ->orderByDesc('question.id')
            ->get();

        $answers = DB::table('answer')
            ->join('question', 'question.id', '=', 'answer.question_id')
            ->join('users', 'users.id', '=', 'answer.user_id')
            ->select('answer.*', 'users.name', 'question.*')
            ->where('answer.question_id', '=', $questionId)
            ->get();

        $uniqueQuestion = DB::table('question')
            ->join('users', 'users.id', '=', 'question.user_id')
            ->select('users.name', 'question.*')
            ->where('question.id', '=', $questionId)
            // ->limit(1)
            ->get();
        return view('index', ['questions' => $questions, 'answers' => $answers, 'uniqueQuestion' => $uniqueQuestion]);
    }
}
