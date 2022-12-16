@php
    use App\Http\Controllers\GlobalDeclare;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($message = Session::get('success'))
                <div class="form-group">
                    <div class="alert alert-success alert-dismissible fade show" id="success-alert">
                        <p> {{ $message }}</p>
                    </div>
                </div>
            @endif
            @if ($message = Session::get('failed'))
            <div class="form-group">
                <div class="alert alert-danger alert-dismissible fade show" id="success-alert">
                    <p> {{ $message }}</p>
                </div>
            </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="color-purple">
                        <strong>My Vehicle</strong>
                    </h4>
                </div>
                <div class="card-body">
                    

                    <form action="" method="post">
                        @csrf @method("POST")

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Driver Name</label>
                            <div class="col-md-6">
                               <h5 class="form-control b-zero">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} {{ (new GlobalDeclare)->suffix(Auth::user()->suffix) }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Brand name</label>
                            <div class="col-md-6">
                                <h5 class="form-control b-zero">{{ $vehicle[0]->brand }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Model</label>
                            <div class="col-md-6">
                                <h5 class="form-control b-zero">{{ $vehicle[0]->model }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Color</label>
                            <div class="col-md-6">
                                <h5 class="form-control b-zero">{{ $vehicle[0]->color }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Plate Number</label>
                            <div class="col-md-6">
                                <h5 class="form-control b-zero">{{ $vehicle[0]->plate_number }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Energy Source</label>
                            <div class="col-md-6">
                                <h5 class="form-control b-zero">{{ $vehicle[0]->energy_source }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Number of Seat(s)</label>
                            <div class="col-md-6">
                                <h5 class="form-control b-zero">{{ $vehicle[0]->number_of_seats }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Status</label>
                            <div class="col-md-6">
                                <h5 class="form-control b-zero">{{ (new GlobalDeclare)->vehicle_status($vehicle[0]->status) }}</h5>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('dr-vehicle-available', ['id' => $vehicle[0]->id ]) }}" class="btn btn-success m-1">
                                    Available
                                </a>
                                <a href="{{ route('dr-vehicle-unavailable', ['id' => $vehicle[0]->id ]) }}" class="btn btn-danger m-1">
                                    Unavailable
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
