<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class AdminController extends Controller

{

        /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $questions = Question::all()->sortBy('order');;
       
        return view('admin/dashboard',['questions' => $questions]);
    }


    
    /**
     * Show Create new Question.
     *
     * @return void
     */
    public function showCreateQuestion(){
        return view('admin/question/create');
    }


    /**
     * Create new Question.
     *
     * @return void
     */
    public function createQuestion(Request $request){

        dd($request->all());

        if($request->is_required===''){
           $temp=false;
        }else{
            $temp=true;
        }
        
        $order = Question::max('order');
        
        if($order===null){
            $order=0;
        }else{
           
            $order=$order+1; 
        }

        $q = new Question([
            'title' => $request->title,
            'description' => $request->description,
            'answers' => $request->answers,
            'is_required' => $temp,
            'order' => $order
        ]);

        $q->save();

    }

    /**
     * Delete Question.
     *
     * @return void
     */

    public function deleteQuestion($id){

        $questionToDelete= Question::find($id);//->delete();
        Question::where('order','>',$questionToDelete->order)->decrement('order');
        $questionToDelete->delete();        
        
    }


    public function upQuestion($id,$pos){  
        
        $questionToIncrement = Question::where('order',$pos-1)->first();
        
        if($questionToIncrement!=null){
            $questionToIncrement->increment('order');
            Question::find($id)->decrement('order'); 
        }else{
            dd('prima domanda');
        }     

    }

    public function downQuestion($id,$pos){        
       

        $questionToDecrement=Question::where('order',$pos+1)->first();
       
        if($questionToDecrement!= null){
            $questionToDecrement->decrement('order');
            Question::find($id)->increment('order');
        }else{
            dd('ultima domanda');
        }       
   }

    
    /**
     * Show Edit Question.
     *
     * @return void
     */
    public function showEditQuestion($id){
        $question = Question::find($id);
        return view('admin/question/edit',['question' => $question]);
    }

        /**
     * Edit Question.
     *
     * @return void
     */
    public function EditQuestion(Request $request){
        Question::find($request->id)->update($request->all());       
    }

        /**
     * Show Edit Question.
     *
     * @return void
     */
    public function showViewQuestion(Request $request){
        $question = Question::find($request->id);
        return view('admin/question/view',['question' => $question,'answers'=>json_decode($question->answers)]);
    }




    /**
     * Show Create new Promo.
     *
     * @return void
     */
    public function showCreatePromo(){
        return view('admin/promo/create');
    }


    /**
     * Create new Promo.
     *
     * @return void
     */
    public function createPromo(Request $request){
        
        $p = new Promo([
            'title' => $request->title,
            'description' => $request->description,
            'score' => $request->score,
            'price' => $request->price,
            'image' => $request->imgPromo,
        ]);

        $q->save();

    }

    
}
