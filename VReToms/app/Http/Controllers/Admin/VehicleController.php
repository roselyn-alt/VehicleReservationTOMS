<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;

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
            $response = Vehicle::all();
            if(count($response) > 0 ) {
                return ([
                    'status'    => 200,
                    'data'  => json_decode($response)
                ]);
            }
            return ([
                'status'    => 400,
                'message'  => 'No Available Vehicle(s) as of the moment'
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
        try {
            //
            $response = Vehicle::create([
                'driver_id' =>  $request->driver_id,
                'brand' => $request->brand,
                'model' => $request->model,
                'color' => $request->color,
                'plate_number' => $request->plate_number,
                'energy_source' => $request->energy_source,
                'number_of_seats' => intval($request->number_of_seats),
            ]);

            if($response) {
                return ([
                    'status'    => 200,
                    'message'   => 'Vehicle successfully added'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 400,
                'message'   => $th
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $response = Vehicle::join('drivers', 'vehicles.driver_id', '=', 'drivers.id')
        ->where('vehicles.id', $request->id)
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
