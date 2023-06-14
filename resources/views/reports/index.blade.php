@extends('layouts.app')
@section('content')
<div class="row">
    <h1 class="my-5">Report for A.Y. {{ $currentAcademicYear }}</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <h3>Per Question</h3>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Faculty</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($faculties as $faculty)
                    <tr>
                        <td>
                        <a href="{{ route('faculties.report', $faculty->id) }}">{{ $faculty->full_name }}</a>
                        </td>
                    </tr>
                @endforeach
        </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Per Category</h3>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Faculty</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($faculties as $faculty)
                    <tr>
                        <td>
                        <a href="{{ route('faculties.reportCategory', $faculty->id) }}">{{ $faculty->full_name }}</a>
                        </td>
                    </tr>
                @endforeach
        </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Per Section</h3>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Faculty</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($faculties as $faculty)
                    <tr>
                        <td>
                        <a href="{{ route('faculties.reportSection', $faculty->id) }}">{{ $faculty->full_name }}</a>
                        </td>
                    </tr>
                @endforeach
        </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Per Subject</h3>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Faculty</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($faculties as $faculty)
                    <tr>
                        <td>
                        <a href="{{ route('faculties.reportSubject', $faculty->id) }}">{{ $faculty->full_name }}</a>
                        </td>
                    </tr>
                @endforeach
        </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Per Academic Year</h3>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Faculty</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($faculties as $faculty)
                    <tr>
                        <td>
                        <a href="{{ route('faculties.reportAcademicYear', $faculty->id) }}">{{ $faculty->full_name }}</a>
                        </td>
                    </tr>
                @endforeach
        </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Per Quarter</h3>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Faculty</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($faculties as $faculty)
                    <tr>
                        <td>
                        <a href="{{ route('faculties.reportQuarter', $faculty->id) }}">{{ $faculty->full_name }}</a>
                        </td>
                    </tr>
                @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
