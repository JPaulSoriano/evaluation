@extends('layouts.app')

@section('content')
    <div class="row justify-content-center text-center">
        <div class="col-sm-6">
            <h1>Student Dashboard</h1>
        </div>
    </div>
    <div class="jumbotron">
        <h1>Welcome!  <span class="font-weight-bold">{{ Auth::user()->full_name }}</span></h1>
    </div>
    <h3>Steps how to evaluate a faculty</h3>
    <ol type="1">
        <li>Go to Evaluation Tab</li>
        <li>Look for the Faculty that you want to evaluate</li>
        <li>Click the Evaluate button</li>
        <li>Select your section</li>
        <li>Choose what subject the faculty teaches to your section</li>
        <li>Read the Rating Legend</li>
        <li>You can now evaluate the Faculty by Rating the faculty from 1-5</li>
    </ol>
@endsection
