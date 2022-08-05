@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new employee</h1>
        <div class="lead">
            Add new employee.
        </div>
        <div class="container mt-4">
            <form method="POST" action="{{ route('employees.store') }}"  enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input  
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-2">
                    <label for="password">password</label>
                    <input type="password" name="password" class="form-control" required>
                    @if ($errors->has('Password'))
                        <span class="text-danger text-left">{{ $errors->first('Password') }}</span>
                    @endif
                </div>
                <div class="mb-2">
                    <label for="password-confirm">password Confirm</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="mb-2">
                    <label for="image" class="form-label">image</label>
                    <input type="file" class = "form-control" name="image" required>
                    @if ($errors->has('image'))
                        <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="mb-2">
                    <label for="company" class="form-label">company</label>
                    <select id='filter-by-companies' name="company" class="form-control" style="width: 200px">
                        <option value="">--Select companies--</option>
                        @foreach($companies as $company)
                        <option value='{{ $company->id }}'>{{ $company->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('company'))
                        <span class="text-danger text-left">{{ $errors->first('company') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save Employee</button>
            </form>
        </div>

    </div>
@endsection
