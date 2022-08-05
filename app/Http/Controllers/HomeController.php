<?php

namespace App\Http\Controllers;
use Datatables;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function listCompanies(){
        return view('companies.companiesAjax');
    }
    public function listEmployees(){
        $companies = Company::get(); 
        return view('employees.employeesAjax', compact('companies'));
    }
    public function getCustomFilterData(Request $request)
    {
         $filter= isset($request->company)?$request->company:null;
        if($filter){
            $employees = Employee::getEmployeesByCompany($request->get('company'))
                        ->select(['name', 'email', 'company']);
        }else{
            $employees = Employee::select(['name', 'email', 'company']);
        }
        return datatables($employees)->make(true);        
    }
}
