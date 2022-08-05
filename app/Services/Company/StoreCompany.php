<?php

namespace App\Services\Company;

use App\Models\Company;
class StoreCompany
{
    function store($request){
        $validated= $request->validated();
        $request->file('logo')->store('public/logos');
        $fileName = $request->file('logo')->hashName();
        $validated['logo'] = $fileName; 
        Company::create($validated);
    }

}
