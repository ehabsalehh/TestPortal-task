@extends('layouts.app')
@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Employees</h1>
        <div class="lead">
            Manage your employees here.<br>
            <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm float-right">Add new employee</a>
        </div>
        <div class="table-responsive">
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                   data-page-length="50"
                   style="text-align: center">
                <thead>
                <tr class="alert-success">
                    <th>#</th>
                    <th>{{ __('name') }}</th>
                    <th>{{ __('email') }}</th>
                    <th>{{ __('company') }}</th>
                    <th>{{ __('image') }}</th>
                    <th>{{ __('operation') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->company}}</td>
                    <td>
                        <img src="{{URL::asset('/storage/Images/'.$employee->image)}}"
                            style="height:50px; width:100px;">
                    </td>

                    <td>
                        <a href="{{ route('employees.show', $employee->id) }}"
                             class="btn btn-info btn-sm"> Show 
                        </a>
                        <a href="{{ route('employees.edit', $employee->id) }}"
                             class="btn btn-info btn-sm">Edit
                        </a>
                        <a href=""
                                class="btn btn-danger btn-sm" onclick="
                                var result = confirm('Are you sure you want to delete this record?');
                                if(result){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{$employee->id}}').submit();
                                }"
                            >
                            {{__('Delete')}}
                        </a>
                        <form method="POST" id="delete-form-{{$employee->id}}"
                                    action="{{route('employees.destroy', [$employee->id])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection