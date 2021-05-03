@extends('admin.includes.master')

@section('content')

<div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Banners</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Banners</li>
        {{-- <li><i class="fa fa-angle-right"></i> Form Elements</li> --}}
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
        <h4 class="text-black">New Banner</h4>
        @if(Session::has('success'))
          <p class="alert alert-success">{{Session::get('success')}}</p>
        @elseif(Session::has('error'))
          <p class="alert alert-danger">{{Session::get('error')}}</p>
        @endif
      <form action="{{url('/admin/banners')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
          
          <div class="col-lg-7">
            <fieldset class="form-group">
              <label>Banner Title</label>
              <input class="form-control" name="title" id="helpInputTop" type="text">
            </fieldset>
          </div>
          <div class="col-lg-5">
            <fieldset class="form-group">
              <label>Banner Image</label>
              <input required class="form-control" name="image" id="basicInput" type="file">
            </fieldset>
          </div>
          <div class="col-lg-7">
            <fieldset class="form-group">
              <label>Sub Title</label>
              <input class="form-control" name="subtitle" id="helpInputTop" type="text">
            </fieldset>
          </div>
        
          <div class="col-lg-5">
            <fieldset class="form-group">
                <br>
              <button type="submit" class="btn btn-primary btn-block">Add Banner</button>
            </fieldset>
          </div>
         
        </div>
        </form>
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
    
  </div>


  <div class="content">
      <div class="info-box">
        <h4 class="text-black">Page Banners</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
               
              <tr>
                {{-- <th scope="col">#</th> --}}
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>

            </thead>
            <tbody>
                 @foreach($banners as $b)
              <tr>
                {{-- <th scope="row">#00{{$b->id}}</th> --}}
                <td>
                <img class="img-responsive" style="width: 100px;" src="{{asset('storage/images/banners/'.$b->image_url)}}" />
                </td>
                <td>{{$b->title}}</td>
                <td>{{$b->active==true?'Active':'Not Active'}}</td>
                <td>
                    <button class="btn btn-danger btn-sm">Deactivate</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
      </div>
    </div>



        <!-- Content Wrapper. Contains page content -->
@stop

@section('bottom_scripts')
  <script>
      setTimeout(function(){
          $('.alert').slideUp();
      }, 2000)
  </script>
@stop