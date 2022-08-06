@extends('layouts.app')
@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new company</h1>
        <div class="lead">
            Add new company
        </div>

        <div class="container mt-4">
            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form method="POST" action="{{ route('companies.store') }}"  enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input  
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" >
                </div>
                <div class="mb-4">
                    <label for="name" class="form-label">Address</label>
                    <input  
                        type="text" 
                        class="form-control" 
                        name="address" 
                        placeholder="Address" >
                </div>
            
                <div class="mb-4">
                    <label for="logo" class="form-label">logo</label>
                    <input type="file" class = "form-control" name="logo" >
                </div>
                <button type="submit" class="btn btn-primary">Save company</button> 
            </form>
            <a href="{{ route('companies.index') }}" class="btn btn-info btn-sm">Back</a>
        </div>

    </div>
@endsection
