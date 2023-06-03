

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
            <h4>Select Faculty to Evaluate for <span class="font-weight-bold">{{ $currentQuarter }}</span> Quarter in Year <span class="font-weight-bold">{{ $currentAcademicYear }}</span></h4>
            <table class="table table-bordered">
                <tr>
                    <th>Faculty</th>
                    <th width="100px">Action</th>
                </tr>

                @foreach ($faculties as $faculty)
                <tr>
                    <td>{{ $faculty->full_name }}</td>
                    <td>
                        <!-- @if ($faculty->facultyEvaluations->contains('evaluator_id', auth()->user()->id))
                            <button class="btn btn-sm btn-block btn-secondary my-1" disabled>Evaluated</button>
                        @else
                            <a href="{{ route('evaluate', $faculty) }}" class="btn btn-sm btn-block btn-primary my-1">Evaluate</a>
                        @endif -->

                        @if ($faculty->facultyEvaluations()->where('evaluator_id', $evaluatorId)
                                                    ->where('quarter', $currentQuarter)
                                                    ->where('academic_year', $currentAcademicYear)
                                                    ->exists())
                            <button class="btn btn-sm btn-block btn-secondary my-1" disabled>Evaluated</button>
                        @else
                            <a href="{{ route('evaluate', $faculty) }}" class="btn btn-sm btn-block btn-primary my-1">Evaluate</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $faculties->links() }}
        </div>
    </div>
@endsection
