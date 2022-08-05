<?php

namespace App\Services\Company;

use App\Models\Company;

class UpdateCompany
{
    function update($request, Company $company){
        $validated= $request->validated();
        $file =  $request->file('logo');
        $fileName =$file->getClientOriginalName();
        $validated['logo'] = $fileName;
        $file->storeAs(
            'logos',$file->getClientOriginalName()
        );
        $company->update($validated);

    }

}
