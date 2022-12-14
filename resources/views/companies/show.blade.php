@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tr class="alert-success">
                                            <th>{{ __('name') }}</th>
                                            <th>{{ __('address') }}</th>
                                            <th>{{ __('logo') }}</th>
                                            <th>{{ __('operation') }}</th>
                                        </tr>
                                            <tr>
                                            <td>{{$company->name}}</td>
                                            <td>{{$company->address}}</td>
                                            <td>
                                                <img src="{{URL::asset('/storage/logos/'.$company->logo)}}"
                                                    style="height:50px; width:100px;">
                                            </td>

                                            <td>
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
                                                <a href="{{ route('companies.index') }}" class="btn btn-info btn-sm">Back</a>

                                                <form method="POST" id="delete-form-{{$company->id}}"
                                                            action="{{route('companies.destroy', [$company->id])}}">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
