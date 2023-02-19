@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Name:</label>
                {{ $user->full_name }}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Email:</label>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label>Roles:</label>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
