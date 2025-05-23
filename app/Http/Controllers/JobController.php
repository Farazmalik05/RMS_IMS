<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\Description;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at','desc')->get();

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        $job = Job::create($request->validated());

        $has_description = $request->safe()->only(['has_description']);
        
        if($has_description['has_description']) 
        {
            return redirect()->route('jobs.edit', $job->id)->with('success', 'Job created successfully');
        }
        return redirect()->route('jobs.index')->with('success', 'Job created successfully');
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
     * @param  Job $job
     * @param  Description $descriptions
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $description_total = $job->descriptions->sum('description_rate');
        return view('jobs.edit', compact('job', 'description_total'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Job $job
     * @return \Illuminate\Http\Response
     */
    public function update(StoreJobRequest $request, Job $job)
    {
        // dd($request->all());
        $job->update($request->validated());

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Job $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $exists = DB::table('job_quote')->whereJobId($job->id)->count() > 0;
        if($exists) {
            return back()->with('error', 'The job cannot be deleted because there are quotes / invoices linked to it');
        }

        if($job->descriptions->count()) {
            return back()->with('error', 'The job cannot be deleted because there are descriptions linked to it');
        }

        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }
}
