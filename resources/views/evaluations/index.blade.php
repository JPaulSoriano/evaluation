

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 my-1">
            <table class="table table-bordered">
                <tr>
                    <th>Faculty</th>
                    <th width="100px">Action</th>
                </tr>
                @foreach ($faculties as $faculty)
                <tr>
                    <td>{{ $faculty->name }}</td>
                    <td>
                        <a href="{{ route('evaluate', $faculty) }}" class="btn btn-sm btn-block btn-success my-1">Evaluate</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>
@endsection
