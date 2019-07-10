@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Category</div>
                <div class="card-body">
                    @if(count($errors))
                        <div class="from-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('admin.categories.update',$category->id) }}" method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="from-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Produk"
                                   value="{{ $category->name }}">
                        </div>
                        <br>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary"><i
                                class="fas fa-undo"></i>
                            Back</a>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
