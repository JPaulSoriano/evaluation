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
                <div class="card-header">Select Section</div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('reportsshow', $faculty) }}" class="list-group-item list-group-item-action {{ request()->get('section_id') ? '' : 'active' }}" aria-current="true">All Sections</a>
                        @foreach ($sections as $section)
                            <a href="{{ URL::current()."?section_id=".$section->id }}" class="list-group-item list-group-item-action {{ request()->get('section_id') == $section->id ? 'active' : '' }}" aria-current="true">{{ $section->name }}</a>
                        @endforeach
                        {{-- <a href="#" class="list-group-item list-group-item-action" aria-current="true">4-ST. DOMINIC</a>
                        <a href="#" class="list-group-item list-group-item-action">4-ST. AGATHA</a>
                        <a href="#" class="list-group-item list-group-item-action">4-ST. MONICA</a>
                        <a href="#" class="list-group-item list-group-item-action">4-ST. JOHN BOSCO</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Evaluation Report</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div><span class="font-weight-bold">Faculty:</span> {{ $faculty->name }}</div>
                            <div><span class="font-weight-bold">Section:</span> {{ $selectedSection->name ?? $selectedSection }}</div>
                        </div>
                        <div class="col-sm-6">
                            <div><span class="font-weight-bold">Total Student Evaluated:</span> {{ $evaluations->count() }}</div>
                            <div><span class="font-weight-bold">Academic Year:</span> 2021-2022</div>
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
                                        <th>Category 1</th>
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
                </div>
            </div>
        </div>
    </div>

@endsection
