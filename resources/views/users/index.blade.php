@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Celt</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
                <h5 class="page-title">User List</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">User List</h4>
                                <a class="btn btn-success pull-right" href="{{ route('users.create') }}" title="Add Currency">Add</a>
                            </div>
                        </div>
                        <br>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($data) > 0)
                                @foreach ($data as $key => $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $v)
                                                    <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>--}}
                                            @can('backend-user-edit')
                                                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-outline-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                            @endcan
                                            @can('backend-user-delete')
                                                <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteUsers({{ $user->id }})"><i class="fa fa-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5"><center>No Data Found</center></td>
                                </tr>
                            @endif
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
        function deleteUsers(id){
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
                        url: '{{ route('users.delete') }}',
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
