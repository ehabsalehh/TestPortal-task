<?php

namespace App\Services\Company;

use App\Models\Company;

class UpdateCompany
{
    function update($request, Company $company){
        $validated= $request->validated();
        $request->file('logo')->store('public/logos');
        $fileName = $request->file('logo')->hashName();
        $validated['logo'] = $fileName; 
        $company->update($validated);

    }

}
