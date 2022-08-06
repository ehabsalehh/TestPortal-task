@extends('layouts.app')
@section('content')
    <div class="bg-light p-4 rounded">
        <h1>companies</h1>
        <div class="lead">
            Manage your companies here.<br>
            <a href="{{ route('companies.create') }}" 
                class="btn btn-primary btn-sm float-right">Add new company
            </a>
        </div>
        <div class="table-responsive">
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                   data-page-length="50"
                   style="text-align: center">
                <thead>
                <tr class="alert-success">
                    <th>#</th>
                    <th>{{ __('name') }}</th>
                    <th>{{ __('address') }}</th>
                    <th>{{ __('logo') }}</th>
                    <th>{{ __('operation') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->address}}</td>
=                    <td>
                        <img src="{{URL::asset('/storage/logos/'.$company->logo)}}"
                            style="height:50px; width:100px;">
                        </td>

                    <td>
                        <a href="{{ route('companies.show', $company->id) }}"
                             class="btn btn-info btn-sm"> Show 
                        </a>
                        <a href="{{ route('companies.edit', $company->id) }}"
                             class="btn btn-info btn-sm">Edit
                        </a>
                        <a href=""
                                class="btn btn-danger btn-sm" onclick="
                                var result = confirm('Are you sure you want to delete this record?');
                                if(result){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{$company->id}}').submit();
                                }"
                            >
                            {{__('Delete')}}
                        </a>
                        <form method="POST" id="delete-form-{{$company->id}}"
                                    action="{{route('companies.destroy', [$company->id])}}">
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