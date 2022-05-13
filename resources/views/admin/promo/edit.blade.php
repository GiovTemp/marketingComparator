@extends('layouts.appAdmin')

@section('content')



<div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Modifica Offerta</h6>
            </div>
            <div class="card-body p-3">
            @switch($promo->id_section)
              @case(1)
                <form-promo-web-edit :promo="{{$promo}}" csrf="{{csrf_token()}}"></form-promo-web>
                 @break
          
              @case(2)
                <form-promo-marketing-edit :promo="{{$promo}}" csrf="{{csrf_token()}}"></form-promo-marketing>
                @break

              @case(3)
                <form-promo-app-edit :promo="{{$promo}}" csrf="{{csrf_token()}}"></form-promo-app>
                @break
          
              @default
                <form-promo-edit :promo="{{$promo}}" csrf="{{csrf_token()}}"></form-promo>
          @endswitch

            </div>
          </div>
        </div>
      </div>
    </div>


@endsection




