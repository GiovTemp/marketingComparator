@extends('layouts.appAdmin')

@section('content')

<div class="container-fluid py-4">



      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Lista Domande</h6><button type="button" class="btn btn-primary" style="background-color: green;"><a style="color:white;" href="{{route('showCreateQuestion',[$id])}}">Crea Nuova Domanda</a></button>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>

                @foreach ($questions as $q)
                <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0"> Id </p>
                          <h6 class="text-sm mb-0">{{ $q->id }}</h6>
                        </div>
                      </div>
                    </td>
                    <!--
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Posizione</p>
                        <h6 class="text-sm mb-0">{{ $q->order }}</h6>
                      </div>
                    </td>
                      -->
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Titolo</p>
                        <h6 class="text-sm mb-0">{{ $q->title }}</h6>
                      </div>
                    </td>
      
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <button type="button" class="btn btn-primary" style="background-color: blue;"><a style="color:white;" href="{{route('viewQuestion',[$q->id])}}">View</a></button>
                        <button type="button" class="btn btn-primary" style="background-color: green;"><a style="color:white;" href="{{route('editQuestion',[$q->id])}}">Edit</a></button>
                        <button type="button" class="btn btn-primary" style="background-color: red;"><a style="color:white;" href="{{route('deleteQuestion',[$q->id])}}">Delete</a></button>

                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <button type="button" class="btn btn-primary"><a style="color:white;" href="{{route('upQuestion',[$q->id,$q->order])}}">Up</a></button>
                        <button type="button" class="btn btn-primary"><a  style="color:white;" href="{{route('downQuestion',[$q->id,$q->order])}}">Down</a></button>
                      </div>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Offerta in Promozione</h6>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                @empty(!$premium)
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Nome Offerta</p>
                          <h6 class="text-sm mb-0"> {{ $premium->title }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Score</p>
                        <h6 class="text-sm mb-0"> {{ $premium->score }}</h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <button type="button" class="btn btn-primary" style="background-color: blue;"><a style="color:white;" href="{{route('viewPromo',[$premium->id])}}">View</a></button>
                        <button type="button" class="btn btn-primary" style="background-color: green;"><a style="color:white;" href="{{route('editPromo',[$premium->id])}}">Edit</a></button>
                        <button type="button" class="btn btn-primary" style="background-color: red;"><a style="color:white;" href="{{route('deletePromo',[$premium->id])}}">Delete</a></button>
                      </div>
                    </td>
                  </tr>
                  @endempty         
   
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Lista Offerte</h6> <button type="button" class="btn btn-primary" style="background-color: green;"><a style="color:white;" href="{{route('showCreatePromo',[$id])}}">Crea Nuova Promozione</a></button>

              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                @foreach ($promos as $p)
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Nome Offerta</p>
                          <h6 class="text-sm mb-0"> {{ $p->title }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Score</p>
                        <h6 class="text-sm mb-0"> {{ $p->score }}</h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <button type="button" class="btn btn-primary" style="background-color: blue;"><a style="color:white;" href="{{route('viewPromo',[$p->id])}}">View</a></button>
                        <button type="button" class="btn btn-primary" style="background-color: green;"><a style="color:white;" href="{{route('editPromo',[$p->id])}}">Edit</a></button>
                        <button type="button" class="btn btn-primary" style="background-color: red;"><a style="color:white;" href="{{route('deletePromo',[$p->id])}}">Delete</a></button>
                        <button type="button" class="btn btn-warning" style="background-color: rgb(221, 175, 39);"><a style="color:white;" href="{{route('premiumPromo',[$p->id])}}">Premium</a></button>

                      </div>
                    </td>
                  </tr>
                              
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div


@endsection
