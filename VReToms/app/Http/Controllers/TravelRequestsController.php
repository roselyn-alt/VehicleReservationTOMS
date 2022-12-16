<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelRequest;
use App\Models\Users;
use App\Models\Vehicle;
use Auth;

class TravelRequestsController extends Controller
{
    /** Admin functionalities */
        public function admin_travel_request()
        {
            $response = TravelRequest::join('users', 'travel_requests.employee_id', 'users.employee_id')
                ->join('vehicles', 'travel_requests.type_of_vehicle', 'vehicles.id')
                ->where('travel_requests.status', 0)
                ->orWhere('travel_requests.status', 1)
                ->orWhere('travel_requests.status', 2)
                ->get(['travel_requests.*', 
                        'users.first_name', 
                        'users.last_name', 
                        'users.suffix', 
                        'vehicles.model'
                    ]);

            if(count($response) > 0) {
                return ([
                    'status'    => 200,
                    'data'  => json_decode($response)
                ]);
            }
            return ([
                'status'    => 400,
                'message'   => 'No Travel Requests as of the momment'
            ]);
        }

        // admin approve travel
        public function admin_approve_travel($id) {
            // update status to approved 
            $response = TravelRequest::where('id', $id)->update([
                'status' => 1
            ]);
            if($response == 1) {
                return ([
                    'status'    => 200,
                    'message'   => 'Travel request approved'
                ]);
            }

            return ([
                'status'    => 400,
                'message'   => 'Approve request failed'
            ]);
        }

        // admin disapprove travel
        public function admin_disapprove_travel($id) {
            // update status to approved 
            $response = TravelRequest::where('id', $id)->update([
                'status' => 2
            ]);
            if($response == 1) {
                return ([
                    'status'    => 200,
                    'message'   => 'Travel request disapproved'
                ]);
            }

            return ([
                'status'    => 400,
                'message'   => 'Disapprove request failed'
            ]);
        }
        // show travel request detail | per id 
        public function admin_travel_request_detail($id) {
            $response = TravelRequest::join('users', 'travel_requests.employee_id', 'users.employee_id')
            ->join('vehicles', 'travel_requests.type_of_vehicle', 'vehicles.id')
            ->join('drivers', 'vehicles.driver_id', 'drivers.id')
            ->where('travel_requests.id', $id)
            ->where('travel_requests.status', 0)
            ->orWhere('travel_requests.status', 1)
            ->orWhere('travel_requests.status', 2)
            ->get(['travel_requests.*', 
                    'users.first_name', 
                    'users.last_name', 
                    'users.suffix', 
                    'vehicles.model',
                    'vehicles.plate_number',
                    'drivers.first_name as d_first_name',
                    'drivers.last_name as d_last_name',
                ]);

            if(count($response) > 0) {
                return ([
                    'status'    => 200,
                    'data'  => json_decode($response)
                ]);
            }
            return ([
                'status'    => 400,
                'message'   => 'No Travel Requests as of the momment'
            ]);
        }
    /** end */

    /** Employee functionalities */
        public function employee_on_going_request($id) {
             // update status to approved 
            dd('employee_on_going_request');
            $response = TravelRequest::where('id', $id)->update([
                'status' => 4
            ]);
            if($response == 1) {
                return ([
                    'status'    => 200,
                    'message'   => 'Your travel request updated to ON-GOING'
                ]);
            }

            return ([
                'status'    => 400,
                'message'   => 'Disapprove request failed'
            ]);
        }

        public function employee_arrive_request($id) {
            // update status to approved 
            $response = TravelRequest::where('id', $id)->update([
               'status' => 4
           ]);
           if($response == 1) {
               return ([
                   'status'    => 200,
                   'message'   => 'Your travel request updated to Accomplished'
               ]);
           }

           return ([
               'status'    => 400,
               'message'   => 'Disapprove request failed'
           ]);
        }

        public function employee_cancel_request($id) {
        // update status to approved 
            $response = TravelRequest::where('id', $id)->update([
                'status' => 3
            ]);
            if($response == 1) {
                return ([
                    'status'    => 200, 
                    'message'   => 'Your travel request has been Cancelled'
                ]);
            }

            return ([
                'status'    => 400,
                'message'   => 'Disapprove request failed'
            ]);
        }
    /** end */

    /** Driver functionalities */
        // this will return the driver workload
        public function driver_workload() {
           
            $response = TravelRequest::join('vehicles', 'travel_requests.type_of_vehicle', 'vehicles.id')
                    ->join('drivers', 'drivers.id', 'vehicles.driver_id')
                    ->where('drivers.employee_id', Auth::user()->employee_id)
                    ->get(['travel_requests.*', 'vehicles.*']);

            if(count($response) > 0) {
                return ([
                    'status'    => 200,
                    'data'  => json_decode($response)
                ]);
            } 
            return ([
                'status'    => 400,
                'data'  => 'You have (0) workload'
            ]);
        }
    /** end */
}
