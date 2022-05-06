@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('homeAssets/assets/css/listPromo.css') }}">
@endsection
@section('content')

<div class="container">
<div class="row" style="margin-top:20px;">
        <div class="col-lg-12">
            <div class="card bottom-line" style="width: 100%;">          
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container-fluid">
                                    <h3 class="card-title" style="text-align: center;">Riepilogo servizi selezionati</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <p class="card-text">Presto Disponibile</p>
                                        </div>

                                    </div>
                                </div>
   
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </div> 
</div>
 

<div id="app" >
  <list style="margin-top:5vw;margin-bottom:5vw;" :promos="{{$promos}}"></list>
</div>


@endsection
