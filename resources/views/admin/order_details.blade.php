@extends('admin.includes.master')



@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Order Details</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Order Details</li>
        {{-- <li><i class="fa fa-angle-right"></i> Form Elements</li> --}}
      </ol>
    </div>
    
    @if($order != null)
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
      <h4 class="text-black">Order No - {{$order->orderno}}  </h4> 
      
      <div class="row">
          <div class="col-md-12 bg-navy" style="padding-top: 10px; margin-bottom: 20px;">
        <h3>Total Order Amount:  GHC {{$order->total_amount + $order->delivery_charge}}</h3>
        </div>
      </div>
      <div class="row">

        
        <div class="col-md-6">
            <h5 class="bg-success" style="padding: 10px; color:#FFF;">Order / Shipping Information</h5>
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <td scope="col">Order No</td>
                <td scope="col">{{$order->orderno}}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td scope="row">Order Amt.</td>
                <td>GHC {{$order->total_amount}}</td>
                </tr>

                <tr>
                <td scope="row">Order Status.</td>
                 @if($order->status == 0)
                       <td ><strong class="badge-warning"  style="color:#FFF; padding: 10px;">PENDING</strong></td>
                 @elseif($order->status == 1)
                       <td ><strong class="badge-info"  style="color:#FFF; padding: 10px;">CONFIRMED</strong></td>
                 @elseif($order->status ==2)
                       <td ><strong class="badge-primary"  style="color:#FFF; padding: 10px;">SHIPPED</strong></td>
                 @elseif($order->status ==3)
                       <td ><strong class="badge-success"  style="color:#FFF; padding: 10px;">DELIVERED</strong></td>
                 @endif
                </tr>

                <tr>
                <td scope="row">Delivery Amt.</td>
                <td>GHC {{$order->delivery_charge}}</td>
                </tr>

                <tr>
                <td scope="row">Delivery City</td>
                <td>{{$city==null?'':$city->name}}</td>
                </tr>

                <tr>
                <td scope="row">Landmark</td>
                <td>{{$order->shippingdetails->landmark}}</td>
                </tr>
            </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <h5 class="bg-primary" style="padding: 10px; color:#FFF;">Customer Information</h5>
              <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <td scope="col">Customer Name</td>
                <td scope="col">{{$order->user->firstname}}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td scope="row">Phone No.</td>
                <td>{{$order->user->phoneno}}</td>
                </tr>

                <tr>
                <td scope="row">Email</td>
                <td>{{$order->user->email}}</td>
                </tr>

            </tbody>
            </table>
  

            <br/>

            <h5 class="bg-purple" style="padding: 10px;">Ordered Items</h5>
              <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Price (GHC)</th>
                <th scope="col">Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderitems as $oi)
                <tr>
                    <td scope="row">{{$oi->name}}</td>
                    <td>{{$oi->price}}</td>
                    <td>{{$order->order_qty}}</td>
                </tr>
                @endforeach

            </tbody>
            </table>
        </div>

        </div>

        <div class="COL-MD-12">
            <button class="btn btn-info">PRINT INVOICE</button>
            <div class="btn-group col-md-3">
                            <button type="button" class="btn btn-primary btn-md  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-edit"></i>  Action
                            </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" onclick="setOrderStatus(0, '{{$order->id}}')" href="#">Pending</a>
                                <a class="dropdown-item" onclick="setOrderStatus(1, '{{$order->id}}')" href="#">Confirmed</a>
                                <a class="dropdown-item" onclick="setOrderStatus(2, '{{$order->id}}')" href="#">Shipped</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" onclick="setOrderStatus(3, '{{$order->id}}')" href="#">Delivered</a>
                            </div>
                            </div> 
        </div>

    </div>

    @else

    <div class="content">
      <div class="info-box">
        <p class="alert alert-danger">Oops Order Not Found</p> 
    </div>
    @endif
    <!-- /.content --> 
  </div>
@stop

@section('bottom_scripts')
    <script>
      
      function setOrderStatus(value, orderid){
         Swal.fire({
                    title: 'Updating Order Status',
                    text: "A re you sure you want to update order status?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Update'
                    }).then((result) => {
                      if (result.isConfirmed) {
                            $.ajax({
                              url: "{{url('/admin/update-order-status')}}",
                              method: "POST",
                              data: {status: value, orderid: orderid, _token:"{{Session::token()}}"},
                              success: function(response){
                                  console.log(response)
                                    if(response.status =='success'){
                                         Swal.fire({
                                        icon: 'success',
                                        title: response.message,
                                    }).then(okay => {
                                      if(okay){
                                        window.location.reload();
                                      }
                                    })
                                    }else{
                                       
                                    }
                              },
                              error: function(error){
                                console.log(error)
                                    alert("Oops something went wrong. Please try again.");
                              }
                          })
                      }else{
                        
                      }
                    })
         
      }
    </script>
@stop