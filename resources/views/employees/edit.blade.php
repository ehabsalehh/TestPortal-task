@extends('layouts.app')
@section('content')
    <div class="bg-light p-4 rounded">
        <h1>edit employee</h1>
        <div class="lead">
            edit employee
        </div>
        <div class="container mt-4">
            <form method="POST" action="{{ route('employees.update',$employee->id) }}"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input
                         value="{{ old('name') }}"  
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" >
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input
                        value="{{ old('email') }}"   
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Email address" >
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-2">
                    <label for="password">password</label>
                    <input
                    value="{{ old('password') }}"   
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    required autocomplete="new-password">
                </div>
                <div class="mb-2">
                    <label for="password-confirm">password Confirm</label>
                    <input 
                    value="{{ old('password_confirmation') }}"   
                    id="password-confirm"
                     type="password" 
                     class="form-control" 
                     name="password_confirmation" 
                     required autocomplete="new-password">
                </div>
                <div class="mb-2">
                    <label for="image" class="form-label">image</label>
                    <input type="file" class = "form-control" name="image" >
                </div>
                <div class="mb-2">
                    <label for="company" class="form-label">company</label>
                    <select id='filter-by-companies' name="company" class="form-control" style="width: 200px">
                        <option value="">--Select companies--</option>
                        @foreach($companies as $company)
                        <option value='{{ $company->id }}'>{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save Employee</button> 
            </form>
            <a href="{{ route('employees.index') }}" class="btn btn-info btn-sm">Back</a>

        </div>
    </div>
@endsection
