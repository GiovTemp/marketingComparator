@extends('layouts.app')

@section('content')

<div class="container" style="text-align:center;">

<div class="container mt-100">
                            		

                            	
<div class="row" style="margin-top:3vh;margin-bottom:3vh;">
        <div class="col-lg-12">
            <h2>Seleziona il tipo di promozione che desideri</h2><br>
            <h4>Compila il questionario e troveremo le migliori offerte per te</h4>
        </div>
    </div>         
   <div class="row">
               <div class="col-md-4 col-sm-6">
                 <div class="card mb-30"><a class="card-img-tiles" href="{{route('questions',1)}}" data-abc="true">
                     <div class="inner">
                       <div class="main-img"><img src="{{ URL::asset('homeAssets/assets/img/website.jpg') }}" alt="Category"></div>
                       <div class="thumblist"><img src="{{ URL::asset('homeAssets/assets/img/wp.png') }}" alt="Category"><img src="{{ URL::asset('homeAssets/assets/img/shopify.svg') }}" alt="Category"></div>
                     </div></a>
                   <div class="card-body text-center">
                     <h4 class="card-title">Web Development</h4>
                     <p class="text-muted">Le migliori promozioni per lo sviluppo di siti web</p><a class="btn btn-outline-primary btn-sm" href="{{route('questions',1)}}" data-abc="true">View Promo</a>
                   </div>
                 </div>
               </div>
               <div class="col-md-4 col-sm-6">
                 <div class="card mb-30"><a class="card-img-tiles" href="{{route('questions',2)}}" data-abc="true">
                     <div class="inner">
                       <div class="main-img"><img src="{{ URL::asset('homeAssets/assets/img/app.jpg') }}" alt="Category"></div>
                       <div class="thumblist"><img src="{{ URL::asset('homeAssets/assets/img/android_logo.png') }}" alt="Category"><img src="{{ URL::asset('homeAssets/assets/img/ios.png') }}" alt="Category"></div>
                     </div></a>
                   <div class="card-body text-center">
                     <h4 class="card-title">App Development</h4>
                     <p class="text-muted">Le migliori promozioni per lo sviluppo di App Android e IOS</p><a class="btn btn-outline-primary btn-sm" href="{{route('questions',2)}}" data-abc="true">View Promo</a>
                   </div>
                 </div>
               </div>
               <div class="col-md-4 col-sm-6">
                 <div class="card mb-30"><a class="card-img-tiles" href="{{route('questions',3)}}" data-abc="true">
                     <div class="inner">
                       <div class="main-img"><img src="{{ URL::asset('homeAssets/assets/img/marketing.jpg') }}" alt="Category"></div>
                       <div class="thumblist"><img src="{{ URL::asset('homeAssets/assets/img/social.jpg') }}" alt="Category"><img src="{{ URL::asset('homeAssets/assets/img/wordcloud.png') }}" alt="Category"></div>
                     </div></a>
                   <div class="card-body text-center">
                     <h4 class="card-title">Marketing</h4>
                     <p class="text-muted">Le migliori promozioni per le tue campagne marketing</p><a class="btn btn-outline-primary btn-sm" href="{{route('questions',3)}}" data-abc="true">View Promo</a>
                   </div>
                 </div>
               </div>
             </div>
             </div>




</div>





@endsection