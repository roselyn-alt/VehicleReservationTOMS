<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TravelRequest;
use Auth;
use Carbon\Carbon;
use App\Models\Vehicle;
class TravelRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # this will show all the travel requests
        $response = TravelRequest::all();
        if(count($response) > 0 ) {
            return ([
                'status'    => 200,
                'data'  =>  json_decode($response)
            ]);
        }

        return ([
            'status'    => 400,
            'message'   => 'No items found'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
           //
            $find = TravelRequest::where('employee_id', Auth::user()->employee_id)->get();
            if(count($find) > 0) {
                return ([
                    'status'    => 400,
                    'message'   =>  'You\'ve pending travel request'
                ]);
            }
            $response = TravelRequest::create([
                'employee_id' => Auth::user()->employee_id,
                'date'  =>  Carbon::now(),
                'requesting_office' =>  $request->requesting_office,
                'type_of_vehicle'   => $request->type_of_vehicle,
                'date_of_travel'    =>  $request->date_of_travel,
                'departure_time'    => $request->departure_time,
                'arrival_date'    => $request->arrival_date,
                'arrival_time'    => $request->arrival_time,
                'starting_location'   => $request->starting_location,
                'destination'   => $request->destination,
                'estimated_liters'   => $request->estimated_liters,
                'name_of_passengers'    =>  request('name_of_passenger'),
                'purpose'   => $request->purpose
            ]);
            $vehicle_response = Vehicle::where('id', $request->type_of_vehicle)->update([
                'status' => 1
            ]);
            return ([
                'status'    => 200,
                'message'   =>  'Travel Request successfully requested'
            ]);
        } catch (\Throwable $th) {
            // throw $th;
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
