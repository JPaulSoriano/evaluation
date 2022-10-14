@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-primary text-white">Select Section</div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('reportsshow', ['faculty' => $faculty, 'academicYear' => $academicYear]) }}" class="list-group-item list-group-item-action {{ request()->get('section_id') ? '' : 'active' }}" aria-current="true">All Sections</a>
                        @foreach ($sections as $section)
                            <a href="{{ URL::current()."?section_id=".$section->id }}" class="list-group-item list-group-item-action {{ request()->get('section_id') == $section->id ? 'active' : '' }}" aria-current="true">{{ $section->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between">
                    Evaluation Report
                    <button type="button"  class="btn btn-sm btn-secondary" onclick="printJS('printJS-form', 'html')">
                        Print
                    </button>
                </div>
                <div class="card-body">
                    <form id="printJS-form">
                        <div class="row">
                            <div class="col-sm-6">
                                <div><span class="font-weight-bold">Faculty:</span> {{ $faculty->name }}</div>
                                <div><span class="font-weight-bold">Section:</span> {{ $selectedSection->name ?? $selectedSection }}</div>
                            </div>
                            <div class="col-sm-6">
                                <div><span class="font-weight-bold">Total Student Evaluated:</span> {{ $evaluations->count() }}</div>
                                <div><span class="font-weight-bold">Academic Year:</span> {{ $evaluations->first()->academic_year }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="border p-3 mt-3">5 = Strongly Agree 4 = Agree 3 = Uncertain 2 = Disagree 1 = Strongly Disagree</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered my-2">
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th>{{ $category->name }}</th>
                                            <th>Average Rate</th>
                                        </tr>
                                        @foreach ($category->questions as $question)
                                            <tr>
                                                <td>{{ $question->question }}</td>
                                                <td>{{ $question->mean }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach


                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
