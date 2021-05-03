@extends('admin.includes.master')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Customers</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Customerss</li>
        {{-- <li><i class="fa fa-angle-right"></i> Data Tables</li> --}}
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
      <h4 class="text-black">Data Export</h4>
      <p>Export data to Copy, CSV, Excel, PDF & Print</p>
      <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-hover" data-name="cool-table">
                    <thead>
                      <tr>
                        <th>ID #</th>
                        <th>Full Name</th>
                        <th>Cust.Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Reg. date</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                      <tr>
                        <td>LB00{{$user->id}}</td>
                        <td>{{$user->firstname.' '.$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phoneno}}</td>
                        <td><span class="label label-success">Complete</span></td>
                        <td>{{date('d-m-Y', strtotime($user->created_at))}}</td>
                        
                      </tr>
                      @endforeach                     
                    </tbody>
                  
                  </table>
                  </div>
      </div>
      
     
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
@stop

@section('bottom_scripts')
 <!-- DataTable --> 
<script src="{{asset('dist/plugins/datatables/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('dist/plugins/datatables/dataTables.bootstrap.min.js')}}"></script> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script src="{{asset('dist/plugins/table-expo/filesaver.min.js')}}"></script>
<script src="{{asset('dist/plugins/table-expo/xls.core.min.js')}}"></script>
<script src="{{asset('dist/plugins/table-expo/tableexport.js')}}"></script>
<script>
$("table").tableExport({formats: ["xlsx","xls", "csv", "txt"],    });
</script>
@stop