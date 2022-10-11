@extends('layouts.app')

@section('content')

    @can('student')
        @include('student-dashboard');
    @endcan

    @can('faculty')
        @include('faculty-dashboard');
    @endcan

    @can('admin')
        @include('admin-dashboard');
    @endcan

@endsection
