@extends('layouts.app')
@section('styles')
<style>
  .carousel-caption {
    background: rgba(0, 0, 0, 0.5); /* Add a semi-transparent black background */
    padding: 10px; /* Add padding to the caption for spacing */
  }
</style>
@endsection
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
    <div class="row">
        <div class="col-sm-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{ asset('images/steps/1.png') }}" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>STEP 1</h5>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{ asset('images/steps/2.png') }}" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>STEP 2</h5>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{ asset('images/steps/3.png') }}" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>STEP 3</h5>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{ asset('images/steps/4.png') }}" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>STEP 4</h5>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{ asset('images/steps/5.png') }}" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>STEP 5</h5>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{ asset('images/steps/6.png') }}" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>STEP 6</h5>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{ asset('images/steps/7.png') }}" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>STEP 7</h5>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
            </div>
        </div>
    </div>
@endsection
