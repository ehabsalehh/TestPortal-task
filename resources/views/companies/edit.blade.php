@extends('layouts.app')
@section('content')
    <div class="bg-light p-4 rounded">
        <h1>edit company</h1>
        <div class="lead">
            edit company
        </div>
        <div class="container mt-4">
            <form method="POST" action="{{ route('companies.update',$company->id) }}"  enctype="multipart/form-data">
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
                <div class="mb-4">
                    <label for="name" class="form-label">Address</label>
                    <input
                         value="{{ old('address') }}"  
                        type="text" 
                        class="form-control" 
                        name="address" 
                        placeholder="Address" >
                </div>
                <div class="mb-2">
                    <label for="logo" class="form-label">logo</label>
                    <input type="file" class = "form-control" name="logo" >
                </div>
                <button type="submit" class="btn btn-primary">Save Company</button> 
            </form>
            <br>
            <a href="{{ route('companies.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
