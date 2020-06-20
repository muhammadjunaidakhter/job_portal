<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkuser_type;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth' , 'admin']], function()
{
    Route::get('/admin','AdminController@index');    
});

Route::group(['middleware' => ['auth' , 'employee']], function()
{
    Route::get('/employee', 'EmployeeController@index');    
});


Route::group(['middleware' => ['auth' , 'company']], function()
{
    Route::get('/company_index', 'CompanyController@index');

});

Route::get('/admin_company', function () {
    return view('admin.company');
});

Route::get('/admin_employee', function () {
    return view('admin.employee');
});
 

/* Create Routes  */
Route::post('/createcompany','CompanyController@store');
Route::post('/createjob','JobController@store');
Route::post('/apply_job','ApplicationController@store');

/** Index Router */
Route::get('/admin_company','AdminController@cmpanyindex');
Route::get('/job','JobController@index');
Route::get('/admin_job', 'AdminController@jobindex');
Route::get('/admin_employee', 'AdminController@employeeindex');
Route::get('/company_index', 'CompanyController@index');
Route::get('/job_applier/view', 'CompanyController@jobapplier');
Route::get('/employee', 'jobController@index');
Route::post('/download_resume', 'ApplicationController@download');

/** Edit Router */
Route::post('/editcompany','CompanyController@edit');
Route::post('/admin_edit_job', 'AdminController@jobedit');
Route::post('/admin_edit_company', 'AdminController@companyedit');
Route::post('/admin_edit_employee', 'AdminController@employeeedit');
Route::post('/company_edit_job', 'JobController@edit');

/** Delete Router */
Route::post('/admin_delete_company','AdminController@companydelete');
Route::post('/admin_delete_job', 'AdminController@jobdelete');
Route::post('/admin_delete_employee', 'AdminController@employeedelete');
Route::post('/company_delete_job', 'JobController@destroy');