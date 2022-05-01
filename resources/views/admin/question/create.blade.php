@extends('layouts.appAdmin')

@section('content')

<div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Create Questions</h6>
            </div>
            <div class="card-body p-3">
              <form-create-question :section_id="{{$id}}"></form-create-question>
            </div>
          </div>
        </div>
      </div>
    </div>




@endsection