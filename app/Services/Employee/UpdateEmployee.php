<?php

namespace App\Services\Employee;

use App\Models\Employee;

class UpdateEmployee
{
    function update($request, Employee $employee){
        $validated= $request->validated();
        $validated['password'] = bcrypt($request['password']);
        $file =  $request->file('image');
        $fileName =$file->getClientOriginalName();
        $validated['image'] = $fileName;
        $file->storeAs(
            'Images',$file->getClientOriginalName()
        );
        $employee->update($validated);

    }

}
