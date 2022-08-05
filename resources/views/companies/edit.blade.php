@extends('layouts.app')
@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new Company</h1>
        <div class="lead">
            Add new Company.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('companies.update') }}"  enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">address</label>
                    <input value="{{ old('address') }}"
                        type="text" 
                        class="form-control" 
                        name="address" 
                        placeholder="address" required>
                    @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">logo</label>
                    <input type="file" name="logo" required>
                    @if ($errors->has('logo'))
                        <span class="text-danger text-left">{{ $errors->first('logo') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">update</button>
            </form>
        </div>

    </div>
@endsection
