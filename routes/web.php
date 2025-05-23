<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::redirect('/', 'home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');    
    Route::resource('appointments', App\Http\Controllers\AppointmentController::class);
    Route::post('customers/{id}/restore', [App\Http\Controllers\CustomerController::class, 'restore'])->name('customers.restore');
    Route::resource('customers', App\Http\Controllers\CustomerController::class);
    Route::post('vehicles/{id}/restore', [App\Http\Controllers\VehicleController::class, 'restore'])->name('vehicles.restore');
    Route::get('vehicles/create/{id?}/{name?}/{phoneno?}', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicles.create');
    Route::resource('vehicles', App\Http\Controllers\VehicleController::class, ['except' => 'create']);
    Route::resource('jobs', App\Http\Controllers\JobController::class);
    Route::resource('jobs.descriptions', App\Http\Controllers\DescriptionController::class);
    Route::get('quotes/create/{customerid?}/{customername?}/{phoneno?}/{vehicleid?}/{rego?}/{make?}/{model?}/{transmission?}/{vin_no?}/{year?}', [App\Http\Controllers\QuoteController::class, 'create'])->name('quotes.create');
    Route::resource('quotes', App\Http\Controllers\QuoteController::class, ['except' => 'create']);
    Route::get('invoices/{invoice_id}/generate', [App\Http\Controllers\AjaxController::class, 'generateinvoice'])->name('invoices.generate');
    Route::post('invoices/email', [App\Http\Controllers\AjaxController::class, 'sendemail'])->name('invoices.sendemail');
    Route::resource('invoices', App\Http\Controllers\InvoiceController::class)->only(['index', 'show', 'destroy']);
    Route::resource('jobcards', App\Http\Controllers\JobCardController::class);

    //Ajax Controller routes
    Route::post('getcustomer', [App\Http\Controllers\AjaxController::class, 'getcustomer'])->name('getcustomer');
    Route::post('getcustomerwithvehicle', [App\Http\Controllers\AjaxController::class, 'getcustomerwithvehicle'])->name('getcustomerwithvehicle');
    Route::post('getvehiclewithcustomer', [App\Http\Controllers\AjaxController::class, 'getvehiclewithcustomer'])->name('getvehiclewithcustomer');
    Route::post('getquotenumber', [App\Http\Controllers\AjaxController::class, 'getquotenumber'])->name('getquotenumber');
    Route::post('getjob', [App\Http\Controllers\AjaxController::class, 'getjob'])->name('getjob');
    Route::post('getdescription', [App\Http\Controllers\AjaxController::class, 'getdescription'])->name('getdescription');
    Route::post('updatejobrate', [App\Http\Controllers\AjaxController::class, 'updatejobrate'])->name('updatejobrate');
    Route::post('updatetype', [App\Http\Controllers\AjaxController::class, 'updatetype'])->name('updatetype');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function(){
        Route::resource('settings', App\Http\Controllers\Admin\SettingController::class);
    });
});
