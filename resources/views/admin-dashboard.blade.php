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
        <div class="col-sm-6 text-white">
            <h1>Total Respondents: {{ $totalevaluations}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <a href="{{ route('reports') }}" class="btn btn-primary p-5 btn-block my-2">Reports per Section</a>
        </div>
        <div class="col-sm-4">
            <a href="{{ route('reportssubjects') }}" class="btn btn-primary p-5 btn-block my-2">Reports per Subject</a>
        </div>
        <div class="col-sm-4">
            <a href="{{ route('ranking') }}" class="btn btn-primary p-5 btn-block my-2">Ranking</a>
        </div>
    </div>

@endsection
