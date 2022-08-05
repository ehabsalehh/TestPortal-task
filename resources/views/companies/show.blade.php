@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Show company</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
                Name: {{ $company->name }}
            </div>
            <div>
                Email: {{ $company->email }}
            </div>
            <div>
                companyname: {{ $company->companyname }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('companies.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection
