@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">companies</div>

                    <div class="panel-body">
                        <table class="table" id="companies-datatable">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>address</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
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
        $(document).ready( function () {
            $('#companies-datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('companies.dataTableIndex') }}",
                "columns": [
                    { "data": "name" },
                    { "data": "address" },
                ]
            });
        });
    </script>
@endsection
