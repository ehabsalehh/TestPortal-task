<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use App\Services\Employee\StoreEmployee;
use App\Services\Employee\UpdateEmployee;
use App\Http\Requests\storeEmployeeRequest;

class EmployeeController extends Controller
{
    private $store;
    private $update;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::get();
        return view('employees.index', compact('employees'));
        // return datatables(Employee::query())->make(true);        
    }
    public function dataTableIndex()
    {
        return datatables(Employee::query())->make(true);        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::get();
        return view('employees.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeEmployeeRequest $request,StoreEmployee $store)
    {
        $this->store = $store;
        $this->store->store($request);
         return redirect()->route('employees.listEmployees')
        ->withSuccess(__('employee created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show', ['employee' => $employee]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::get();
        return view('employees.edit', [
                'employee' => $employee,
                'companies' => $companies
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(storeEmployeeRequest $request, Employee $employee, UpdateEmployee $update)
    {
        $this->update = $update;
        $this->update->update($request,$employee);
        return redirect()->route('employees.index')
        ->withSuccess(__('employees updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if(Storage::exists('/storage/Images/'.$employee->image)){
            Storage::delete('/storage/Images/'.$employee->image);
        }
        $employee->delete();
        return redirect()->route('employees.index')
        ->withSuccess(__('employees Deleted successfully.'));
    }
}
