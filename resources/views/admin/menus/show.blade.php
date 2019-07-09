@extends('admin.menus.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show Menu</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('menu.index') }}"> Back</a>
            </div>
        </div>
    </div>
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label class="col-form-label">
                    <strong>Name:</strong>
                    {{ $data->name }}
                </label>
            </div>
        </div>
    </div>
</div>
@endsection
