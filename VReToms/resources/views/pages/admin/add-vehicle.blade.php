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

        {{-- Add driver modal --}}
            <div class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Select Driver for this Vehicle</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row col-12">
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="search" id="search">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-purple" id="search-btn">Search</button>
                            </div>
                        </div>

                        <div class="row col-12 justify-content-center">
                            <div class="div col-10 p-1 m-2" id="search-results">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="dismiss-modal" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
        {{-- end --}}

            <div class="card">
                <div class="card-header">
                    <h4 class="color-purple">
                        <strong>Add Vehicle</strong>
                    </h4>
                </div>
                <div class="card-body">
                    

                    <form action="{{ route('add-vehicle') }}" method="post">
                        @csrf @method("POST")

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Driver Name</label>
                            <div class="col-md-5">
                                <input type="text" name="driver_id" class="form-control d-none"  id="driver-id" required>
                                <input id="driver-name" disabled type="text" class="form-control @error('driver_name') is-invalid @enderror" name="brand" value="{{ old('driver_name') }}" required autocomplete="driver_name" autofocus>
                                @error('driver_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-primary btn-purple" type="button" id="add-driver">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                  </svg>
                                </a>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Brand name</label>
                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" value="{{ old('brand') }}" required autocomplete="brand" autofocus>
                                @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Model</label>
                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="model" value="{{ old('color') }}" required autocomplete="color" autofocus>
                                @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Color</label>
                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color') }}" required autocomplete="color" autofocus>
                                @error('color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Plate Number</label>
                            <div class="col-md-6">
                                <input id="plate_number" type="text" class="form-control @error('plate_number') is-invalid @enderror" name="plate_number" value="{{ old('plate_number') }}" required autocomplete="plate_number" autofocus>
                                @error('plate_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Energy Source</label>
                            <div class="col-md-6">
                                <input id="energy_source" type="text" class="form-control @error('plate_number') is-invalid @enderror" name="energy_source" value="{{ old('energy_source') }}" required autocomplete="energy_source" autofocus>
                                @error('energy_source')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Number of Seat(s)</label>
                            <div class="col-md-6">
                                <input id="number_of_seats" type="text" class="form-control @error('number_of_seats') is-invalid @enderror" name="number_of_seats" value="{{ old('number_of_seats') }}" required autocomplete="number_of_seats" autofocus>
                                @error('number_of_seats')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-purple">
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



<script>
    // this will show modal
        $(document).on('click', '#add-driver', function (e) {
            e.preventDefault();
            $('.modal').modal('show');
        });
    // end
    

    // this will close add drive modal
        $(document).on('click', '#dismiss-modal', function (e) {
            e.preventDefault();
            $('.modal').modal('hide');
        });
    // end

    // this will implement driver name search
        $(document).on('click', '#search-btn', function(e) {
            e.preventDefault();
            // implement search
            $.ajax({
                type: "post",
                url: "/admin/fetch-emmployee/driver",
                data:{'search' : $('#search').val()},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                success: function (response) {
                    $('#search-results').html('');
                   if(response['status'] == 200) {
                        for (let index = 0; index < response['data'].length; index++) {
                            console.log(response['data'][index]['first_name']);
                            // this will append search result as buttons
                            $("#search-results").append(
                                $('<div class="row m-1"><input class="btn btn-primary btn-purple" id="search-result" data-employee-id="'+ response['data'][index]['id'] +'" data-first-name="'+ response['data'][index]['first_name'] +'" data-last-name="'+ response['data'][index]['last_name'] +'" data-suffix="'+ response['data'][index]['suffix'] +'" type="button" value="'+ response['data'][index]['first_name'] +" "+ response['data'][index]['last_name']+" "+ response['data'][index]['suffix'] +'"/></div>')
                            );
                        }
                   } else {
                        
                        $("#search-results").append(
                            $('<p class="text-center text-danger"><strong>'+ response['message'] +'</strong></p>')
                        );
                   }
                }
            });
        });
    // end

    // this will append the clicked search result to the driver name id
        $(document).on('click', '#search-result', function(e) {
            e.preventDefault();
                $('#driver-id').val($(this).data('employee-id'));
                $('#driver-name').val($(this).data('first-name') +" "+ $(this).data('last-name') +" "+ $(this).data('suffix'));
                $('.modal').modal('hide');
        });
    // end
</script>
@endsection
