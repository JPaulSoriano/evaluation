@extends('layouts.app')

@section('content')
    <div class="row justify-content-center text-center">
        <div class="col-sm-6">
            <h1>Faculty Dashboard</h1>
        </div>
    </div>
    <div class="jumbotron">
        <h1>Welcome!  <span class="font-weight-bold">{{ Auth::user()->name }}</span></h1>
    </div>
@endsection
