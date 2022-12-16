@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-">
                <div class="row justify-content-center">
                    <div class="col-3 m-1">
                        <img src="{{ URL::to('assets/images/SLSU-Logo.png') }}" height="300" width="300" alt="">
                    </div>

                    <div class="form-group p-1">
                        <h3 class="text-center">Welcome to <strong>VReTOMS</strong> </h3>
                    </div>
                    <div class="form-group p-1">
                        <h4 class="text-center">Vehicle Reservation & Travel Order Management System</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
