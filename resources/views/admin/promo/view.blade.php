@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('homeAssets/assets/css/listPromo.css') }}">
@endsection
@section('content')

<div id="app" >
  <list style="margin-top:5vw;margin-bottom:5vw;" :promos="{{$promos}}"></list>
</div>


@endsection
