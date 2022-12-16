@php
    use App\Http\Controllers\GlobalDeclare;
    use Carbon\Carbon;
    $current_date = Carbon::now()->format('Y-m-d');
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
                    <div class="alert alert-danger alert-dismissible fade show" id="danger-alert">
                        <p> {{ $message }}</p>
                    </div>
                </div>
            @endif
            @if ( count($errors) > 0)
                <div class="form-group">
                    <div class="alert alert-danger alert-dismissible fade show" id="danger-alert">
                        @foreach ($errors->all() as $item)
                            <p>{{ $item }}</p>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Vehicle Full info --}}
                <div class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Vehicle Information</h5>
                        </div>
                        <div class="modal-body">
                            <div class="m-1 p-1" id="search-result">
                                <div class="form-group">
                                    
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
                        <strong>Travel Request Form</strong>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('travel-request') }}" method="post">
                        @csrf @method("POST")

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Date</label>
                            <div class="col-md-6">
                                <h5 class="form-control">{{  explode('-', date('F j, Y-', strtotime($current_date)))[0]   }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Requesting Office</label>
                            <div class="col-md-6">
                                <input id="requesting_office" required type="text" class="form-control @error('requesting_office') is-invalid @enderror" name="requesting_office" value="{{ old('requesting_office') }}" required autocomplete="requesting_office" autofocus>
                                @error('requesting_office')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Type of Vehicle</label>
                            <div class="col-md-5">
                                <select name="type_of_vehicle" name="type_of_vehicle" id="type-of-vehicle" class="form-control" required>
                                    <option value="">-- Choose from Option --</option>
                                    @foreach ($vehicles as $item)
                                        <option value="{{ $item->id }}">{{ $item->model }}</option>
                                    @endforeach
                                </select>
                                @error('type_of_vehicle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-primary btn-purple" id="full-info-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                      </svg>
                                </button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Date of Travel</label>
                            <div class="col-md-6">
                                <input id="date_of_travel" type="date" class="form-control @error('date_of_travel') is-invalid @enderror" name="date_of_travel" value="{{ old('date_of_travel') }}" required autocomplete="date_of_travel" autofocus>
                                @error('date_of_travel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Departure Time</label>
                            <div class="row col-md-6">
                               <div class="col-md-4">
                                <select name="dt_hour" id="" class="form-control" required>
                                    <option value="">Hour</option>
                                    @for ($i = 1; $i < 12; $i++)
                                        @if ($i < 10)
                                            <option value="0{{ $i }}">0{{ $i }}</option>
                                        @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                    @endfor
                                </select>
                                    @error('hodt_hourur')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                               
                               <div class="col-md-4">
                                <select name="dt_minute" id="" class="form-control" required>
                                    <option value="">Minute</option>
                                    <option value="00">00</option>
                                    <option value="30">30</option>
                                </select>
                                @error('dt_minute')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>

                               <div class="col-md-4">
                                <select name="dt_am_pm" id="" class="form-control" required>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                                @error('dt_am_pm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Estimated Date of Arrival</label>
                            <div class="col-md-6">
                                <input id="arrival_date" type="date" class="form-control @error('arrival_date') is-invalid @enderror" name="arrival_date" value="{{ old('arrival_date') }}" required autocomplete="arrival_date" autofocus>
                                @error('arrival_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Estimated Time of Arrival</label>
                            <div class="row col-md-6">
                               <div class="col-md-4">
                                <select name="da_hour" id="" class="form-control" required>
                                    <option value="">-- Hour --</option>
                                    @for ($i = 1; $i < 12; $i++)
                                        @if ($i < 10)
                                            <option value="0{{ $i }}">0{{ $i }}</option>
                                        @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                    @endfor
                                </select>
                                    @error('da_hour')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                               
                               <div class="col-md-4">
                                <select name="da_minute" id="" class="form-control" required>
                                    <option value="">-- Minute --</option>
                                    <option value="00">00</option>
                                    <option value="30">30</option>
                                </select>
                                @error('da_minute')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>

                               <div class="col-md-4">
                                <select name="da_am_pm" id="" class="form-control" required>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                                @error('da_am_pm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Starting Location</label>
                            <div class="col-md-6">
                                <input id="start-starting_location" type="text" class="form-control @error('starting_location') is-invalid @enderror" name="starting_location" value="{{ old('starting_location') }}" required autocomplete="starting_location" autofocus>
                                @error('starting_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Destination</label>
                            <div class="col-md-6">
                                <input id="destination" type="text" class="form-control @error('destination') is-invalid @enderror" name="destination" value="{{ old('destination') }}" required autocomplete="destination" autofocus>
                                @error('destination')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Estimated Liters</label>
                            <div class="col-md-6">
                                <input id="estimated_liters" type="number" class="form-control @error('destination') is-invalid @enderror" name="estimated_liters" value="{{ old('estimated_liters') }}" required autocomplete="estimated_liters" autofocus>
                                @error('estimated_liters')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name of Passenger(s)</label>
                            <div class="col-md-5" id="passenger-div">
                                <input class="form-control m-1" type="text" name="name_of_passenger[]" required id="name_of_passenger">
                                @error('name_of_passenger')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-primary btn-purple m-1" type="button" id="add-passenger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                  </svg>
                                </a>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Purpose</label>
                            <div class="col-md-6">
                                <textarea name="purpose" id="" cols="30" rows="5" class="form-control @error('number_of_seats') is-invalid @enderror" name="purpose" value="{{ old('number_of_seats') }}" required autocomplete="number_of_seats" autofocus></textarea>
                                @error('purpose')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-purple">
                                    Send Travel Request
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
    $(document).on('click', '#add-passenger', function(e) {
        e.preventDefault();
        $('#passenger-div').append('<input class="form-control m-1" type="text" name="name_of_passenger[]" required id="name_of_passenger">');
    });


    // this will show modal
        $(document).on('click', '#full-info-btn', function (e) {
            e.preventDefault();
            $('.modal').modal('show');
                // implement search
                $.ajax({
                    type: "POST",
                    url: "/employee/vehicle-information",
                    data:{'id' : $('#type-of-vehicle').val()},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }, 
                    success: function (response) {
                        $('#search-result').html('');
                        if(response['status'] == 200) {
                            $('#search-result').append('<div class="row">\
                                            <div class="col-6">\
                                                <p class="text-left">\
                                                    Brand: \
                                                </p>\
                                                <p class="text-left">\
                                                    Color:\
                                                </p>\
                                                <p class="text-left">\
                                                    Driver:\
                                                </p>\
                                                <p class="text-left">\
                                                    Model:\
                                                </p>\
                                                <p class="text-left">\
                                                    Number of Seat(s):\
                                                </p>\
                                                <p class="text-left">\
                                                    Plate Number:\
                                                </p>\
                                                <p class="text-left">\
                                                Status:\
                                                </p>\
                                            </div>\
                                            <div class="col-6">\
                                                <p class="text-right color-purple">\
                                                    '+ response['data'][0]['brand'] +' \
                                                </p>\
                                                <p class="text-right color-purple">\
                                                    '+ response['data'][0]['color'] +' \
                                                </p>\
                                                <p class="text-right color-purple">\
                                                    '+ response['data'][0]['first_name'] +' '+ response['data'][0]['last_name'] +' '+ response['data'][0]['suffix'] +' \
                                                </p>\
                                                <p class="text-right color-purple">\
                                                    '+ response['data'][0]['model'] +' \
                                                </p>\
                                                <p class="text-right color-purple">\
                                                    '+ response['data'][0]['number_of_seats'] +' \
                                                </p>\
                                                <p class="text-right color-purple">\
                                                    '+ response['data'][0]['plate_number'] +' \
                                                </p>\
                                                <p class="text-right color-purple">\
                                                    '+ "{{ (new GlobalDeclare)->vehicle_status(0) }}" +' \
                                                </p>\
                                            </div>\
                                        </div>')
                        } 

                        if(response['status'] == 400) {
                            $('#search-result').append('<h5 class="text-center"><strong class="text-danger ">'+ response['message'] +'</strong></h5>')
                        }
                    }
                });
        });
    // end

    // this will close add drive modal
        $(document).on('click', '#dismiss-modal', function (e) {
            e.preventDefault();
            $('.modal').modal('hide');
        });
    // end
</script>
@endsection
