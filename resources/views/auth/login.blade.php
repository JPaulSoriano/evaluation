@extends('layouts.guest')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-8 mx-auto">
            <img src="{{ asset('images/logo.png') }}" class="img-responsive center-block d-block mx-auto my-3" style="height: 150px">
              <h3 class="login-heading mb-4 text-center">UCS Faculty Evaluation System</h3>
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a class="btn btn-primary btn-block" href="{{ url('/home') }}">Dashboard</a>
                        @else
                        <form method="POST" action="{{ route('login') }}">
                          @csrf
                          <div class="form-group">
                              <label for="idno" class="col-form-label text-md-right">{{ __('ID Number') }}</label>
                                  <input id="idno" type="text" class="form-control @error('idno') is-invalid @enderror" name="idno" value="{{ old('idno') }}" required autocomplete="idno" autofocus placeholder="ID Number">
                                  @error('idno')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                          </div>
                          <div class="form-group">
                              <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                          </div>
                          <div class="form-group">
                                  <button type="submit" class="btn btn-primary btn-block">
                                      {{ __('Login') }}
                                  </button>
                          </div>
                        </form>
                        @endauth
                    </div>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
