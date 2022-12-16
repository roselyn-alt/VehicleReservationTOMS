<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Employee\VehicleController;
use App\Http\Controllers\TravelRequestsController;
use App\Models\TravelRequest;
use App\Models\Vehicle;

use Auth;
class PagesController extends Controller
{
    # admin pages
        // showing the admin register user page
        public function adminRegisterEmployee() {
            return view('pages.admin.register-user');
        } 

        // showing add vehicle
        public function adminAddVehicle() {
            return view('pages.admin.add-vehicle');
        }

        // showing add departments page 
        public function adminAddDepartments() {
            return view('pages.admin.add-departments');
        }

        // showing travel requests
        public function adminTravelRequest() {
            $response = (new TravelRequestsController)->admin_travel_request();
            if($response['status'] == 200) {
                return view('pages.admin.travel-requests')->with([
                    'travel_requests'   => $response['data']
                ]);
            }
            if($response['status'] == 400) {
               return view('pages.no-response')->with([
                    'response'  => $response['message']
               ]);  
            }
        }

        // show travel request detail
        public function admin_travel_request_detailed(Request $request) {
            $response = (new TravelRequestsController)->admin_travel_request_detail($request->id);
            
            if($response['status'] == 200) {
                return view('pages.admin.travel-request-detail')->with([
                    'travel_requests'   => $response['data']
                ]);
            }
            if($response['status'] == 400) {
               return view('pages.no-response')->with([
                    'response'  => $response['message']
               ]);  
            }
        }

        // show all travel requests ever made
        public function admin_all_travel_requests() {
            $travel_requests = TravelRequest::
                join('users', 'users.employee_id', 'travel_requests.employee_id')
                ->join('vehicles', 'vehicles.id', 'travel_requests.type_of_vehicle')
                ->join('drivers', 'drivers.id', 'vehicles.driver_id')
                ->get([
                    'travel_requests.*',
                    'vehicles.*',
                    'users.first_name as u_first_name',
                    'users.last_name as u_last_name',
                    'drivers.first_name as d_first_name',
                    'drivers.last_name as d_last_name',
                ]);

            if($travel_requests != null){
               if(count($travel_requests) > 0) {
                    return view('pages.admin.all-travels', compact('travel_requests'));
               }
            }
            
            return view('pages.no-response')->with([
                'response' => 'No Travel Request Made!'
            ]);
        }
    # end

    # employee pages
        // showing the employee login
        public function employeeLoginPage() {
            return view('pages.employee.login');
        }
        // showing trave request page
        public function employeeTravelRequest() {
           try {
                $vehicle = \DB::table('vehicles')
                    ->where('status', 0)
                    ->get();

                if($vehicle) {
                    return view('pages.employee.travel-request')->with([
                        'vehicles' => $vehicle
                    ]);
                }
                //return view('pages.page-maintenance');
           } catch (\Throwable $th) {
                throw $th;
           }
        }
        // showing employee travel request
        public function employee_my_travel_request() {
            try {
                $response = TravelRequest::join('users', 'travel_requests.employee_id', 'users.employee_id')
                    ->join('vehicles', 'travel_requests.type_of_vehicle', 'vehicles.id')
                    ->where('travel_requests.employee_id', Auth::user()->employee_id)
                    ->where(function($query) {
                        $query->where('travel_requests.status', 0)
                            ->orWhere('travel_requests.status', 1);
                    })
                    ->get(['travel_requests.*', 
                            'users.first_name', 
                            'users.last_name', 
                            'users.suffix', 
                            'vehicles.model'
                        ]);

                if(count($response) > 0) {
                    return view('pages.employee.my-travel-request')->with([
                        'travel_requests'    => json_decode($response)
                    ]);
                }

                return view('pages.no-response')->with([
                    'response'  => 'You\'ve no travel request made'
                ]);  
            } catch (\Throwable $th) {
                throw $th;
            }
        }            

        //
        public function employee_travels() {
           try {
                $response = TravelRequest::join('users', 'travel_requests.employee_id', 'users.employee_id')
                ->join('vehicles', 'travel_requests.type_of_vehicle', 'vehicles.id')
                ->where('travel_requests.employee_id', Auth::user()->employee_id)
                ->get(['travel_requests.*', 
                        'users.first_name', 
                        'users.last_name', 
                        'users.suffix', 
                        'vehicles.model'
                    ]);
                    if(count($response) > 0) {
                        return view('pages.employee.my-travel')->with([
                            'travel_requests'    => json_decode($response)
                        ]);
                    }
    
                    return view('pages.no-response')->with([
                        'response'  => 'You\'ve no travel request made'
                    ]);  
           } catch (\Throwable $th) {
                throw $th;
           }
        }
    # end

    # driver pages
        // this will display the work load of the driver
        public function driver_workload() {
            $response = (new TravelRequestsController)->driver_workload();
            if($response['status'] == 200) {
                return view('pages.driver.workload')->with([
                    'workload' => $response['data']
                ]);
            } else {
                return view('pages.no-response')->with([
                    'response' => $response['data']
                ]);
            }
        }
        // this will show driver vehicle
        public function driver_vehicle() {
            $response = \DB::table('vehicles')
                ->join('drivers', 'drivers.id', 'vehicles.driver_id')
                ->where('drivers.employee_id', Auth::user()->employee_id)
                ->get([
                    'vehicles.*'
                ]);

            if(($response != null)) {
                if(count($response) > 0) {
                    return view('pages.driver.my-vehicle')->with([
                        'vehicle' => json_decode($response)
                    ]);
                }
            }
          
            return view('pages.no-response')->with([
                'response' => 'You don\' have any assigned car yet. Please contact Admin!'
            ]);
        }
    # end
}
