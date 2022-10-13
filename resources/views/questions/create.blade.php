@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-sm-8">
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
        <form action="{{ route('questions.store') }}" method="POST">
            @csrf
             <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Question:</label>
                        <input type="text" name="question" class="form-control" placeholder="Question">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
