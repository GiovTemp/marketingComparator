<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use DB;


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

        $result = $request->all();
        $n = sizeof($result);
        $score = 0;
        $i=1;
        while($i<$n){

            $temp= explode('|',$result[$i]);
            $score = $score+$temp[1];
            $i++;

        }

        $promos = DB::table('promos')
            ->select('*', DB::raw("(score - $score) AS column_to_be_order"))
            ->orderBy('column_to_be_order')
            ->get();

            
        dd($promos['0']);

       
    }
}
