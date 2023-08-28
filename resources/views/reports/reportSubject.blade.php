
@extends('layouts.app')
@section('content')
<div class="col-sm-4">
    <div class="form-group">
        <label>Select Quarter</label>
        <form action="{{ route('faculties.reportSubject', ['faculty' => $faculty]) }}" method="GET">
            <select class="form-control" name="quarter" onchange="this.form.submit()">
                <option value="">All Quarters</option>
                <option value="1st"{{ Request::input('quarter') === '1st' ? ' selected' : '' }}>1st</option>
                <option value="2nd"{{ Request::input('quarter') === '2nd' ? ' selected' : '' }}>2nd</option>
                <option value="3rd"{{ Request::input('quarter') === '3rd' ? ' selected' : '' }}>3rd</option>
                <option value="4th"{{ Request::input('quarter') === '4th' ? ' selected' : '' }}>4th</option>
            </select>
        </form>
    </div>
    <button class="btn btn-sm btn-primary mb-2" type="button" onclick="
        printJS({
                printable: 'subject',
                type: 'html',
                header: '<div style=\'display: flex; align-items: center;\'><img src=\'{{ asset('images/logo.png') }}\' style=\'max-width: 100px; margin-right: 10px;\'><h3>{{ $faculty->full_name }} Report per Subject for A.Y. {{ $currentAcademicYear }} {{ Request::input('quarter') ? ' - Quarter ' . Request::input('quarter') : ' - All Quarters' }}</h3></div>'
            })
    ">Print</button>
</div>
<form id="subject">
<div class="col-sm-12">
    <table class="table table-bordered" id="printJS-form">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Average Rate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjectAverages as $subjectAverage)
                <tr>
                    <td>{{ $subjectAverage['subject']->name }}</td>
                    <td>{{ number_format($subjectAverage['averageRate'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</form>
@endsection
