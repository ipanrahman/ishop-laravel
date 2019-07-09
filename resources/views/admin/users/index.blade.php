@extends('layouts.admin')
@section('title', 'User')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">Users</h2>
            <a class="btn btn-primary float-right"  href="{{ route('user.create') }}"> Create </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.users.table')
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

@endsection