

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
            <h4>My Evaluations</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Faculty</th>
                    <th>Evaluation Date</th>
                    <th>Action</th>
                </tr>
                @foreach ($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation->faculty->name }}</td>
                    <td>{{ $evaluation->created_at }}</td>
                    <td>
                        <a href="{{ route('evaluateshow', $evaluation) }}" class="btn btn-primary">Show</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
