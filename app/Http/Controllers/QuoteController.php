<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Quote;
use Carbon\Carbon;
use DB;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::with('jobs')->where('type', 'Q')->orderBy('created_at','desc')->get(); //->get()->sortDesc();
        
        foreach($quotes as $quote)
        {
            $quote->total = 0;
            foreach($quote->jobs as $job)
            {
                $quote->total += ($job->pivot->quantity * $job->pivot->rate);
            }
        }
        //dd($quotes);
        return view('quotes.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($customerid = null, $customername = null, $phoneno = null, $vehicleid = null, $rego = null, $make = null, $model = null, $transmission = null, $vin_no = null, $year = null)
    {
        $from = date('Y-m-d', strtotime('first day of january this year'));
        $to = date('Y-m-d');

        $latest = Quote::whereBetween('quote_date', [$from, $to])->withTrashed()->max('quote_number');
        
        $quote_number = '01';
        if(!empty($latest))
        {
            $quote_number = sprintf("%02d", $latest+1);
        }

        if(!empty($customerid) && !empty($customername) && !empty($phoneno) && !empty($vehicleid) && !empty($rego) && !empty($make) && !empty($model) && !empty($transmission) && !empty($vin_no) && !empty($year)) {
            $vehicle['customer_name'] = $customername;
            $vehicle['customer_id'] = $customerid;
            $vehicle['customer_phoneno'] = $phoneno;
            $vehicle['vehicleid'] = $vehicleid;
            $vehicle['rego'] = $rego;
            $vehicle['make'] = $make;
            $vehicle['model'] = $model;
            $vehicle['transmission'] = $transmission;
            $vehicle['vin_no'] = $vin_no;
            $vehicle['year'] = $year;

            return view('quotes.create', compact('quote_number', 'vehicle'));
        } else {
            return view('quotes.create', compact('quote_number'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuoteRequest $request)
    {
        // dump($request->toArray());
        $quote = $request->validated();
        $quote['quote_date'] = Carbon::createFromFormat('d-m-Y', $quote['quote_date'])->format('Y-m-d');
        $quote['quote_duedate'] = Carbon::createFromFormat('d-m-Y', $quote['quote_duedate'])->format('Y-m-d');
        $quote['nextservicedate'] = Carbon::createFromFormat('d-m-Y', $quote['nextservicedate'])->format('Y-m-d');
        
        if($quote['quoteyear'] != date('Y', strtotime($quote['quote_date'])))
        {
            //return redirect()->route('quotes.create')->with('error', 'Quote year and quote date do not match');
            return response()->json(['status' => 400, 'error' => 'Quote year and quote date do not match']);
        }

        //Check if this quote number is already saved
        $startOfYear = date('Y-m-d', strtotime('first day of january this year'));
        $endOfYear   = date('Y-m-d', strtotime('last day of december this year'));
        
        $exist = Quote::whereBetween(DB::raw('DATE(quote_date)'), [$startOfYear, $endOfYear])->where(
        [
            ['type', '=', 'Q'],
            ['quote_number', '=', $quote['quote_number']]
        ])->get();
        
        if(!empty($exist->toArray()))
        {
            return response()->json(['status' => 400, 'error' => 'This quote number already exists']);
        }

        //save in pivot table
        // $jobs = collect($request->input('total', []))->map(function($price){
        //     return ['rate' => $price];
        // });

        //Make an array to save in pivot table
        $jobs = [];
        foreach ($quote['job_id'] as $index => $jobid) {
            $jobs[$jobid] = [
                'jobtype'   => $quote['jobtype'][$index],
                'quantity'  => $quote['quantity'][$index],
                'rate'      => $quote['price'][$index],
            ];
        }
        // dump($jobs);
        $saved_quote = Quote::create($quote);
        
        $saved_quote->jobs()->sync($jobs);

        return response()->json(['quote_id' => $saved_quote->id, 'status' => 200, 'success' => 'Quote saved successfully']);
        // return redirect()->route('quotes.index')->with('success', 'Quote created successfully');
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
    public function edit(Quote $quote)
    {
        $quote = $quote->load('jobs');
        //dump($quote->toArray());
        return view('quotes.edit', compact('quote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        $quote_details = $request->validated();
        
        $quote_details['quote_date'] = Carbon::createFromFormat('d-m-Y', $quote_details['quote_date'])->format('Y-m-d');
        $quote_details['quote_duedate'] = Carbon::createFromFormat('d-m-Y', $quote_details['quote_duedate'])->format('Y-m-d');
        $quote_details['nextservicedate'] = Carbon::createFromFormat('d-m-Y', $quote_details['nextservicedate'])->format('Y-m-d');
        //dd($quote_details);

        $jobs = [];
        foreach ($quote_details['job_id'] as $index => $jobid) {
            $jobs[$jobid] = [
                'quantity'  => $quote_details['quantity'][$index],
                'rate'      => $quote_details['price'][$index],
            ];
        }
        //dump($quote_details);
        //dd($jobs);
        
        $quote->update($quote_details);

        $quote->jobs()->sync($jobs);
        return response()->json(['quote_id' => $quote->id, 'status' => 200, 'success' => 'Quote updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();

        return redirect()->route('quotes.index')->with('success', 'Quote deleted successfully');
    }
}
