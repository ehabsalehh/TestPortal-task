<?php

namespace App\Services\Employee;

use App\Models\Employee;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class StoreEmployee
{
    function store($request){
        
        $validated= $request->validated();
        $validated['password'] = bcrypt($request['password']);
        $request->file('image')->store('public/Images');
        $fileName = $request->file('image')->hashName();
        $validated['image'] = $fileName; 
        $employee = Employee::create($validated);
        // $details = [
        //     'title' => 'Mail from ehabsaleh',
        //     'body' => 'welcome to our website'
        // ];
        // Mail::to($employee->email)->send(new WelcomeMail($details));
    }

}
