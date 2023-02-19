@extends('layouts.app')


@section('content')


{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row justify-content-center">
    <div class="col-sm-8">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
        <div class="col-sm-12">
            <div class="form-group">
                <label>Lastname:</label>
                {!! Form::text('lastname', null, array('placeholder' => 'Lastname','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Firstname:</label>
                {!! Form::text('firstname', null, array('placeholder' => 'Firstname','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>MI:</label>
                {!! Form::text('mi', null, array('placeholder' => 'M.I','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>LRN: (Optional)</label>
                {!! Form::text('lrn', null, array('placeholder' => 'LRN','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>ID No:</label>
                {!! Form::text('idno', null, array('placeholder' => 'ID No','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Email:</label>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Password:</label>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Confirm Password:</label>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Role:</label>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
{!! Form::close() !!}


@endsection
