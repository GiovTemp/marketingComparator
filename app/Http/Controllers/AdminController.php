<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Promo;

use File;
use Illuminate\Support\Str;


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
        $questions = Question::all()->sortBy('order');
        $promos = Promo::all();
        $premium= Promo::where('isPremium',true)->first();
       
        return view('admin/dashboard',['questions' => $questions,'promos'=>$promos,'premium'=>$premium]);
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
        $request->answers = Str::replaceArray('\/', [' '],   $request->answers);
      
        
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
            'is_required' => true,
            'order' => $order
        ]);

        $q->save();

        return redirect('/admin');
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
        return redirect('/admin');      
        
    }


    public function upQuestion($id,$pos){  
        
        $questionToIncrement = Question::where('order',$pos-1)->first();
        
        if($questionToIncrement!=null){
            $questionToIncrement->increment('order');
            Question::find($id)->decrement('order'); 
        }else{
            dd('prima domanda');
        }
        return redirect('/admin');     

    }

    public function downQuestion($id,$pos){        
       

        $questionToDecrement=Question::where('order',$pos+1)->first();
       
        if($questionToDecrement!= null){
            $questionToDecrement->decrement('order');
            Question::find($id)->increment('order');
        }else{
            dd('ultima domanda');
        }
        return redirect('/admin');       
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
        return redirect('/admin');       
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
    public function showCreatePromo(){
        return view('admin/promo/create');
    }


    /**
     * Create new Promo.
     *
     * @return void
     */
    public function createPromo(Request $request){

        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time().'-'.$request->title . '.'.$request->image->extension();
        
        self::uploadPhoto($request->image,$newImageName);
                
        $p = new Promo([
            'title' => $request->title,
            'description' => $request->description,
            'score' => $request->score,
            'price' => $request->price,
            'image' => $newImageName
        ]);

        if(isset($request->promoMessage)){
        
            $p->promoMessage = $request->promoMessage;
        }

        $p->save();

        return redirect('/admin');
        

    }

        /**
     * Show Create new Promo.
     *
     * @return void
     */
    public function showViewPromo($id){
        $p = Promo::find($id);
        return view('admin/promo/view',['promo' => $p]);
    }

    public function deletePromo($id){

        $promoToDelete= Promo::find($id);
        $imgPath='images/'.$promoToDelete->image;
        self::deletePhoto($imgPath);
        $promoToDelete->delete();
        return redirect('/admin');  

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

        return redirect('/admin');  

    }
    
    

        
    /**
     * Show Edit Question.
     *
     * @return void
     */
    public function showEditPromo($id){
        $promo = Promo::find($id);
        return view('admin/promo/edit',['promo' => $promo]);
    }

        /**
     * Edit Question.
     *
     * @return void
     */
    public function EditPromo(Request $request){
        $promoToEdit= Promo::find($request->id);
        
        if($request->hasFile('image')){
            if($request->image->getClientOriginalName()!==$promoToEdit->image){
                $imgPath='images/'.$promoToEdit->image;
                self::deletePhoto($imgPath);
        
                $newImageName = time().'-'.$request->title . '.'.$request->image->extension();
                self::uploadPhoto($request->image,$newImageName);
                $promoToEdit->image = $newImageName;
                          
                
            }
        }
        $promoToEdit->title=$request->title;
        $promoToEdit->description=$request->description;
        $promoToEdit->score=$request->score;
        $promoToEdit->price=$request->price;

        $promoToEdit->update();  
        return redirect('/admin');     
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

}
