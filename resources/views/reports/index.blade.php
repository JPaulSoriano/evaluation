

@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

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

        </div>
    </div>

    <div class="row justify-content-center">

        <div class="col-sm-8 my-1">
            <div>

                <form action="{{ URL::current() }}" method="get">
                    <div class="row form-group mb-2">
                        <div class="col-sm-6">
                            <label>Select Faculty: </label>
                            <select class="form-control" name="faculty_id" id="" required>
                                <option value="">Select Faculty</option>
                                @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Select Academic Year: </label>
                            <input class="date-own form-control" name="academicYear" type="text" required autocomplete="off">
                        </div>
                        <div class="col-sm-12 text-center my-4">
                            <button type="submit" class="btn btn-primary">Show Reports</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection
