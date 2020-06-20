<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        
        return view('Employees.employee',compact('jobs'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new Job();
        $job->company_id = request('company_id');
        dd(request('company_id'));
        $job->tittle = request('job_title');
        $job->description = request('job_description');
        $job->responsibility = request('job_responsibility');
        $job->qualification = request('job_qualification');
        $job->gender = request('job_gender');
        
        $job->save();
        return redirect('/company_index');
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
    public function edit(Request $request)
    {
        $jobs = Job::findorfail($request->id);
        $jobs->tittle = request('tittle');
        $jobs->description = request('description');
        $jobs->responsibility = request('responsibility');
        $jobs->qualification = request('qualification');
        $jobs->gender = request('gender');

        $jobs->save();

        return redirect('/company_index');
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
    public function destroy(Request $request)
    {
        $jobs = Job::findorfail($request->id);

        $jobs->delete();

        return redirect('/company_index');
    }
}
