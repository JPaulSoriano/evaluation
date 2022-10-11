

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
                </tr>
                @foreach ($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation }}</td>
                    <td>{{ $evaluation->created_at }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
