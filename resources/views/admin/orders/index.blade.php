@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">Orders Listing</li>
                    </ol>
                </div>
                <h5 class="page-title">Orders Listing</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Orders</h4>
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
                        <table id="orders_table" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Order ID</td>
                                <td>Invoice ID</td>
                                <td>Email</td>
                                <td>Phone Number</td>
                                <td>Total</td>
                                <td>Order Status</td>
                                <td>Payment Status</td>
                                <td>Created On</td>
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
        oTable=$('#orders_table').DataTable({
          processing: true,
          serverSide: true,
          bPaginate: true,
          "columnDefs": [
            { "orderable": false, "targets": [0] },
            { "orderable": true, "targets": [1, 2] }
          ],
          //sPaginationType: "full_numbers",
          ajax : "{{ route('orders.getorders') }}",
          columns: [
            //{data:'id',name:'id'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex' },
            {data: 'order_id', name: 'order_id'},
            {data: 'invoice_no', name: 'invoice_no'},
            {data: 'email', name: 'email'},
            {data: 'phone_no', name: 'phone_no'},
            {data: 'total_amount', name: 'total_amount'},
            {data: 'order_status', name: 'order_status'},
            {data: 'payment_status', name: 'payment_status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action' , name : 'action', orderable : false ,searchable: false},
          ]
        });
      });

      function deleteorders(id){
      	var baseUrl = "{{ route('orders.index') }}";
        if(confirm("Are your sure to delete this orders ?")){
      		//alert('categories/'+catid+'/delete');
      		window.location.href = baseUrl+'/'+id+'/delete';
      	}
      }
    </script>
@endsection
