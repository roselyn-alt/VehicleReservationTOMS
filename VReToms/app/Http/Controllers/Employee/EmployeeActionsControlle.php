<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Employee\TravelRequestController;
use App\Http\Controllers\TravelRequestsController;
use Auth;
use Carbon\Carbon;
class EmployeeActionsControlle extends Controller
{
    # send travel request
    public function sendTravelRequest(Request $request) {
        $this->validate($request, [
            'requesting_office'  => 'required',
            'date_of_travel'  => 'required',
            'type_of_vehicle'  => 'required',
            'dt_hour'  => 'required',
            'dt_minute'  => 'required',
            'dt_am_pm'  => 'required',
            'da_hour'  => 'required',
            'da_minute'  => 'required',
            'da_am_pm'  => 'required',
            'starting_location'  => 'required',
            'destination'  => 'required',
            'purpose'  => 'required',
        ]);
        # overiding the request
        $request->merge([
            'departure_time' => $request->dt_hour .':'. $request->dt_minute .' '. $request->dt_am_pm,
            'arrival_time' => $request->da_hour .':'. $request->da_minute .' '. $request->da_am_pm,
        ]);

        $response = (new TravelRequestController)->store($request);
        if($response['status'] == 200) {
            return back()->with([
                'success'   => $response['message']
            ]);
        }
        if($response['status'] == 400) {
            return back()->with([
                'failed'   => $response['message']
            ]);
        }
    }

    // on going travel
    public function employee_on_going_request(Request $request) {
        try {
            $response = (new TravelRequestsController)->employee_on_going_request($request->id);
            if($response['status'] == 200 ) {
                    return back()->with([
                        'success'   => $response['message']
                    ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    // arrive travel
    public function employee_arrive_request(Request $request) {
        try {
            $response = (new TravelRequestsController)->employee_arrive_request($request->id);
            if($response['status'] == 200 ) {
                    return back()->with([
                        'success'   => $response['message']
                    ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // arrive travel
    public function employee_cancel_request(Request $request) {
        try {
            $response = (new TravelRequestsController)->employee_cancel_request($request->id);
            if($response['status'] == 200 ) {
                    return back()->with([
                        'success'   => $response['message']
                    ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

