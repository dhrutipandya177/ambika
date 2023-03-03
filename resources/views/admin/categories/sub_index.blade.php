@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">Sub Category Listing</li>
                    </ol>
                </div>
                <h5 class="page-title">Sub Category Listing</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="header-title">Sub Categories</h4>
                            </div>
                            <div class="col-2">
                                <a class="btn btn-success" href="{{ route('subcategories.create') }}" role="button">Add New Sub Category</a>
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
                        <table id="categories_table" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Image</td>
                                <td>Sub Category Name</td>
                                <td>Parent Category Name</td>
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
        oTable=$('#categories_table').DataTable({
          processing: true,
          serverSide: true,
          bPaginate: true,
          "columnDefs": [
            { "orderable": false, "targets": [0] },
            { "orderable": true, "targets": [1, 2] }
          ],
          //sPaginationType: "full_numbers",
          ajax : "{{ route('subcategories.getchildcategories') }}",
          columns: [
            //{data:'id',name:'id'},
            {data: 'DT_RowIndex', name: 'DT_RowIndex' },
            {data: 'image', name: 'image'},
            {data: 'name', name: 'name'},
            {data: 'parent_name', name: 'parent_name'},
            {data: 'action' , name : 'action', orderable : false ,searchable: false},
          ]
        });
      });

      function deletesubcat(catid){
      	var baseUrl = "{{ route('subcategories.index') }}";
        if(confirm("Are your sure to delete this sub category?")){
      		//alert("{{ route('subcategories.getchildcategories') }}");
            //lert(baseUrl+'/'+catid+'/delete');
      		window.location.href = baseUrl+'/'+catid+'/delete';
      	}
      }
    </script>
@endsection
