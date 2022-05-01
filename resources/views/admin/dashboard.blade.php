@extends('layouts.appAdmin')

@section('content')

<div class="container-fluid py-4">


<div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Sezioni Disponibili</h6>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>

                @foreach ($sections as $s)
                <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0"> Id </p>
                          <h6 class="text-sm mb-0">{{ $s->id }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Titolo</p>
                        <h6 class="text-sm mb-0">{{ $s->title }}</h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <button type="button" class="btn btn-primary" style="background-color: blue;"><a style="color:white;" href="{{route('dashboardSection',[$s->id])}}">Dashboard</a></button>
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
    </div>


@endsection
