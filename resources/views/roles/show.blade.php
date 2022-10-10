@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Name:</label>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label>Permissions:</label>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
