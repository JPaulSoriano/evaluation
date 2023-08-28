@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a class="btn btn-primary" href="{{ route('sections.create') }}">New</a>
    <table class="table table-bordered my-2">
        <tr>
            <th>No</th>
            <th>Grade and Section</th>
        </tr>
        @foreach ($sections as $section)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $section->name }}</td>
        </tr>
        @endforeach
    </table>

    {!! $sections->links() !!}

@endsection
