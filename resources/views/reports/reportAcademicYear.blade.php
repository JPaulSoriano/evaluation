@extends('layouts.app')
@section('content')
<div class="col-sm-4">
<button class="btn btn-sm btn-primary mb-2" type="button" onclick="
        printJS({
                printable: 'AY',
                type: 'html',
                header: '<div style=\'display: flex; align-items: center;\'><img src=\'{{ asset('images/logo.png') }}\' style=\'max-width: 100px; margin-right: 10px;\'><h3>{{ $faculty->full_name }} Report per Subject per A.Y.</h3></div>'
            })
    ">Print</button>
</div>
<form id="AY">
<div class="col-sm-12">
    <table class="table table-bordered" id="printJS-form">
        <thead>
            <tr>
                <th>AY</th>
                <th>Average Rate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($averageRates as $ay => $averageRate)
                <tr>
                    <td>{{ $ay }}</td>
                    <td>{{ number_format($averageRate, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</form>
@endsection
