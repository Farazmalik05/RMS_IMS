<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDescriptionRequest;
use App\Models\Description;
use App\Models\Job;

class DescriptionController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreDescriptionRequest  $request
     * @param  \App\Models\Job $job
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDescriptionRequest $request, Job $job)
    {
        $job->descriptions()->create($request->validated());

        return redirect()->route('jobs.edit', $job)->with('success', 'Description created successfully');
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
     * @param  Description $description
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job, Description $description)
    {
        return view('descriptions.edit', compact('job', 'description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreDescriptionRequest  $request
     * @param  Job $job
     * @param  Description $description
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDescriptionRequest $request, Job $job, Description $description)
    {
        $description->update($request->validated());

        return redirect()->route('jobs.edit', $job)->with('success', 'Description updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Job $job
     * @param  Description $description
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job, Description $description)
    {
        $description->delete();

        return redirect()->route('jobs.edit', $job)->with('success', 'Description deleted successfully');
    }
}
