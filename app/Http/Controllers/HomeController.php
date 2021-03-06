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

        
        $n = sizeof($result)-10;
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
                    
                        array_push($answers,array('question_id' => $i,'answer_id' => $temp[0]));
                        if($temp[1]!=""){

                            $q=Question::find($i);
                            array_push($summary,(array('title'=>$q->title,'answer'=>json_decode($q->answers)[$temp[0]]->text)));
                            array_push($infoPrice,array('type' => $temp[1],'id_answer' => $temp[0]));
        
                        }
                        $j++;
                    }

                }else{
                    $temp= explode('|',$result[$i]);
                    array_push($answers,array('question_id' => $i,'answer_id' => $temp[0]));
    
                    if($temp[1]!=""){
                        $q=Question::find($i);
                        array_push($summary,(array('title'=>$q->title,'answer'=>json_decode($q->answers)[$temp[0]]->text)));
                        array_push($infoPrice,array('type' => $temp[1],'id_answer' => $temp[0]));
    
                    }
    
                }

            }
           
            $i++;

        }

        //get Promos
        $promos = DB::table('promos')
            ->select('*')
            ->where('id_section',$request->id_section)
            ->get();
            
        $premium = Promo::where('isPremium',true)->where('id_section',$request->id_section)->first();
        $i=0;
        $j=0;
        $total=0;

        //TODO Controllare calcolo dinamico prezzi

        dd($infoPrice);

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
                if($premium!=null){
                    if($promos[$i]->id==$premium->id){
                        $premium->total = $promos[$i]->total;
                    }        
                }
      
                $i++;
            }

            while($i<count($promos)){
                $promos[$i]->total =$promos[$i]->price;
                if($premium!=null){
                    if($promos[$i]->id==$premium->id){
                        $premium->total = $promos[$i]->total;
                    }
                }                 
                $i++;
            }
    
      


        //Store data
        
        //dd($summary);

        $result['answers'] = json_encode($answers);
        $promo = array($promos);
        
        //TODO Controllare se premium == null

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
