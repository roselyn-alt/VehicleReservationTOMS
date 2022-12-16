<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Employees;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = Vehicle::where('status', 0)->get();
            if(count($response) > 0 ) {
                return ([
                    'status'    => 200,
                    'data'  => json_decode($response)
                ]);
            }
            return ([
                'status'    => 400,
                'message'  => 'No Available Cars as of the moment'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try {
            $response = \DB::table('vehicles')
                ->join('drivers', 'vehicles.driver_id', '=', 'drivers.id')
                ->where('vehicles.id', $request->id)
                ->where('vehicles.status', 0)
                ->get([
                    'vehicles.*',
                    'drivers.first_name',
                    'drivers.last_name',
                    'drivers.suffix',
                ]);


            if(count($response) > 0 ) {
                return ([
                    'status'    => 200,
                    'data'  => json_decode($response)
                ]);
            }
            return ([
                'status'    => 400,
                'message'  => 'Vehicle not found!'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
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
