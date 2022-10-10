@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
