@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">View Order</li>
                    </ol>
                </div>
                <h5 class="page-title">Invoice</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12" id="orderpdf">
                <div class="card m-b-30">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="invoice-title">
                                    <h4 class="float-right font-16"><strong>Order #ABK-{{ $order_info->order_id }}</strong></h4>
                                    <h3 class="m-t-0">
                                        <img src="{{ asset('front/images/logo/logo-dark.png')}}" alt="logo" height="45"/>
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <strong>Billed To:</strong><br>
                                            {{ $order_info->userInfo->name }}<br>
                                            {!! nl2br($order_info->company_address) !!}
                                        </address>
                                    </div>
                                    <div class="col-6 text-right">
                                        <address>
                                            <strong>Shipped To:</strong><br>
                                            {!! nl2br($order_info->shipping_address) !!}
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 m-t-30">
                                        <address>
                                            <strong>GST Number: {{ $order_info->gst_number }}</strong><br>
											<strong>Payment Method: {{ $order_info->payment_type }}</strong><br>
                                            {{ $order_info->payment_info }}
                                            Visa ending **** 4242<br>
                                            jsmith@email.com
                                        </address>
                                    </div>
                                    <div class="col-6 m-t-30 text-right">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            {{ date("F d, Y",strtotime($order_info->created_at  )) }}<br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="panel panel-default">
                                    <div class="p-2">
                                        <h3 class="panel-title font-20"><strong>Order summary</strong></h3>
                                    </div>
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <td><strong>Item</strong></td>
                                                    <td class="text-center"><strong>Quantity</strong>
													<td class="text-center"><strong>Price</strong></td>
													<td class="text-center"><strong>Product Attributes</strong></td>
                                                    </td>
                                                    <td class="text-right"><strong>Totals</strong></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                @if(!empty($order_info->orderDetails))
                                                @foreach($order_info->orderDetails as $product)
												<tr>
                                                    <td>{{ $product->product_name }}</td>
													<td class="text-center">{{ $product->quantity }}</td>                                                   
												    <td class="text-center">{{ $product->price }}</td>
													<td class="text-center">
													@if(!empty(json_decode($product->product_attributes,true)))
														@foreach(json_decode($product->product_attributes,true) as $att_name=>$att_val)
														<b> {{ $att_name }}: </b> {{ $att_val }},
														@endforeach
													@endif
													</td>
                                                    <td class="text-right">{{ $product->total_price }}</td>
                                                </tr>
                                                @endforeach
                                                @endif

                                                <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line text-center">
                                                        <strong>Subtotal</strong></td>
                                                    <td class="thick-line text-right">{{ $order_info->sub_total }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center">
                                                        <strong>GST</strong></td>
                                                    <td class="no-line text-right">{{ $order_info->gst_price }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center">
                                                        <strong>Total</strong></td>
                                                    <td class="no-line text-right"><h4 class="m-0">{{ $order_info->total_amount }}</h4></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-print-none mo-mt-2">
                                            <div class="float-right">
                                                <a href="javascript:void(0);"  onclick="printDiv('orderpdf','Order-info #ABK-{{ $order_info->order_id }}');" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <!--<a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light">Send</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>


<!--<p>don't print this to pdf</p>
<div id="pdf">
  <p>
    <font size="3" color="red">print this to pdf</font>
  </p>
</div>

<button onclick="printDiv('pdf','Title')">print div</button>

<button onclick="saveDiv('pdf','Title')">save div as pdf</button>-->


@endsection

@section('js')
    <script>
      /*function printDiv() 
        {
          window.print();
          return false;
        }*/


        //var doc = new jsPDF();
        function saveDiv(divId, title) {
         doc.fromHTML('<html><head><title>${title}</title></head><body>' + document.getElementById(divId).innerHTML + '</body></html>');
         doc.save('div.pdf');
        }

        function printDiv(divId,title) {

          let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');

          mywindow.document.write('<html><head><title>'+title+'</title>');
          mywindow.document.write('</head><body >');
          mywindow.document.write(document.getElementById(divId).innerHTML);
          mywindow.document.write('</body></html>');

          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10*/

          mywindow.print();
          mywindow.close();

          return true;
        }



    </script>
@endsection
