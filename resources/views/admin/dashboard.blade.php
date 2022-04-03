@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin {{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <br>

                    <a href="/admin/createQuestion">Aggiugi Domanda</a>
                    <a href="/admin/createPromo">Inserisci Offerta</a>

                    <br><br>

                    Lista Domande

                    @foreach ($questions as $q)
                    <br>
                        {{ $q->order }}
                        {{ $q->title }}
                        {{ $q->is_required }}
                        <button><a href="{{route('viewQuestion',[$q->id])}}">View</a></button>
                        <button><a href="{{route('editQuestion',[$q->id])}}">Edit</a></button>
                        <button><a href="{{route('deleteQuestion',[$q->id])}}">Delete</a></button>
                        <button><a href="{{route('upQuestion',[$q->id,$q->order])}}">Up</a></button>
                        <button><a href="{{route('downQuestion',[$q->id,$q->order])}}">Down</a></button>
                             
                    @endforeach

                    <hr>
                    Lista Promo
                    @foreach ($promos as $p)
                    <br>
                        {{ $p->title }}
                        {{ $p->score }}
                        {{ $p->price }}
                        <button><a href="{{route('viewPromo',[$p->id])}}">View</a></button>
                        <button><a href="{{route('editPromo',[$p->id])}}">Edit</a></button>
                        <button><a href="{{route('deletePromo',[$p->id])}}">Delete</a></button>
                             
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
