@php
    use App\Http\Controllers\GlobalDeclare;
    // dd($travel_requests);
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
                {{--Trip ticket preview --}}
                    <div class="modal fade" id="travel-ticket-preview" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Travel Ticket Preview</h5>
                            </div>
                            <div class="modal-body">
                                <div class="m-1 p-1">
                                    <div class="form-group bg-gray p-1">
                                        <div class="travel-ticket bg-white m-1 p-3">
                                            <div class="row header text-center">
                                                <h6>Republic of the Philippines</h6>
                                                <h6><strong>SOUTHERN LEYTE STATE UNIVERSITY</strong></h6>
                                                <h6>Sogod, Southern Leyte</h6>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-6 text-left">
                                                    <h6><strong>Control No. {{ date('Y-m', strtotime($travel_requests[0]->date)) }}-{{ rand(000,999) }}</strong></h6>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <h6><strong>{{ explode('-', date('M j, Y-', strtotime($travel_requests[0]->date)))[0] }}</strong></h6>
                                                </div>
                                            </div>
                                            <div class="row m-2">
                                                <h6 class="text-center"><strong>DRIVER'S TRIP TICKET</strong></h6>
                                            </div>
                                            <div class="row">
                                                <h6>A. To be filled by the Administrative Official Authorizing Travel:</h6>
                                            </div>
                                            <div class="row m-1">
                                                <div class="col-6 p-2">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <h6>1.</h6>
                                                            <h6>2.</h6>
                                                            <h6>3.</h6>
                                                            <h6>4.</h6>
                                                            <h6>5.</h6>
                                                        </div>
                                                        <div class="col-10">
                                                           <h6> Name of driver of the vehicle</h6>
                                                           <h6> Goverment car to be used, Plate No.</h6>
                                                           <h6> Goverment authorized passenger</h6>
                                                           <h6> Place/s to be visited/inspected</h6>
                                                           <h6> Purpose</h6>
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="col-6 p-2">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h6 class="line-bottom" ><strong>{{ $travel_requests[0]->d_first_name }} {{ $travel_requests[0]->d_last_name }}  {{ (new GlobalDeclare)->suffix($travel_requests[0]->suffix) }}</strong></h6>
                                                            <h6 class="line-bottom"> <strong>{{ $travel_requests[0]->plate_number }}</strong></h6>
                                                            <h6 class="line-bottom"> 
                                                                @foreach ($travel_requests[0]->name_of_passengers as $item)
                                                                <strong> {{ $item }},</strong>
                                                                @endforeach
                                                            </h6>
                                                            <h6 class="line-bottom"><strong>{{ $travel_requests[0]->destination }}</strong></h6>
                                                            <h6 class="line-bottom"> <strong>{{ $travel_requests[0]->purpose }}</strong></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row m-2 justify-content-center">
                                               <div class="col-6">
                                                    <h6 class="text-center line-bottom"><strong>MABEL R. CALVA</strong></h6>
                                                    <h6 class="text-center"><strong>VPAF</strong></h6>
                                                    <h6 class="text-center">(Chief of Office/Authorized Representative)</h6>
                                               </div>
                                            </div>
                                            <div class="row">
                                                <h6>B. To be filled by the driver:</h6>
                                            </div>
                                            <div class="row m-1">
                                                <div class="col-6 p-2">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <h6>1.</h6>
                                                            <h6>2.</h6>
                                                            <h6>3.</h6>
                                                            <h6>4.</h6>
                                                            <h6>5.</h6>
                                                            <h6>6.</h6>
                                                            <h6 class="text-white">-</h6>
                                                            <h6 class="text-white">-</h6>
                                                            <h6 class="text-white">-</h6>
                                                            <h6 class="text-white">-</h6>
                                                            <h6 class="text-white">-</h6>
                                                            <h6 class="text-white">-</h6>
                                                            <h6>7.</h6>
                                                            <h6>8.</h6>
                                                            <h6>9.</h6>
                                                            <h6>10.</h6>
                                                            <h6 class="text-white">-</h6>
                                                            <h6 class="text-white">-</h6>
                                                            <h6 class="text-white">-</h6>
                                                            <h6>11.</h6>
                                                        </div>
                                                        <div class="col-10">
                                                            <h6> Time of departure from office/garage</h6>
                                                            <h6> Time of arrive at (Per No. 4)</h6>
                                                            <h6> Time of departure from (Per No. 4)</h6>
                                                            <h6> Time of arrival back to office/garage</h6>
                                                            <h6> Approximate distance traveled (to & from)</h6>
                                                            <h6> Gasoline, issued, purchased & consumed:</h6>

                                                            <h6> a) Balance in Bank</h6>
                                                            <h6> b} Issued from the office stock</h6>
                                                            <h6> c) Add purchased during trip</h6>
                                                            <h6> Total:</h6>
                                                            <h6> d) Deduct used (to & from)</h6>
                                                            <h6> e) Balance of tank at the end of trip</h6>
                                                            <h6> Gear oil used:</h6>
                                                            <h6> Lub oil used:</h6>
                                                            <h6> Grease oil used:</h6>
                                                            <h6>Speed o-meter reading if any:<h6>
                                                            <h6>At the beginning of trip<h6>
                                                            <h6>At the end<h6>
                                                            <h6>Distance traveled (Per 5 above)<h6>
                                                            <h6>Remarks<h6>
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="col-6 p-2">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="text-white" ><strong class="text-white"></strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                            <h6 class="line-bottom" ><strong class="text-white">{{ ('-') }}</strong></h6>
                                                        </div>
                                                        <div class="col-2">
                                                            <h6 class="m-2" ><strong>A.M./P.M.</strong></h6>
                                                            <h6 class="m-2" ><strong>A.M./P.M</strong></h6>
                                                            <h6 class="m-2" ><strong>A.M./P.M.</strong></h6>
                                                            <h6 class="m-2" ><strong>A.M./P.M.</strong></h6>
                                                            <h6 class="m-2" ><strong>A.M./P.M.</strong></h6>
                                                            <h6 class="m-2" ><strong>A.M./P.M.</strong></h6>
                                                            <h6 class="m-2" ><strong>Liters</strong></h6>
                                                            <h6 class="m-2" ><strong>Liters</strong></h6>
                                                            <h6 class="m-2" ><strong>Liters</strong></h6>
                                                            <h6 class="m-2" ><strong>Liters</strong></h6> 
                                                            <h6 class="m-2" ><strong>Liters</strong></h6>
                                                            <h6 class="m-2" ><strong>Liters</strong></h6>
                                                            <h6 class="m-2" ><strong>Liters</strong></h6>
                                                            <h6 class="m-2" ><strong>Liters</strong></h6> 
                                                            <h6 class="m-2" ><strong>Liters</strong></h6>
                                                            <h6 class="m-2" ><strong>Miles/kms</strong></h6>
                                                            <h6 class="m-2" ><strong>Miles/kms</strong></h6>
                                                            <h6 class="m-2" ><strong>Miles/kms</strong></h6>
                                                            <h6 class="m-2" ><strong>Miles/kms</strong></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <h6 class="text-center">I hereby certify to the correctness of the above statement of record of travel</h6>
                                                </div>
                                                <div class="row m-2 justify-content-center">
                                                    <div class="col-6">
                                                         <h6 class="text-center line-bottom"><strong>{{ $travel_requests[0]->d_first_name }} {{ $travel_requests[0]->d_last_name }}  {{ (new GlobalDeclare)->suffix($travel_requests[0]->suffix) }}</strong></h6>
                                                         <h6 class="text-center"><strong>Driver</strong></h6>
                                                    </div>
                                                 </div>
                                                 <div class="row">
                                                    <h6 class="">I hereby certify that I use this car on official business as stated above. </h6>
                                                </div>
                                                <div class="row m-2 justify-content-center">
                                                    <div class="col-6">
                                                         <h6 class="text-center line-bottom">
                                                            @foreach ($travel_requests[0]->name_of_passengers as $item)
                                                                <strong> {{ $item }},</strong>
                                                            @endforeach
                                                        </h6>
                                                         <h6 class="text-center"><strong>Name of Passenger/s</strong></h6>
                                                    </div>
                                                </div>
                                                <div class="row m-2 justify-content-center">
                                                    <div class="col-6">
                                                        <h6 class="text-center line-bottom"><strong>{{ explode('-', date('M j, Y-', strtotime($travel_requests[0]->date)))[0] }}</strong></h6>
                                                        <h6 class="text-center"><strong>(Date)</strong></h6>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <h6 class="text-center">*All passengers are advised to bring their own provisions and observe all the minimum health</h6>
                                                    <h6 class="text-center">protocols to prevent and control the spread of COVID-19 and to ensure the safety of everyone*</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('download-trip-ticket', ['id' => $travel_requests[0]->id]) }}" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
                                      </svg>
                                   &nbsp; Download as PDF
                                </a>
                                <button type="button" class="btn btn-secondary" id="dismiss-modal" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>
                {{-- end --}}

                
                {{-- Vehicle Information --}}
                    <div class="modal fade" id="vehicle-information" tabindex="-1" role="dialog">
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
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Date</label>
                            <div class="col-md-6">
                                <h5 class="form-control">{{  explode('-', date('F j, Y-', strtotime($travel_requests[0]->date)))[0]   }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Requesting Office</label>
                            <div class="col-md-6">
                               <h5 class="form-control">{{ $travel_requests[0]->requesting_office }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Type of Vehicle</label>
                            <div class="col-md-5">
                               <h5 class="form-control">{{ $travel_requests[0]->model }}</h5>
                            </div>

                            <div class="col-md-2">
                                <a data-id="{{ $travel_requests[0]->type_of_vehicle }}" type="button" class="btn btn-primary btn-purple" id="full-info-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Date of Travel</label>
                            <div class="col-md-6">
                               <h5 class="form-control">{{ $travel_requests[0]->date_of_travel }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Departure Time</label>
                            <div class="col-md-6">
                               <h5 class="form-control">{{ $travel_requests[0]->departure_time }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">Estimated Date of Arrival</label>
                            <div class=" col-md-6">
                                <h5 class=" form-control">{{ $travel_requests[0]->arrival_date }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Estimated Time of Arrival</label>
                            <div class="col-md-6">
                                <h5 class=" form-control">{{ $travel_requests[0]->arrival_time }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Starting Location</label>
                            <div class=" col-md-6">
                                <h5 class="form-control">{{ $travel_requests[0]->starting_location }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Destination</label>
                            <div class="col-md-6">
                                <h5 class="form-control">{{ $travel_requests[0]->destination }}</h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Estimated Liters</label>
                            <div class="col-md-6">
                                <h5 class="form-control">{{ $travel_requests[0]->estimated_liters }}</h5>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name of Passenger(s)</label>
                            <div class="col-md-6">
                               @foreach ($travel_requests[0]->name_of_passengers as $item)
                                    <h5 class="form-control">{{ $item }}</h5>
                               @endforeach
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Purpose</label>
                            <div class="col-md-6">
                                <p class="col-12 form-control">
                                   {{ $travel_requests[0]->purpose }}
                                </p>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="#" id="tr-approve" class="btn btn-primary m-1">
                                   View PDF
                                </a>
                                <a href="{{ route('admin-approve-travel', ['id' => $travel_requests[0]->id ]) }}" class="btn btn-success m-1">
                                    Approve
                                </a>
                                <a href="{{ route('admin-disapprove-travel', ['id' => $travel_requests[0]->id ]) }}" class="btn btn-danger m-1">
                                    Disapprove
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        // this will show travel ticket view
            $(document).on('click', '#tr-approve', function(e) {
                e.preventDefault();
                $("#travel-ticket-preview").modal('show');
            });

        // this will show modal
            $(document).on('click', '#full-info-btn', function (e) {
                e.preventDefault();
                $('#vehicle-information').modal('show');
                    // implement search
                    $.ajax({
                        type: "post",
                        url: "/admin/vehicle-information",
                        data:{'id' : $(this).data('id')},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }, 
                        success: function (response) {
                            var _suffix;
                            if() {

                            }
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