@extends('admin.roles.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show User</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
            </div>
        </div>
    </div>
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label class="col-form-label">
                    <strong>Email:</strong>
                    {{ $data->email }}
                </label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label class="col-form-label">
                    <strong>Password:</strong>
                    {{ $data->password }}
                <label class="col-form-label">
            </div>
        </div>
    </div>
</div>
@endsection
