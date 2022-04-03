<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showQuestions()
    {
        $questions = Question::all()->sortBy('order');
        return view('questions',['questions' => $questions]);
    }

    public function getPromo(Request $request){
        dd($request->all());
    }
}
