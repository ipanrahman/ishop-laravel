@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Category</div>
                <div class="card-body">
                    <div style="margin-bottom: 10px">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Created Date</th>
                                <th colspan="3">Action</th>
                            </tr>
                            </thead>
                            <tbody class="tbody-light">
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category['id'] }}</td>
                                    <td>{{ $category['name'] }}</td>
                                    <td>{{ $category['created_at'] }}</td>
                                    <td style="width: 20%">
                                        <div class="btn-group">
                                            <a class="btn btn-warning btn-sm text-white"
                                               href="{{ route('admin.categories.edit',$category->id) }}">
                                                <i class="fas fa-sync"></i> Edit</a>
                                            <a class="btn btn-success btn-sm text-white"
                                               href="{{ route('admin.categories.show',$category->id) }}">
                                                <i class="far fa-eye"></i> Detail
                                            </a>
                                            <a class="btn btn-danger btn-sm text-white" id="btnDeleteProduct"
                                               data-id="{{ $category->id }}">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function () {
            $('#btnDeleteCategory').click(function (evt) {
                if (confirm('Are you sure?')) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    let token = $("meta[name='csrf-token']").attr("content");
                    let id = $(this).data('id');
                    let url = '/admin/categories/' + id;
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            'id': id,
                            '_token': token
                        },
                        success: function (res) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>
@endpush
