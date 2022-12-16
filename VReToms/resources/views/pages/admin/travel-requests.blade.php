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
                                <th class="th-sm">Actions
                                </th>
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
                                        <td>
                                            <div class="nav-item dropdown">
                                                <a href="" class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    </svg>
                                                    Action
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="{{ route('admin-travel-request-detail', ['id' => $item->id ]) }}" class="dropdown-item text-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                        </svg>
                                                        &nbsp; View Details
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
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