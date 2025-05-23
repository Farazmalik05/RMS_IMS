<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Customer;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vehicles = Vehicle::with('customer')->when($request->has('archive'), function($query) {
            $query->onlyTrashed();
        })->orderBy('created_at','desc')->get();
        
        //dd($vehicles->toArray());

        $archived = false;

        if($request->has('archive')) {
            $archived = true;
        }

        return view ('vehicles.index', compact('vehicles', 'archived'));
    }

    public function restore($id)
    {
        $vehicle = Vehicle::onlyTrashed()->findOrFail($id);
        $vehicle->restore();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle restored successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null, $name = null, $phoneno = null)
    {
        if(!empty($id) && !empty($name) && !empty($phoneno)) {
            $vehicle['id'] = $id;
            $vehicle['name'] = $name;
            $vehicle['phoneno'] = $phoneno;
            
            return view ('vehicles.create')->with(compact('vehicle'));
        } else {
            return view ('vehicles.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        // $customer->vehicles()->create($request->validated());
        $vehicle = Vehicle::create($request->validated());

        //$vehicle = Vehicle::latest()->first();
        
        return redirect()->route('quotes.create', ['customername' => $request->customer_name, 'customerid' => $request->customer_id, 'phoneno' => $request->customer_phoneno, 'vehicleid' => $vehicle->id, 'rego' => $request->rego, 'make' => $request->make, 'model' => $request->model, 'transmission' => $request->transmission, 'vin_no' => $request->vin_no, 'year' => $request->year])->with('success', 'Vehicle created successfully! Please create a quote');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\UpdateVehicleRequest  $request
     * @param  Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validated());

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        if($vehicle->quotes->count()) {
            return back()->with('error', 'The vehicle cannot be deleted because there are quotes / invoices linked to it');
        }

        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully');
    }
}
