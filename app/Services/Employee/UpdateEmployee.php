<?php

namespace App\Services\Employee;

use App\Models\Employee;

class UpdateEmployee
{
    function update($request, Employee $employee){
        $validated= $request->validated();
        $request->file('image')->store('public/Images');
        $fileName = $request->file('image')->hashName();
        $validated['image'] = $fileName;
        $validated['password'] = bcrypt($request['password']);
        $employee->update($validated);

    }

}
