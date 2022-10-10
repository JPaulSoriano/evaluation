@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <a class="btn btn-success" href="{{ route('questions.create') }}">New</a>
    <table class="table table-bordered my-2">
        <tr>
            <th>No</th>
            <th>Question</th>
            <th>Category</th>
            <th width="100px">Status</th>
        </tr>
        @foreach ($questions as $question)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $question->question }}</td>
            <td>{{ $question->category->name }}</td>
            <td>
                @if($question->status == 1)
                    <form action="{{ route('deactivate', $question) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger btn-block my-1">Deactivate</button>
                    </form>
                @else
                    <a href="{{ route('activate', $question) }}"class="btn btn-sm btn-block btn-success my-1">Activate</a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>

    {!! $questions->links() !!}

@endsection
