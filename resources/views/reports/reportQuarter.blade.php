
@extends('layouts.app')
@section('content')
<div class="col-sm-12">
        <button class="btn btn-sm btn-primary mb-2" type="button" onclick="printJS('printJS-form', 'html')">
            Print
        </button>
    <table class="table table-bordered" id="printJS-form">
        <thead>
            <tr>
                <th colspan="2">{{ $faculty->full_name }} Report per Quarter for A.Y. {{ $currentAcademicYear }}</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Section</th>
                <th>Average Rate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($averageRates as $quarter => $averageRate)
                <tr>
                    <td>{{ $quarter }}</td>
                    <td>{{ $averageRate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
