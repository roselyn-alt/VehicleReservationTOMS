@php
    use App\Http\Controllers\GlobalDeclare;
@endphp
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
        {{-- registering employee --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="color-purple">
                            <strong>My Travel</strong>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group d-none">
                            <form action="" method="post" class="row">
                                <div class="md-form mb-3 col-sm-8">
                                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                                </div>
                                <div class="md-form mb-3 col-sm-4">
                                    <button type="submit" class="btn btn-primary btn-purple">Search</button>
                                </div>
                            </form>
                        </div>
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th class="th-sm">#</th>
                                <th class="th-sm">Employee</th>
                                <th class="th-sm">Date</th>
                                <th class="th-sm">Requesting Office</th>
                                <th class="th-sm">Date of Travel</th>
                                <th class="th-sm">Type of Vehicle</th>
                                <th class="th-sm">Departure time</th>
                                <th class="th-sm">Destination</th>
                                <th class="th-sm">Name of Passengers</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm">Purpose</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($travel_requests as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->first_name }} {{ $item->last_name }} {{ (new GlobalDeclare)->suffix($item->suffix) }}</td>
                                    <td>{{ date('M d, Y', strtotime($item->date))  }}</td>
                                    <td>{{ $item->requesting_office }}</td>
                                    <td>{{ $item->date_of_travel }}</td>
                                    <td>{{ $item->model }}</td>
                                    <td>{{ $item->departure_time }}</td>
                                    <td>{{ $item->destination }}</td>
                                    <td>
                                        @foreach ($item->name_of_passengers as $passenger)
                                            {{ $passenger }}
                                        @endforeach
                                    </td>
                                    @if ($item->status ==  2 || $item->status == 3 || $item->status == 0)
                                        <td class="text-danger"><strong>{{ (new GlobalDeclare)->status($item->status) }}</strong></td>
                                    @else
                                        <td class="text-success"><strong>{{ (new GlobalDeclare)->status($item->status) }}</strong></td>
                                    @endif
                                    <td>{{ $item->purpose }}</td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
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