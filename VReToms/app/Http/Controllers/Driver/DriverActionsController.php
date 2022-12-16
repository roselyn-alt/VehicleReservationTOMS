<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Carbon\Carbon;

class DriverActionsController extends Controller
{
    # this will update vehicle status to available
    public function vehicle_available(Request $reqeust) {
        try {
            $response = Vehicle::where('id', $reqeust->id)->update([
                'status'    => 0
            ]);
            return back()->with([
                'success'   => 'Vehicle Status updated!'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
     # this will update vehicle status to available
     public function vehicle_unavailable(Request $reqeust) {
        try {
            $response = Vehicle::where('id', $reqeust->id)->update([
                'status'    => 1
            ]);
            return back()->with([
                'success'   => 'Vehicle Status updated!'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
