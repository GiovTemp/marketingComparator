<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Promo;
use App\Models\Section;
use File;
use Illuminate\Support\Str;
use URL;


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
        $sections= Section::all();
       
        return view('admin/dashboard',['sections'=>$sections]);
    }

    public function dashboardSection($id)
    {
        
        $questions = Question::where('id_section',$id)->orderBy('order')->get();
        $promos = Promo::where('id_section',$id)->get();
        $premium= Promo::where('isPremium',true)->where('id_section',$id)->first();
       
        return view('admin/section/dashboard',['questions' => $questions,'promos'=>$promos,'premium'=>$premium,'id'=>$id]);
    }


    
    /**
     * Show Create new Question.
     *
     * @return void
     */
    public function showCreateQuestion($id){
        return view('admin/question/create',['id' => $id]);
    }


    /**
     * Create new Question.
     *
     * @return void
     */
    public function createQuestion(Request $request){
        
        //return $request->id_section  ;
        
        $order = Question::max('order');
        
        if($order===null){
            $order=0;
        }else{           
            $order=$order+1; 
        }
       
        try{
            $q = new Question([
                'title' => $request->question_data['title'],
                'description' => $request->question_data['description'],
                'answers' => json_encode($request->answersList),
                'is_required' => true,
                'order' => $order,
                'id_section' => $request->id_section            
            ]);
    
   
            $q->save();
    
        }catch(Throwable $e){
            return $e;
        }
        
        return true;
    }

    /**
     * Delete Question.
     *
     * @return void
     */

    public function deleteQuestion($id){

        $questionToDelete= Question::find($id);
        Question::where('order','>',$questionToDelete->order)->decrement('order');
        $questionToDelete->delete();  
        return back();      
        
    }


    public function upQuestion($id,$pos){  
        
        $questionToIncrement = Question::where('order',$pos-1)->first();
        
        if($questionToIncrement!=null){
            $questionToIncrement->increment('order');
            Question::find($id)->decrement('order'); 
        }else{
            dd('prima domanda');
        }
        return back();      
    }

    public function downQuestion($id,$pos){        
       

        $questionToDecrement=Question::where('order',$pos+1)->first();
       
        if($questionToDecrement!= null){
            $questionToDecrement->decrement('order');
            Question::find($id)->increment('order');
        }else{
            dd('ultima domanda');
        }
        return back();         
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
        try{
            Question::find($request->question['id'])->update($request->question);
        }catch(Throwable $e){
            return $e;
        }
       
        return true;
     
    }

        /**
     * Show Edit Question.
     *
     * @return void
     */
    public function showViewQuestion($id){
        $question = Question::find($id);
        return view('admin/question/view',['question' => $question,'answers'=>json_decode($question->answers)]);
    }

    /**
     * Show Create new Promo.
     *
     * @return void
     */
    public function showCreatePromo($id){
        return view('admin/promo/create',['id_section' => $id]);
    }


    /**
     * Create new Promo.
     *
     * @return void
     */
    public function createPromo(Request $request){

        $result =$request->all();
        
        $i=1;



        if($request->id_section==1){

            $infoPrice = [
                'typeWeb' => [],
                'pricePage' => [],
                'addService' => [],
            ];
            while(isset($result['typeWeb'.$i])){
                array_push($infoPrice['typeWeb'],$result['typeWeb'.$i]);
                $i++;
            }
            $i=1;
            while(isset($result['pricePage'.$i])){
                array_push($infoPrice['pricePage'],$result['pricePage'.$i]);
                $i++;
            }
            $i=1;
            while(isset($result['addService'.$i])){
                array_push($infoPrice['addService'],$result['addService'.$i]);
                $i++;
            }

        }else if($request->id_section==3){

            $infoPrice = [
                'typeApp' => [],
                'infoApp' => [],
                'addService' => [],
            ];
            while(isset($result['typeApp'.$i])){
                array_push($infoPrice['typeApp'],$result['typeApp'.$i]);
                $i++;
            }
            $i=1;
            while(isset($result['infoApp'.$i])){
                array_push($infoPrice['infoApp'],$result['infoApp'.$i]);
                $i++;
            }
            $i=1;
            while(isset($result['addService'.$i])){
                array_push($infoPrice['addService'],$result['addService'.$i]);
                $i++;
            }

        }


        $newImageName = time().'-'.$request->title . '.'.$request->image->extension();
        
        self::uploadPhoto($request->image,$newImageName);

        $p = new Promo([
            'title' => $request->title,
            'description' => $request->description,
            'email' => $request->email,
            'score' => $request->score,
            'image' => URL::asset('images').'/'.$newImageName,
            'id_section' => $request->id_section
        ]);

        if(isset($request->price)){
            $p->price = $request->price;
        }
        
        if(isset($infoPrice)){
            $p->price = json_encode($infoPrice);
        }

        if(isset($request->promoMessage)){
        
            $p->promoMessage = $request->promoMessage;
        }

        if(isset($request->tag1)){
            $p->tag1 = 1;
        }else{
            $p->tag1 = 0;
        }

        if(isset($request->tag2)){
            $p->tag2 = 1;
        }else{
            $p->tag2 = 0;
        }
        
        if(isset($request->tag3)){
            $p->tag3 = 1;
        }else{
            $p->tag3 = 0;
        }

        $p->save();

        return back();              

    }

        /**
     * Show Create new Promo.
     *
     * @return void
     */
    public function showViewPromo($id){
        $p = Promo::find($id)->get();
        $p[0]->total = "500";

        return view('admin/promo/view',['promos' => $p]);
    }

    public function deletePromo($id){

        $promoToDelete= Promo::find($id);
        $imgPath='images/'.$promoToDelete->image;
        self::deletePhoto($imgPath);
        $promoToDelete->delete();
        return back();      
    }

    
    public function premiumPromo($id){

        $promoToEdit= Promo::where('isPremium',true)->first();

        if($promoToEdit!=null){
            $promoToEdit->isPremium=false;
            $promoToEdit->update();
        }

        $promoToEdit= Promo::find($id);
        $promoToEdit->isPremium=true;
        $promoToEdit->update();

        return back();      
    }
     
    /**
     * Show Edit Promo.
     *
     * @return void
     */
    public function showEditPromo($id){
        $promo = Promo::find($id);
        return view('admin/promo/edit',['promo' => $promo]);
    }

        /**
     * Edit Promo.
     *
     * @return void
     */
    public function EditPromo(Request $request){
        $p= Promo::find($request->id);
        $i=1;
        
        $result =$request->all();
 

        if($request->id_section==1){

            $infoPrice = [
                'typeWeb' => [],
                'pricePage' => [],
                'addService' => [],
            ];
            while(isset($result['typeWeb'.$i])){
                array_push($infoPrice['typeWeb'],$result['typeWeb'.$i]);
                $i++;
            }
            $i=1;
            while(isset($result['pricePage'.$i])){
                array_push($infoPrice['pricePage'],$result['pricePage'.$i]);
                $i++;
            }
            $i=1;
            while(isset($result['addService'.$i])){
                array_push($infoPrice['addService'],$result['addService'.$i]);
                $i++;
            }

        }else if($request->id_section==3){

            $infoPrice = [
                'typeApp' => [],
                'infoApp' => [],
                'addService' => [],
            ];
            while(isset($result['typeApp'.$i])){
                array_push($infoPrice['typeApp'],$result['typeApp'.$i]);
                $i++;
            }
            $i=1;
            while(isset($result['infoApp'.$i])){
                array_push($infoPrice['infoApp'],$result['infoApp'.$i]);
                $i++;
            }
            $i=1;
            while(isset($result['addService'.$i])){
                array_push($infoPrice['addService'],$result['addService'.$i]);
                $i++;
            }

        }


 
        if(isset($request->price)){
            $p->price = $request->price;
        }
        
        if(isset($infoPrice)){
            $p->price = json_encode($infoPrice);
        }

        if(isset($request->promoMessage)){
        
            $p->promoMessage = $request->promoMessage;
        }else{
            $p->promoMessage=null;
        }

        if(isset($request->tag1)){
            $p->tag1 = 1;
        }else{
            $p->tag1 = 0;
        }

        if(isset($request->tag2)){
            $p->tag2 = 1;
        }else{
            $p->tag2 = 0;
        }
        
        if(isset($request->tag3)){
            $p->tag3 = 1;
        }else{
            $p->tag3 = 0;
        }


        if($request->hasFile('image')){
            if($request->image->getClientOriginalName()!==$p->image){
                $imgPath='images/'.$p->image;
                self::deletePhoto($imgPath);
        
                $newImageName = time().'-'.$request->title . '.'.$request->image->extension();
                self::uploadPhoto($request->image,$newImageName);
                $p->image =URL::asset('images').'/'.$newImageName;
                          
                
            }
        }
        $p->title=$request->title;
        $p->email=$request->email;
        $p->description=$request->description;
        $p->score=$request->score;

        $p->update();  
        return back();
    }
    

    public function deletePhoto($imgPath){                
       
        if( File::exists(public_path($imgPath)) ) {
            File::delete(public_path($imgPath));
        }
    }

    public function uploadPhoto($image,$newImageName){   
                   
        $image->move(public_path('images'), $newImageName);
    }


    public function listRequests(){
        $a = Answer::all()->sortBy('created_at');
        $i=0;
        while($i<sizeof($a)){
            $p = Promo::find($a[$i]->id_promo);
            if($p!==null){
                $a[$i]->name_promo = $p->title;
            }else{
                $a[$i]->name_promo = "Promo non trovata";
                $a[$i]->id_promo = null;
            }


            $i++;
        }       
               
        return view('admin/estimate/list',['requests' => $a]);
    }

    public function deleteAnswer($id){
        Answer::find($id)->delete();
        return redirect('/admin/estimateRequest');
    }

        /**
     * Show Create new Question.
     *
     * @return void
     */
    public function showCreateSection(){
        return view('admin/section/create');
    }

    public function createSection(Request $request){

        $request->validate([
            'title' => 'required'
        ]);
                       
        $s = new Section([
            'title' => $request->title,
        ]);

        $s->save();

        return back();              

    }

}
