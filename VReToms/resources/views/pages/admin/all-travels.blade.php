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
                            <strong>Travel Requests</strong>
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

                                @foreach (json_decode($travel_requests) as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->u_first_name }} {{ $item->u_last_name }}</td>
                                        <td>{{  explode('-', date('F j, Y-', strtotime($item->created_at )))[0]   }}</td>
                                        <td>{{ $item->requesting_office }}</td>
                                        <td>{{  explode('-', date('F j, Y-', strtotime($item->date_of_travel )))[0]   }}</td>
                                        <td>{{ $item->model }}</td>
                                        <td>{{ $item->departure_time }}</td>
                                        <td>{{ $item->destination }}</td>
                                        <td>
                                            @foreach ($item->name_of_passengers as $passenger)
                                                {{ $passenger }}
                                            @endforeach
                                        </td>
                                        <td>{{ (new GlobalDeclare)->status($item->status) }}</td>
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
@endsection