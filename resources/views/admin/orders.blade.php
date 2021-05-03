@extends('admin.includes.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Order History</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Tables</li>
        <li><i class="fa fa-angle-right"></i> Data Tables</li>
      </ol>
    </div>
    
    <!-- Main content -->
   <div class="content">
       <div class="row">
        <div class="col-lg-12 m-b-3">
          <div class="box box-info">
            <div class="box-header with-border p-t-1">
              <h3 class="box-title text-black">All Orders</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                     
                      <th>Qty</th>
                      <th>Status</th>
                      <th>Order Amt.</th>
                      <th>Del. Cost</th>
                      <th>Total Amt.</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($orders as $o)
                    <tr>
                    <td><a href="{{url('admin/order-details/'.$o->id)}}">{{$o->orderno}}</a></td>
                      
                      <td>{{$o->order_qty}}</td>
                      @if($o->status == 0)
                         <td><span class="label label-warning">Pending</span></td>
                      @elseif($o->status ==1)
                         <td><span class="label label-info">Confirmed</span></td>
                      @elseif($o->status == 2)
                         <td><span class="label label-success">Shipped</span></td>
                      @elseif($o->status == 3)
                        <td><span class="label label-success">Delivered</span></td>
                      @else
                         <td><span class="label label-warning">Pending</span></td>
                      @endif

                      <td> GHC{{ $o->total_amount}} </td>
                      <td> GHC{{$o->delivery_charge }} </td>
                      <td> GHC{{$o->delivery_charge + $o->total_amount }} </td>
                      <td> {{ date('d-m-Y h:i:sA', strtotime($o->created_at)) }} </td>

                      <td class="row "> 
                          <div class="btn-group col-md-8">
                            <button type="button" class="btn btn-primary btn-sm btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-edit"></i>  Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="setOrderStatus(0, '{{$o->id}}')" href="#">Pending</a>
                                <a class="dropdown-item" onclick="setOrderStatus(1, '{{$o->id}}')" href="#">Confirmed</a>
                                <a class="dropdown-item" onclick="setOrderStatus(2, '{{$o->id}}')" href="#">Shipped</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" onclick="setOrderStatus(3, '{{$o->id}}')" href="#">Delivered</a>
                            </div>
                            </div> 
                            <div class=" col-md-3">
                              <a href="{{url('admin/order-details/'.$o->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    


                    
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive --> 
            </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer --> 
          </div>
        </div>
      
      </div>
   </div>
      
     
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
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