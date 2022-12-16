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
                <div class="card-header">Add Departments</div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf @method("POST")
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Deparement Name</label>
                            <div class="col-md-6">
                                <input id="department_name" type="text" class="form-control @error('department_name') is-invalid @enderror" name="department_name" value="{{ old('brand') }}" required autocomplete="brand" autofocus>
                                @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Vehicle
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
