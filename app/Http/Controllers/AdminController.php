<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::where('user_type','employee')->count();
        $companies = User::where('user_type','company')->count();
        $jobs = Job::count();
        return view('Admin.admin',compact('employees','companies','jobs'));
    }

    public function cmpanyindex()
    {
        $companies = User::where('user_type','company')->get();

        return view('Admin.company',compact('companies'));
    }
    
    public function employeeindex()
    {
        $employees = User::where('user_type','employee')->get();

        return view('Admin.employee',compact('employees'));
    }

    public function companyedit(Request $request)
    {
        $companies = User::findorfail($request->id);
        $companies->name = request('name');
        $companies->email = request('email');

        $companies->save();

        return redirect('/admin_company');
    }

    public function employeeedit(Request $request)
    {
        $employees = User::findorfail($request->id);
        $employees->name = request('name');
        $employees->email = request('email');

        $employees->save();

        return redirect('/admin_employee');
    }

    public function companydelete(Request $request)
    {
        $companies = User::findorfail($request->id);
        $companies->delete();

        return redirect('/admin_company');
    }

    public function employeedelete(Request $request)
    {
        $employees = User::findorfail($request->id);
        $employees->delete();

        return redirect('/admin_employee');
    }

    public function jobindex()
    {
        $jobs = Job::all();

        return view('Admin.jobs',compact('jobs'));
    }

    public function jobedit(Request $request)
    {
        $jobs = Job::findorfail($request->job_id);
        $jobs->tittle = request('job_title');
        $jobs->description = request('job_description');
        $jobs->responsibility = request('job_responsibility');
        $jobs->qualification = request('job_qualification');
        $jobs->gender = request('job_gender');

        $jobs->save();

        return redirect('/admin_job');
    }

    public function jobdelete(Request $request)
    {
        $jobs = Job::findorfail($request->id);
        $jobs->delete();

        return redirect('/admin_job');
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
        //
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
