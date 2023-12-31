<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('user.quiz.index');
    }

    public function question()
    {
        return view('user.quiz.question');
    }

    public function result()
    {
        return view('user.quiz.result');
    }

    public function lastQuestion()
    {
        return view('user.quiz.last-question');
    }


}
