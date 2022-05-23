<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Section;
use App\Models\Promo;
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
        $summary = [];

        while($i<$n){

            if(isset($result[$i])){
                if(is_array($result[$i])){
                    $j=0;

                    while($j<sizeof($result[$i]) ){

                        $temp= explode('|',$result[$i][$j]);                       
                        $score = $score+$temp[1];
                        array_push($answers,array('question_id' => $i,'answer_id' => $temp[0]));
                        if($temp[2]!=""){

                            $q=Question::find($i);
                            array_push($summary,(array('title'=>$q->title,'answer'=>json_decode($q->answers)[$temp[0]]->text)));
                            array_push($infoPrice,array('type' => $temp[2],'id_answer' => $temp[0]));
        
                        }
                        $j++;
                    }

                }else{
                    $temp= explode('|',$result[$i]);
                    $score = $score+$temp[1];
                    array_push($answers,array('question_id' => $i,'answer_id' => $temp[0]));
    
                    if($temp[2]!=""){
                        $q=Question::find($i);
                        array_push($summary,(array('title'=>$q->title,'answer'=>json_decode($q->answers)[$temp[0]]->text)));
                        array_push($infoPrice,array('type' => $temp[2],'id_answer' => $temp[0]));
    
                    }
    
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
            
        $premium = Promo::where('isPremium',true)->where('id_section',$request->id_section)->first();
        
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
                if($promos[$i]->id==$premium->id){
                    $premium->total = $promos[$i]->total;
                }              
                $i++;
            }
        }else{
            while($i<count($promos)){
                $promos[$i]->total =$promos[$i]->price;
                if($promos[$i]->id==$premium->id){
                    $premium->total = $promos[$i]->total;
                }                 
                $i++;
            }
        }
      


        //Store data
        
        //dd($summary);

        $result['answers'] = json_encode($answers);
        $promo = array($promos);
        return view('listResultsPromo',['premium' => $premium,'promos' => json_encode($promos),'summary'=>json_encode($summary),'results' => json_encode($result)]);

       
    }


    function requestEstimate(Request $request){

        try{
            $a = new Answer([
                'name' => $request->results['name'],
                'surname' => $request->results['surname'],
                'iva' => $request->results['iva'],
                'cf' => $request->results['cf'],
                'email' => $request->results['email'],
                'results' => $request->results['answers'],
                'id_promo' =>$request->id_promo,
                'id_section' =>$request->id_section           
            ]);
              
            $a->save();
        }catch(Throwable $e){
            return $e;
        }    
        
        return true;
    }


    public function showSections(){
        $sections = Section::all();
        return view('section',['sections' => $sections]);
    }

    public function showSuccess(){
        return view('message/success');
    }
    public function showError(){
        return view('message/error');
    }
}
