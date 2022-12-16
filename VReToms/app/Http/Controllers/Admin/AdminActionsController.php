<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employees;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\TravelRequestsController;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class AdminActionsController extends Controller
{
    // registering vechicle
    public function registerEmployee(Request $request) {
        try {
            $this->validate($request, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'birth_date' => ['required', 'date', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            # generate employee id
            $employee_id = mt_rand(100000, 999999);
            $account_type = $request->account_type;
                # determine the account type
                # creating employee data
                \DB::table('employees')
                    ->insert([
                        'employee_id'   => $employee_id,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'address' => $request->address,
                        'birth_date' => $request->birth_date,
                        // 'suffix' => $request->suffix,
                        'created_at'    => Carbon::now(), 
                        'updated_at'    => Carbon::now()
                    ]);
                
                # registering driver
                    if($request->account_type == 2) {
                        \DB::table('drivers')
                        ->insert([
                            'employee_id'   => $employee_id,
                            'first_name' => $request->first_name,
                            'last_name' => $request->last_name,
                            'address' => $request->address,
                            'birth_date' => $request->birth_date,
                            // 'suffix' => $request->suffix,
                            'created_at'    => Carbon::now(),
                            'updated_at'    => Carbon::now()
                        ]);
                    }

                # creating user account
                User::create([
                    'employee_id'   =>  $employee_id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->address,
                    'birth_date' => $request->birth_date,
                    // 'suffix' => $request->suffix,
                    'account_type' => $account_type,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                return back()->with([
                    'success'   =>  'Employee Successfully Registered'
                ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // adding vehicle
    public function addVehicle(Request $request) {
        try {
            $this->validate($request, [
                'brand' => 'required',
                'model' => 'required',
                'color' => 'required',
                'plate_number' => 'required',
                'energy_source' => 'required',
                'number_of_seats' => 'required|integer',
            ]);
            $response = (new VehicleController)->store($request);
            return back()->with([
                'success'   => $response['message']
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // approving of travel
    public function admin_approve_travel(Request $request) {
        try {
           $response = (new TravelRequestsController)->admin_approve_travel($request->id);
           if($response['status'] == 200 ) {
                return back()->with([
                    'success'   => $response['message']
                ]);
           }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

     // approving of travel
     public function admin_disapprove_travel(Request $request) {
        try {
           $response = (new TravelRequestsController)->admin_disapprove_travel($request->id);
           if($response['status'] == 200 ) {
                return back()->with([
                    'success'   => $response['message']
                ]);
           }
        //    return back()->with([
        //         'failed'   => $response['message']
        //     ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // this will download trip ticket
    public function download_trip_ticket(Request $request) {
        $response = (new TravelRequestsController)->admin_travel_request_detail($request->id);
        $pdf = PDF::loadview('pages.admin.trip-ticket', [
            'travel_requests'  => $response['data']
        ]);
        return $pdf->download('trip-ticket.pdf');
    }
}
