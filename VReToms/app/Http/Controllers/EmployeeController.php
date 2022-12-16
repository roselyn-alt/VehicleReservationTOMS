<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\User;


class EmployeeController extends Controller
{
    /** The follwing are the functions used by admin side */
        # this will get all the list of drivers
        public function admin_get_driver(Request $request) {
            try {
                $response = \DB::table('drivers')
                    ->where('first_name','LIKE',"%{$request->search}%")
                    ->orWhere('last_name', 'LIKE', "%{$request->search}%")
                    
                    ->get();
                    
                if(count($response) > 0) {
                    return ([
                        'status'    => 200,
                        'data'  => json_decode($response)
                    ]);
                }

                return ([
                    'status'    => 400,
                    'message'   => 'Cannot retrieve employee'
                ]);
            } catch (\Throwable $th) {
                throw $th;
            }
        }

    /** The follwing are the functions used by the employee side */
}
