@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">Products Listing</li>
                    </ol>
                </div>
                <h5 class="page-title">Products Listing</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="header-title">Products</h4>
                            </div>
                            <div class="col-2">
                                <a class="btn btn-success" href="{{ route('products.create') }}" role="button">Add New Product</a>
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
                        <table id="products_table" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Product Name</td>
                                <td>Image</td>
                                <td>Parent Category Name</td>
                                <td>Category Name</td>
                                <td>Price</td>
                                <td>Created On</td>
                                <td>Show in Application</td>
                                <td>Status</td>
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
        oTable=$('#products_table').DataTable({
          processing: true,
          serverSide: true,
          bPaginate: true,
          "columnDefs": [
            { "orderable": false, "targets": [0] },
            { "orderable": true, "targets": [1, 2] }
          ],
          //sPaginationType: "full_numbers",
          ajax : "{{ route('products.getproducts') }}",
          columns: [
            //{data:'id',name:'id'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex' },
            {data: 'name', name: 'name'},
            {data: 'image', name: 'image'},
            {data: 'parent_cat_name', name: 'parent_cat_name'},
            {data: 'cat_name', name: 'cat_name'},
            {data: 'price', name: 'price'},
            {data: 'created_at', name: 'created_at'},
            {data: 'show_in_application', name: 'show_in_application'},
            {data: 'status', name: 'status'},
            {data: 'action' , name : 'action', orderable : false ,searchable: false},
          ]
        });
      });

      function deletecat(pid){
      	var baseUrl = "{{ route('products.index') }}";
        if(confirm("Are your sure to delete this product?")){
      		window.location.href = baseUrl+'/'+pid+'/delete';
      	}
      }
    </script>
@endsection
