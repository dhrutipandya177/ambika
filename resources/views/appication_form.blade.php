@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Cel</a></li>
                        <li class="breadcrumb-item active">Course Application Management</li>
                    </ol>
                </div>
                <h5 class="page-title">Course Application Management</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Question Managment</h4>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <br>
                        <table id="application_table" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email Id</td>
                                <td>Mobile No</td>
                                <td>Profile Image</td>
                                <td>Action</td>
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
        oTable=$('#application_table').DataTable({
          processing: true,
          serverSide: true,
          bPaginate: true,
          "columnDefs": [
            { "orderable": false, "targets": [0] },
            { "orderable": true, "targets": [1, 2] }
          ],
          //sPaginationType: "full_numbers",
          ajax : "{{ route('getapplicationdata') }}",
          columns: [
            //{data:'id',name:'id'},
            {data: 'name', name: 'name'},
            {data: 'emailid', name: 'emailid'},
            {data: 'mobileno', name: 'mobileno'},
            {data: 'profile_image', name: 'profile_image'},
            {data: 'action' , name : 'action', orderable : false ,searchable: false},
          ]
        });
      });
    </script>
@endsection
