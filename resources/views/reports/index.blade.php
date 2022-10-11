

@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-8 my-1">
            <h4>Reports</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Faculty</th>
                    <th>Reports</th>
                </tr>
                <tr>
                    <td>Engelbert Cruz</td>
                    <td><a class="btn btn-primary" href="{{ route('reports.create') }}">Show Reports</a></td>
                </tr>
            </table>
        </div>
    </div>
@endsection
