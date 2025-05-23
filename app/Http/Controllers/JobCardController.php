<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GenerateJobCardRequest;
use App\Models\Vehicle;
use PDF;

class JobCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobcards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenerateJobCardRequest $request)
    {
        $validated = $request->validated();
        $vehicle = Vehicle::with('customer')->where('rego', '=', $validated['rego'])->get();
        //dd($validated);
        
        $vehicle = $vehicle[0];
        $vehicle['date'] = $validated['date'];
        $vehicle['odometer'] = $validated['odometer'];
        //dd($validated);
        // dd($vehicle->toArray());
        if($validated['jobcard_type'] == 'groupon') {
            $vehicle['voucher_code'] = $validated['voucher_code'];
            $vehicle['is_logbook'] = $validated['is_logbook'];
            $vehicle['details'] = $validated['details'];
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif', 'defaultPaperSize' => "a4"]);
            $pdf = Pdf::loadView('jobcards.groupon', compact('vehicle'));
            return $pdf->stream('jobcard.pdf');
        } elseif($validated['jobcard_type'] == 'minor_service') {
            $vehicle['is_logbook'] = $validated['is_logbook'];
            $vehicle['details'] = $validated['details'];
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif', 'defaultPaperSize' => "a4"]);
            $pdf = Pdf::loadView('jobcards.minor_service', compact('vehicle'));
            return $pdf->stream('jobcard.pdf');
        } else {
            $vehicle['details'] = $validated['details'];
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif', 'defaultPaperSize' => "a4"]);
            $pdf = Pdf::loadView('jobcards.repairs', compact('vehicle'));
            return $pdf->stream('jobcard.pdf');
        }
        //groupon | minor_service | repairs
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
