@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Celt</a></li>
                        <li class="breadcrumb-item active">Role Management</li>
                    </ol>
                </div>
                <h5 class="page-title">Role Management</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Role Managment</h4>
                                @can('role-create')
                                    <a class="btn btn-success pull-right" href="{{ route('roles.create') }}" title="Add Currency">Add</a>
                                @endcan
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <br>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @can('role-edit')
                                            <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-sm btn-outline-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                        @endcan
                                        @can('role-delete')
                                            <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteRoles({{ $role->id }})"><i class="fa fa-trash"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script>
        function deleteRoles(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        url: '{{ route('roles.delete') }}',
                        data: {id:id},
                        success: function (response) {
                            var data = response;
                            if(data.status == 1){
                                Swal.fire(
                                    'Deleted!',
                                    data.msg,
                                    'success'
                                )
                                location.reload(true);
                            }else{
                                var myArr = JSON.parse(data.msg);
                                $.each(myArr, function( index, value ) {
                                    toastr.error(value, 'Quiz');
                                });
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {

                        },
                    });
                }
            })
        }
    </script>
@endsection
