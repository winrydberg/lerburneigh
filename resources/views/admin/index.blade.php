@extends('admin.includes.master')


@section('content')
       <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Lerburneigh Farms Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard 3</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content"> 
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3">
          <div class="small-box bg-aqua">
            <div class="inner">
              <div class="text-left">
                <h6><strong>SALES</strong></h6>
                <h6>Today's Income</h6>
              </div>
              <div class="text-right m-t-2">
              <p> <strong>GHC {{$todayOrderAmt}}</strong></p>
              </div>
              <div class="m-b-2">
                  {{-- <span class="text-white">35%</span> --}}
                <div class="progress bg-lightblue">
                  <div class="progress-bar bg-white" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="small-box bg-darkblue text-white">
            <div class="inner">
              <div class="text-left">
                <h6><strong>TOTAL SALES</strong></h6>
                <h6>This Month</h6>
              </div>
              <div class="text-right m-t-2">
              <p> <strong>GHC {{$thisMonthIncome}}</strong></p>
              </div>
              <div class="m-b-2">
                  {{-- <span class="text-white">55%</span> --}}
                <div class="progress bg-lightblue">
                  <div class="progress-bar bg-white" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="small-box bg-orange">
            <div class="inner">
              <div class="text-left">
                 <h6><strong>TOTAL PENDING ORDERS</strong></h6>
                  <h6>Orders Pending</h6>
              </div>
              <div class="text-right m-t-2">
              <p> <strong>{{$orderCount}}</strong></p>
              </div>
              <div class="m-b-2">
                  {{-- <span class="text-white">75%</span> --}}
                <div class="progress bg-lightblue">
                  <div class="progress-bar bg-white" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="small-box bg-green">
            <div class="inner">
              <div class="text-left">
                 <h6><strong>TODAY'S</strong></h6>
                  <h6>Processed Orders</h6>
              </div>
              <div class="text-right m-t-2">
              <p> <strong>{{$orderProcessedToday}}</strong></p>
              </div>
              <div class="m-b-2">
                  {{-- <span class="text-white">75%</span> --}}
                <div class="progress bg-lightblue">
                  <div class="progress-bar bg-white" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row --> 
      <!-- Main row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="info-box">
            <div class="col-12">
              <div class="d-flex flex-wrap">
                <div>
                  <h5>Revenue Trends</h5>
                </div>
               
              </div>
            </div>
            <div id="bar-chart"></div>
          </div>
        </div>
      </div>
    
      <div class="row">
        <div class="col-lg-8 m-b-3">
          <div class="box box-info">
            <div class="box-header with-border p-t-1">
              <h3 class="box-title text-black">Latest Orders</h3>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Order Type</th>
                      <th>Status</th>
                      <th>Amount</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $o)
                    <tr>
                    <td><a href="{{url('admin/order-details/'.$o->id)}}">{{$o->orderno}}</a></td>
                    <td>{{$o->collectionmode}}</td>
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
                      <td> {{$o->total_amount}} </td>
                    <td><a href="{{url('admin/order-details/'.$o->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    @endforeach

                   
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive --> 
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix"> 
            <a href="{{url('/admin/orders')}}" class="btn btn-sm btn-info btn-flat pull-left">View All Orders</a> 
                
            </div>
            <!-- /.box-footer --> 
          </div>
        </div>
        <div class="col-lg-4 m-b-3">
          <div> 
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2"> 
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-yellow">
                <h3>Contacts</h3>
                <h5>Highest Ordering Customers</h5>
              </div>
              <ul class="products-list product-list-in-box">

                @foreach($highestOrderingCustomers as $h)
                <li class="item">
                <div class="product-img"> <img style="height: 40px; width: 40px;" src="{{asset('assets/images/user.png')}}" alt="Product Image"> </div>
                <div class="product-info"> 
                  <a href="#" class="product-title">{{$h->user->firstname.'['.$h->user->phoneno.'] -'. $h->purchase_total}}</a> <span class="product-description"> </span> </div>
                </li>
                @endforeach
             
              </ul>
            </div>
            <!-- /.widget-user --> 
          </div>
        </div>
      </div>
      
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
@stop


@section('bottom_scripts')
     <!-- Chart Morris JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.4.1/morris.min.js"></script>

  <script>
    $(document).ready(function(){


      var data = [
          
        ];
      // var dates = <?php echo json_encode($dates); ?>;

      var revenueCnts = <?php echo json_encode($revenueCnts) ?>  ;
      var dates = <?php echo json_encode($dates) ?>  ;
      
      for(var i=0; i<dates.length; i++){
        var temp = {
          y: dates[i],
          a: revenueCnts[i]
        };
        data.push(temp);
      }

      Morris.Bar({
        element: 'bar-chart',
        data: data,
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Revenue']
      });
    })
  </script>


@stop