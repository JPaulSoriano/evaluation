@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a class="btn btn-primary" href="{{ route('academicyears.create') }}">New</a>
    <table class="table table-bordered my-2">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Status</th>
            <th width="100px">Action</th>
        </tr>
        <tr>
            <td>3</td>
            <td>2022-2023</td>
            <td><label class="badge badge-danger">Not Yet Started</label></td>
            <td><a href=""class="btn btn-sm btn-block btn-success my-1">Start</a></td>
        </tr>
        <tr>
            <td>2</td>
            <td>2021-2022</td>
            <td><label class="badge badge-success">Active</label></td>
            <td><a href=""class="btn btn-sm btn-block btn-danger my-1">End</a></td>
        </tr>
        <tr>
            <td>1</td>
            <td>2019-2021</td>
            <td><label class="badge badge-secondary">Ended</label></td>
            <td><a href=""class="btn btn-sm btn-block btn-secondary my-1 disabled">Start</a></td>
        </tr>

    </table>

    {!! $academicyears->links() !!}

@endsection
