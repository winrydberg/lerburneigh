@extends('admin.includes.master')

@section('content')
        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">All Products</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Products</li>
      </ol>
    </div>

     <div class="content">
      <div class="info-box">
     
      <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-hover" data-name="cool-table">
                    <thead>
                        <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $p)
              <tr>
                <th scope="row">
                   <img style="height: 60px; width: 60px; object-fit: cover" class="img-responsive" src="{{asset('storage/images/products/'.$p->image)}}" />
                </th>
                <td>{{$p->name}}</td>
                <td>{{$p->price}}</td>
                <td>{!!$p->instock == true?'<span class="label label-success">In Stock</span>':'<span class="label label-danger">Out Stock</span>'!!}</td>
                <td>
                    <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-edit"></i>  Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="setProductStatus(0, '{{$p->id}}')" href="#">In Stock</a>
                                <a class="dropdown-item" onclick="setProductStatus(0, '{{$p->id}}')" href="#">Out Stock</a>
                            </div>
                            </div> 
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</button>
                    <button class="btn btn-success btn-sm"><i class="fa fa-eye"></i>View</button>

                </td>
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
// $("table").tableExport({formats: ["xlsx","xls", "csv", "txt"],    });
</script>
@stop


@section('bottom_scripts')
    <script>
      function setProductStatus(value, productid){
         Swal.fire({
                    title: 'Updating Product Status',
                    text: "A re you sure you want to update product status?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Update'
                    }).then((result) => {
                      if (result.isConfirmed) {
                            $.ajax({
                              url: "{{url('/admin/update-product-status')}}",
                              method: "POST",
                              data: {status: value, productid: productid, _token:"{{Session::token()}}"},
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