@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Incoming Results from Machines</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route("dashboard.results") }}" method="GET">

                                    <div class="form-group">
                                        <label for="machine_id">Machine ID</label>
                                        <select name="machine_id" class="form-control">
                                            <option value="">--select--</option>
                                            @foreach($machine_ids as $machine_id)
                                                <option
                                                        @if(Request::input('machine_id') == $machine_id)
                                                        selected="selected"
                                                        @endif
                                                        value="{{ $machine_id }}">{{ $machine_id }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="tries">Attempts</label>
                                        <select name="tries" class="form-control">
                                            <option value="">--select--</option>
                                            @foreach($tries as $try)
                                                <option
                                                        @if(Request::input('tries') == $try)
                                                        selected="selected"
                                                        @endif
                                                        value="{{ $try }}">{{ $try }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="created_at">Created At</label>
                                        <select name="created_at" class="form-control">
                                            <option value="">--select--</option>
                                            @foreach($created_at as $created)
                                                <option
                                                        @if(Request::input('created_at') == $created)
                                                        selected="selected"
                                                        @endif
                                                        value="{{ $created }}">{{ $created }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="help-block">
                                            This is the when the record was received by the central service.
                                        </div>
                                    </div>

                                    <input type="hidden" value="{{ $results->currentPage() }}" name="page">

                                    <label for="export">Export to CSV
                                        <input type="checkbox" name="export" value="yes">
                                    </label>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">search</button>
                                        <a href="{{ route('dashboard.results') }}" class="btn btn-success">clear</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                {!! $results->appends(
                               [
                                   'machine_id' => Request::input('machine_id'),
                                   'tries' => Request::input('tries'),
                               ])->links() !!}
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <td>Results</td>
                                        <td>Attempts</td>
                                        <td>Machine Id</td>
                                        <td>Results Taken</td>
                                        <td>Results Received</td>
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
                                            <td>{{ $result->created_at }}</td>
                                            <td>{{ $result->ip }}</td>
                                            <td>{{ $result->api_version }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $results->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection