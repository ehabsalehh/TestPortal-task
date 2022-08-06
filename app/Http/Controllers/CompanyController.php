<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Services\Company\StoreCompany;
use App\Services\Company\UpdateCompany;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\storeCompanyRequest;


class CompanyController extends Controller
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
        $companies = Company::get();
        return view('companies.index', compact('companies'));
    }
    public function dataTableIndex()
    {
        return datatables(Company::query())->make(true);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCompanyRequest $request, StoreCompany $store)
    {
        $this->store = $store;
         $this->store->store($request);
        return redirect()->route('companies.index')
        ->withSuccess(__('company created successfully.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(storeCompanyRequest $request, Company $company,UpdateCompany $update)
    {
        $this->update = $update;
        $this->update->update($request,$company);
        return redirect()->route('companies.index')
        ->withSuccess(__('company created successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if( Storage::exists('/storage/logos/'.$company->logo)){
            Storage::delete('/storage/logos/'.$company->logo);
        }
        $company->delete();
        return redirect()->route('companies.index')
        ->withSuccess(__('company created successfully.'));
    }
}
