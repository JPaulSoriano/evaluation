
@extends('layouts.app')
@section('content')
<div class="col-sm-4">
<button class="btn btn-sm btn-primary mb-2" type="button" onclick="
        printJS({
                printable: 'quarter',
                type: 'html',
                header: '<div style=\'display: flex; align-items: center;\'><img src=\'{{ asset('images/logo.png') }}\' style=\'max-width: 100px; margin-right: 10px;\'><h3>{{ $faculty->full_name }} Report per Quarter for A.Y. {{ $currentAcademicYear }}</h3></div>'
            })
    ">Print</button>
</div>
<form id="quarter">
<div class="col-sm-12">
    <table class="table table-bordered" id="printJS-form">
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
                    <td>{{ number_format($averageRate, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</form>
@endsection
