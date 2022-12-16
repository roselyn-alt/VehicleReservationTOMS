@extends('layouts.layout')
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="card col-10">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-sm-5">
                            <lord-icon
                                src="https://cdn.lordicon.com/ajkxzzfb.json"
                                trigger="hover"
                                colors="primary:#ffc738,secondary:#8930e8"
                                style="width:420px;height:420px">
                            </lord-icon>
            
                            <h4  class="text-center">
                                <strong>
                                    {{ $response }}
                                </strong>
                            </h4>
                        </div>
                    </div>
            
                    <div class="row justify-content-center">
                        <div class="col-sm-5">
                           <a class="btn btn-primary btn-purple col-12" href="{{ url('/') }}"> Home </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection