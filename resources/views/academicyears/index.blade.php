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
        </tr>
        @foreach ($academicyears as $academicyear)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $academicyear->name }}</td>
        </tr>
        @endforeach
    </table>

    {!! $academicyears->links() !!}

@endsection
