@extends('admin.includes.master')

@section('content')
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Message Box</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Apps</li>
        <li><i class="fa fa-angle-right"></i> Message Box</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
        
        <div class="col-lg-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls"> 
                <!-- Check all button -->
                {{-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i> </button> --}}
                {{-- <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div> --}}
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                
                <!-- /.pull-right --> 
              </div>
              <div class="table-responsive ">
                <table class="table table-hover no-wrap table-striped">
                  <tbody>
                   
                    @foreach($contacts as $c)
                    <tr>
                      
                      <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                    <td class="mailbox-name">{{$c->name}}</td>
                    <td class="mailbox-subject"><a href="#" onclick="viewDetails({{$c}})">
                        {{ \Illuminate\Support\Str::limit($c->message, 50, $end='...') }}
                    </a></td>
                      <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                      <td class="mailbox-date">{{date('d-m-Y H:i:s', strtotime($c->created_at))}}</td>
                      <td>
                          <button class="btn btn-sm btn-success" onclick="viewDetails({{$c}})"><i class="fa fa-eye"></i></button>
                      </td>
                    </tr>
                    @endforeach
               
                  </tbody>
                </table>
                <!-- /.table --> 

                
              </div>
              
              <!-- /.mail-box-messages --> 
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding m-b-2">
              <div class="mailbox-controls"> 
                <!-- Check all button -->
                {{-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i> </button> --}}
                {{-- <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div> --}}
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                
                <!-- /.pull-right --> 
              </div>
            </div>
          </div>
          <!-- /. box --> 
        </div>
      </div>
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
  </div>


  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message Details</h4>
      </div>
      <div class="modal-body">
        <ul class="list-group">
        <li class="list-group-item">Name: <strong id="name"></strong></li>
        <li class="list-group-item">Email: <strong id="email"></strong></li>
        <li class="list-group-item">Phone Number: <strong id="phoneno"></strong></li>
        </ul>
        <p id="message">
            
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

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

<!-- iCheck --> 
<script src="{{asset('dist/plugins/iCheck/icheck.min.js')}}"></script> 

<!-- Page Script --> 
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });


  function viewDetails(item){
     $('#phoneno').empty().append(" "+item.phoneno);
     $('#email').empty().append(" "+item.email);
     $('#name').empty().append(" "+item.name);
     $('#message').empty().append(" "+item.message);
     $('#myModal').modal('show');
  }
</script>
@stop