@extends('layouts.admin')
@section('title', 'Menu')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="float-left">Menu</h2>
            <a class="btn btn-primary float-right"  href="{{ route('menu.create') }}"> Create </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('admin.menus.table')
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

@endsection