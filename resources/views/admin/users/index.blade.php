@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">Users Listing</li>
                    </ol>
                </div>
                <h5 class="page-title">Users Listing</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="header-title">Users</h4>
                            </div>
                            <div class="col-2">
                                <a class="btn btn-success" href="{{ route('home.createuser') }}" role="button">Add New Dealer</a>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                                {{ $message }}
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                    {{$errors->first()}}
                                </div>
                            @endif
                        @endif 

                        <br>
                        <table id="users_table" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Type</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
      $(document).ready(function(){
        oTable=$('#users_table').DataTable({
          processing: true,
          serverSide: true,
          bPaginate: true,
          "columnDefs": [
            { "orderable": false, "targets": [0] },
            { "orderable": true, "targets": [1, 2] }
          ],
          //sPaginationType: "full_numbers",
          ajax : "{{ route('home.getusers') }}",
          columns: [
            //{data:'id',name:'id'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex' },
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone_no', name: 'phone_no'},
            {data: 'user_type', name: 'user_type'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action' , name : 'action', orderable : false ,searchable: false},
          ]
        });
      });

    function deleteuser(id){
        var baseUrl = "{{ route('home') }}";
        if(confirm("Are your sure to delete this user ?")){
            //alert('categories/'+catid+'/delete');
            window.location.href = baseUrl+'/'+id+'/deleteuser';
        }
      }
    </script>
@endsection
