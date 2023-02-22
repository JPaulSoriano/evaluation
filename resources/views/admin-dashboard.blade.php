@extends('layouts.app')

@section('content')
    <div class="row justify-content-center text-center">
        <div class="col-sm-6">
            <h1>Admin Dashboard</h1>
        </div>
    </div>
    <div class="jumbotron">
        <h1>Welcome!  <span class="font-weight-bold">{{ Auth::user()->full_name }}</span></h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h1>Total Respondents: {{ $totalevaluations}}</h1>
        </div>
    </div>
    <a href="{{ route('reports') }}" class="btn btn-primary p-5">Reports per Section</a>
    <a href="{{ route('reportssubjects') }}" class="btn btn-primary p-5">Reports per Subject</a>
    <a href="{{ route('ranking') }}" class="btn btn-primary p-5">Ranking</a>

@endsection
