@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Results</div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>Results</td>
                                <td>Tries</td>
                                <td>Machine Id</td>
                                <td>Results Created At</td>
                                <td>IP</td>
                                <td>API Version</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{ $result->results }}</td>
                                    <td>{{ $result->tries }}</td>
                                    <td>{{ $result->machine_id }}</td>
                                    <td>{{ $result->results_originally_created_at }}</td>
                                    <td>{{ $result->ip }}</td>
                                    <td>{{ $result->api_version }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection