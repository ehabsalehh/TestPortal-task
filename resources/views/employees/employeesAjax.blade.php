@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">employees</div>
                    <div class="panel-body">
                        <form id= 'search-form'>
                            <select id = "filterId"  class="form-control" style="width: 200px">
                                <option value="">--Select companies--</option>
                                @foreach($companies as $company)
                                <option value='{{ $company->id }}'>{{ $company->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">filter</button>
                        </form>
                        <table class="table table-bordered" id="employees-datatable">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>company</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        var oTable = $('#employees-datatable').DataTable({
        dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
            "<'row'<'col-xs-12't>>"+
            "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
        processing: true,
        serverSide: true,
        ajax: {
            
            url: "http://127.0.0.1:8000/getCustomFilterData",
            data: function (d) {
                d.company = $('#filterId').val();
            }
        },
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'company', name: 'company'}
        ]
    });

    $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
</script>
@endsection