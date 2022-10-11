@extends('layouts.guest')

@section('content')
<div class="position-ref">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a class="btn btn-light mx-2" href="{{ url('/home') }}">Home</a>
            @else
                <a class="btn btn-light mx-2" href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    @endif
</div>
<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
          <h1 class="font-weight-bold text-white">URBIZTONDO CATHOLIC SCHOOL INC.</h1>
          <p class="lead text-white">Faculty Evaluation System</p>
        </div>
      </div>
    </div>
  </header>
@endsection
