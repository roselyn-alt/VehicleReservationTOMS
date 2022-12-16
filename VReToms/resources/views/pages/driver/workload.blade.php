@php
    use App\Http\Controllers\GlobalDeclare;
    // dd($workload);
@endphp
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($message = Session::get('success'))
                    <div class="form-group">
                        <div class="alert alert-success alert-dismissible fade show" id="success-alert">
                            {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
                            <p> {{ $message }}</p>
                        </div>
                    </div>
                @endif
                @if ($message = Session::get('failed'))
                    <div class="form-group">
                        <div class="alert alert-danger alert-dismissible fade show" id="success-alert">
                            {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
                            <p> {{ $message }}</p>
                        </div>
                    </div>
                @endif
        
                <div class="card">
                    <div class="card-header">
                        <h4 class="color-purple">
                            <strong>Your Workload</strong>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf @method("POST")
    
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label text-md-end">Date</label>
                                <div class="col-md-6">
                                    {{-- <h5 class="form-control">{{ $workload->date }}</h5> --}}
                                    <h5 class="form-control">{{  explode('-', date('F j, Y-', strtotime($workload[0]->date)))[0]   }}</h5>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label text-md-end">Requesting Office</label>
                                <div class="col-md-6">
                                    <h5 class="form-control">{{ $workload[0]->requesting_office }}</h5>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label text-md-end">Type of Vehicle</label>
                                <div class="col-md-6">
                                    <h5 class="form-control">{{ $workload[0]->type_of_vehicle }}</h5>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label text-md-end">Date of Travel</label>
                                <div class="col-md-6">
                                   <h5 class="form-control">{{ $workload[0]->date_of_travel }}</h5>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Departure Time</label>
                                <div class="col-md-6">
                                   <h5 class="form-control">{{ $workload[0]->departure_time }}</h5>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label text-md-end">Estimated Date of Arrival</label>
                                <div class="col-md-6">
                                   <h5 class="form-control">{{ $workload[0]->arrival_date }}</h5>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Estimated Time of Arrival</label>
                                <div class="col-md-6">
                                    <h5 class="form-control">{{ $workload[0]->arrival_time }}</h5>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Starting Location</label>
                                <div class="col-md-6">
                                    <h5 class="form-control">{{ $workload[0]->starting_location }}</h5>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Destination</label>
                                <div class="col-md-6">
                                    <h5 class="form-control">{{ $workload[0]->destination }}</h5>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Estimated Liters</label>
                                <div class="col-md-6">
                                    <h5 class="form-control">{{ $workload[0]->estimated_liters }} liter(s)</h5>
                                </div>
                            </div>
    
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Name of Passenger(s)</label>
                                <div class="col-md-6" id="passenger-div">
                                   @foreach ($workload as $item)
                                        @foreach ($item->name_of_passengers as $item2)
                                            <h5 class="form-control">{{ $item2 }}</h5>
                                        @endforeach
                                   @endforeach
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Purpose</label>
                                <div class="col-md-6">
                                    <h5 class="form-control">{{ $workload[0]->purpose }} liters</h5>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection