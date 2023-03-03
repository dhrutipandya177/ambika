@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h5 class="page-title">Dashboard</h5>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-2 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-cube-outline float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">Total Categories</h6>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 text-muted">
                            <h5 class="m-0">{{ $categories }}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-cube-send float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">Total Sub Categories</h6>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 text-muted">
                            <h5 class="m-0">{{ $subcategories }}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-buffer float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">Total Active Products</h6>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 text-muted">
                            <h5 class="m-0">{{ $products }}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-cart-outline float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">Total Orders</h6>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 text-muted">
                            <h5 class="m-0">{{ count($orders) }}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat m-b-30">
                    <div class="p-3 bg-primary text-white">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-account-box float-right mb-0"></i>
                        </div>
                        <h6 class="text-uppercase mb-0">Total Users</h6>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 text-muted">
                            <h5 class="m-0">{{ count($users) }}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Recent Orders</h4>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($orders))
                                        @php ($oi = 1) 
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>#ABK-{{ $order->order_id }}</td>
                                                <td>{{ $order->total_amount }}</td>
                                                <td>{{ $order->order_status }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td><a href="{{ route('orders.view',$order->order_id) }}" class="btn btn-sm btn-outline-info" title="View"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                        @php($oi++)
                                        @endforeach        
                                    @else
                                        <tr><td colspan="5">No Order found.</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">New Users</h4>
                        <div class="table-responsive">
                            <table id="users_table" class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <!--<th>ID</th>-->
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Type</th>
                                    <th>Created On</th>
                                    <!--<th>Action</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($users))
                                        @php ($ui = 1) 
                                        @foreach($users as $user)
                                            <tr>
                                                <!--<td>{{ $ui }}</td>-->
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone_no }}</td>
                                                <td>{{ $user->user_type }}</td>
                                                <td>{{ $user->created_at }}</td>
                                            </tr>
                                        @php($ui++)
                                        @endforeach        
                                    @else
                                        <tr><td colspan="5">No User found.</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="{{ asset('admin/pages/dashboard.js') }}"></script>
    <script>
    /*$(document).ready(function(){
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
            //{data: 'DT_RowIndex', name: 'DT_RowIndex' },
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone_no', name: 'phone_no'},
            {data: 'user_type', name: 'user_type'},
            {data: 'created_at', name: 'created_at'},
            //{data: 'action' , name : 'action', orderable : false ,searchable: false},
          ]
        });
      });

    function deleteuser(id){
        var baseUrl = "{{ route('home') }}";
        if(confirm("Are your sure to delete this user ?")){
            //alert('categories/'+catid+'/delete');
            window.location.href = baseUrl+'/'+id+'/deleteuser';
        }
      }*/
  </script>
@endsection
