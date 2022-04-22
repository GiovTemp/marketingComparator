@extends('layouts.appAdmin')

@section('content')

<div class="container-fluid py-4">

      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Lista Preventivi Richiesti</h6>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>

                @foreach ($requests as $r)
                <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0"> Nome  </p>
                          <h6 class="text-sm mb-0"> {{ $r->name }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Cognome</p>
                        <h6 class="text-sm mb-0"> {{ $r->surname }}</h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Email</p>
                        <h6 class="text-sm mb-0">{{ $r->email }}</h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Codice Fiscale</p>
                        <h6 class="text-sm mb-0"> {{ $r->cf }}</h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">P.Iva</p>
                        <h6 class="text-sm mb-0">  {{ $r->iva }}</h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Promo Richiesta</p>
                        <h6 class="text-sm mb-0">  {{ $r->name_promo }} </h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                      @if ($r->id_promo !== null)
                        <button type="button" class="btn btn-primary" style="background-color: blue;"><a style="color:white;" href="{{route('viewPromo',[$r->id_promo])}}">View Promo</a></button>
                        @endif
                        <button type="button" class="btn btn-primary" style="background-color: red;"><a style="color:white;" href="{{route('deleteAnswer',[$r->id])}}">Delete</a></button>

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

