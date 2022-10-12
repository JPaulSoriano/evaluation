

@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">

        <div class="col-sm-8 my-1">
            <div>

                <form action="{{ URL::current() }}" method="get">
                    <div class="row">
                        <label for="">Select Faculty: </label>
                        <select name="faculty_id" id="">
                            <option value="">Select Faculty</option>
                            @foreach ($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection
