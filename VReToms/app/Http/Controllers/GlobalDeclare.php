<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlobalDeclare extends Controller
{
    // this will dtermine and generate suffix value
    public function suffix($in) {
        $out = '';
        switch ($in) {
            case 0:
                $out = ' ';
                break;
            case 1:
                $out = 'Jr.';
            break;
            case 2:
                $out = 'Sr.';
            break;
            case 3:
                $out = 'I';
            break;
            case 4:
                $out = 'II';
            break;
            case 5:
                $out = 'III';
            break;
            case 6:
                $out = 'IV';
            break;
            case 7:
                $out = 'V';
            break;
            case 8:
                $out = 'VI';
            break;
            case 9:
                $out = 'VII';
            break;
            case 10:
                $out = 'VIII';
            break;
            default:
               $out = ' ';
            break;
        }
        return $out;
    }

    # this will determnie the status
    public function status($in) {
        $out = "";
        switch($in) {
            case 0:
                $out = 'Pending';
                break;
            case 1:
                $out = 'Approved';
                break;
            case 2:
                $out = 'Disapproved';
                break;
            case 3:
                $out = 'Canceled';
                break;
            case 4:
                // $out = 'On-going';
                $out = 'Accomplished';
                break;
            case 5:
                $out = 'Arrived';
                break;
        }
        return $out;
    }

    # this will return the account type as string
    public function account_type($in) {
        $out = "";
        switch ($in) {
            case 0:
                $out = 'Admin';
                break;
            case 1:
                $out = 'Employee';
                break;
            case 2:
                $out = 'Drive';
                break;
        }
    }

    # this will return vehicle status
    public function vehicle_status($in) {
        $out = '';
        switch($in) {
            case 0:
                $out = "Available";
                break;
            case 1:
                $out = 'Unavailable';
                break;
        }
        return $out;
    }
}
