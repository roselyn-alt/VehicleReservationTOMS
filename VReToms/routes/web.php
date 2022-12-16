<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\AdminActionsController;
use App\Http\Controllers\Employee\EmployeeActionsControlle;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Employee\VehicleController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

/** The following are the routes for admin side */
    # adding of departments
    Route::get('/admin/add-department', [PagesController::class, 'adminAddDepartments'])->middleware('auth')->name('admin-add-department');
    # registering the employee | user
    Route::get('/admin/register', [PagesController::class, 'adminRegisterEmployee'])->middleware('auth')->name('admin-register-employee');
    # registering the employee | user
    Route::post('/admin/register', [AdminActionsController::class, 'registerEmployee'])->middleware('auth')->name('register-Employee');
    # adding car | vehicle page
    Route::get('/add/vehicle', [PagesController::class, 'adminAddVehicle'])->middleware('auth')->name('add-vehicle-page');
    # adding vehicle
    Route::post('/add/vehicle', [AdminActionsController::class, 'addVehicle'])->middleware('auth')->name('add-vehicle');
    # show travel request 
    Route::get('/admin/travel/request', [PagesController::class, 'adminTravelRequest'])->middleware('auth')->name('admin-travel-request');
    # display travel request in full detail form
    Route::get('/admin/travel-request/detail', [PagesController::class, 'admin_travel_request_detailed'])->middleware('auth')->name('admin-travel-request-detail');
    # approve travel request(s)
    Route::get('/admin/approve/travel-request', [AdminActionsController::class, 'admin_approve_travel'])->middleware('auth')->name('admin-approve-travel');
    # disapprove travel request(s)
    Route::get('/admin/disapprove/travel-request', [AdminActionsController::class, 'admin_disapprove_travel'])->middleware('auth')->name('admin-disapprove-travel');
    // getting all the list of drivers
    Route::post('/admin/fetch-emmployee/driver', [EmployeeController::class, 'admin_get_driver'])->middleware('auth')->name('admin-fetch-driver');
    # get vehicle information based on id
    Route::post('/admin/vehicle-information', [App\Http\Controllers\Admin\VehicleController::class, 'show'])->middleware('auth');
    # generating PDF
    Route::get('/admin/download-pdf', [AdminActionsController::class, 'download_trip_ticket'])->middleware('auth')->name('download-trip-ticket');
    # all travels
    Route::get('/admin/all-travel-requests', [PagesController::class, 'admin_all_travel_requests'])->middleware('auth')->name('all-travel-requests');

/** The following are the routes for Employee */
    # login for employee
    Route::get('/employee/login', [PagesController::class, 'employeeLoginPage'])->name('employee-login');
    # travel request
    Route::get('/employee/travel/request', [PagesController::class,'employeeTravelRequest'])->middleware('auth')->name('travel-request-page');
    // send travel request
    Route::post('/employee/travel/request', [EmployeeActionsControlle::class,'sendTravelRequest'])->middleware('auth')->name('travel-request');
    // show my travel request page
    Route::get('/employee/my-travel/request', [PagesController::class, 'employee_my_travel_request'])->middleware('auth')->name('my-travel-request');
    // updating travel requet status
        Route::get('/employee/on-going/travel', [EmployeeActionsControlle::class, 'employee_on_going_request'])->middleware('auth')->name('employee-ongoing-travel');
        Route::get('/employee/arrive/travel', [EmployeeActionsControlle::class, 'employee_arrive_request'])->middleware('auth')->name('employee-arrive-travel');
        Route::get('/employee/cancel/travel', [EmployeeActionsControlle::class, 'employee_cancel_request'])->middleware('auth')->name('employee-cancel-travel');
    // end
    // getting employee list of all travels    
    Route::get('/employee/my-travels', [PagesController::class, 'employee_travels'])->middleware('auth')->name('employee-my-travel');
    // getting vehicle information
    Route::post('/employee/vehicle-information', [App\Http\Controllers\Employee\VehicleController::class, 'show'])->middleware('auth')->name('employee-vehicle-info');

/** The following are the routes for Drivers */
    # this will display workload
    Route::get('/driver/workload', [PagesController::class, 'driver_workload'])->middleware('auth')->name('driver-workload');
    # this will display vehicle of driver
    Route::get('/driver/vehicle', [PagesController::class, 'driver_vehicle'])->middleware('auth')->name('driver-vehicle');
    # update vehicle status
        Route::get('driver/vehicle/available', [App\Http\Controllers\Driver\DriverActionsController::class, 'vehicle_available'])->middleware('auth')->name('dr-vehicle-available');
        Route::get('driver/vehicle/unavailable', [App\Http\Controllers\Driver\DriverActionsController::class, 'vehicle_unavailable'])->middleware('auth')->name('dr-vehicle-unavailable');