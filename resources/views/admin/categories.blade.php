@extends('admin.includes.master')

@section('content')
        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">All categories</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Categories</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
        <h4 class="text-black">Product Categories</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
               
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Parent</th>
                <th scope="col">Action</th>
              </tr>

            </thead>
            <tbody>
                 @foreach($categories as $category)
              <tr>
                <th scope="row">#00{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>Parent</td>
                <td>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
@stop