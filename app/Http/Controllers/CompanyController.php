<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Auth;
use DB;
use App\Application;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $jobs = Job::where('company_id',$user->id)->get();

        return view('Company.index',compact('jobs'));        
    }

    public function jobapplier()
    {
        $user = Auth::user();
        $current_user = $user->id;
        $job_appliers = DB::table('applications')
            
            ->select('applications.*','users.*', 'jobs.*')
            ->join('users', 'users.id', '=', 'applications.user_id')
            ->join('jobs', 'jobs.id', '=', 'applications.job_id')
            ->where('jobs.company_id', "$current_user")
            ->get();
        return view('Company.job_applier', ['jobappliers' => $job_appliers]);
        // $jobappliers = new application();
        // $myFile = pathinfo($jobappliers->resume); 
        // $jobappliers = Application::findOrFail(9);
        // foreach ($jobappliers as $jobapplier) {
        
        // dd(pathinfo($jobappliers)['basename']);
        // }
  
        //Show the file name 
         
        // dd($jobappliers);
        // return view('Company.job_applier',compact('jobappliers')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $company = new Company();
        $company->name = request('name');
        // dd(request('name'));
        $company->contact_no = request('contact_no');
        $company->email = request('email');
        $company->size = request('size');
        $company->address = request('address');
        $company->type = request('type');
        $company->save();
        return redirect('/company');
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
        $company = Company::findorfail($request->id);
        $company->name = request('name');
        $company->contact_no = request('contact_no');
        $company->email = request('email');
        $company->size = request('size');
        $company->address = request('address');
        $company->type = request('type');

        $company->save();

        return redirect('/company');
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
        $company = Company::findorfail($request->id);
        $company->delete();
        return redirect('/company');
    }
}
