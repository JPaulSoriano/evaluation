@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a class="btn btn-success" href="{{ route('categories.create') }}">New</a>
    <table class="table table-bordered my-2">
        <tr>
            <th>No</th>
            <th>Name</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $category->name }}</td>
        </tr>
        @endforeach
    </table>

    {!! $categories->links() !!}

@endsection
