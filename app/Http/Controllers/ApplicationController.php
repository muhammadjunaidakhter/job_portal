<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\application;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {        
        
        $applications = new application();
        $applications->user_id = request('user_id');
        $applications->job_id = request('job_id');
        $file = request('resume');
        $newFilename = $file->getClientOriginalExtension();
        $path  = Storage::disk('public')->put($newFilename, $file);
        strval( $path );
        $fullpath = storage_path("app\public\ $path") ;
        $fullpath = str_replace(' ', '', $fullpath);
        $fullpath = str_replace('/', '\\', $fullpath);
        // dd($fullpath);
        $applications->resume = $fullpath;
        $applications->save();
        return redirect('/employee')->with('success','Job applied successfully...');
    }

    public function download(Request $request)
    {   
        $applications = request('resume');
        // $applications = $request->resume;
        // dd($applications);
        return response()->download($applications);
    }
}
