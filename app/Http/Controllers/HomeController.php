<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Section;
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

    public function showQuestions($id)
    {
        $questions = Question::where('id_section',$id)->orderBy('order')->get();
        return view('questions',['questions' => $questions,'id' => $id]);
    }

    public function getPromo(Request $request){

        $result = $request->all();

        $n = sizeof($result) - 4;
        $score = 0;
        $i=1;
        $answers = [];
        $infoPrice = [];
       

        while($i<$n){

            if(isset($result[$i])){
                
                $temp= explode('|',$result[$i]);
                $score = $score+$temp[1];
                array_push($answers,array('question_id' => $i,'answer_id' => $temp[0]));

                if($temp[2]!=""){
                    
                    array_push($infoPrice,array('type' => $temp[2],'id_answer' => $temp[0]));

                }

            }
           
            $i++;

        }


        //get Promos
        $promos = DB::table('promos')
            ->select('*', DB::raw("Abs(score - $score) AS column_to_be_order"))
            ->where('id_section',$request->id_section)
            ->orderBy('column_to_be_order')
            ->get();        
        
        $i=0;
        $j=0;
        $total=0;
        if($request->id_section==1 || $request->id_section==3){
            while($i<count($promos)){
                $total=0;
                $temp = json_decode($promos[$i]->price);
                $j=0;
                while($j<count($infoPrice)){
                    $type=$infoPrice[$j]['type'];
                    $total= $total + $temp->$type[$infoPrice[$j]['id_answer']];                    
                    $j++;
                }
                $promos[$i]->total = $total;              
                $i++;
            }
        }else{
            while($i<count($promos)){
                $promos[$i]->total =$promos[$i]->price;              
                $i++;
            }
        }
      

        //Store data
       
        $result['answers'] = json_encode($answers);

             
        return view('listResultsPromo',['promos' => $promos,'results' => json_encode($result)]);



       
    }


    function requestEstimate(Request $request){

        $result = json_decode($request->result);
        

    
        $a = new Answer([
            'name' => $result->name,
            'surname' => $result->surname,
            'iva' => $result->iva,
            'cf' => $result->cf,
            'email' => $result->email,
            'results' => $result->answers,
            'id_promo' =>$request->id_promo            
        ]);
          
        $a->save();
        return view('estimate',['message'=>'Richiesta inviata correttamente!']);
    }


    public function showSections(){
        $sections = Section::all();
        return view('section',['sections' => $sections]);
    }
}
