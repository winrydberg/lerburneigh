@extends('admin.includes.master')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">New City</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> New City</li>
        {{-- <li><i class="fa fa-angle-right"></i> Form Elements</li> --}}
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
        <h4 class="text-black">New City</h4>
        @if(Session::has('success'))
          <p class="alert alert-success">{{Session::get('success')}}</p>
        @elseif(Session::has('error'))
          <p class="alert alert-danger">{{Session::get('error')}}</p>
        @endif
      <form action="{{url('/admin/new-city')}}" method="POST">
        {{csrf_field()}}
        <div class="row">
          <div class="col-lg-12">
            <fieldset class="form-group">
              <label>Name</label>
              <input required class="form-control" name="name" id="basicInput" type="text">
            </fieldset>
          </div>
          
          <div class="col-lg-6">
            <fieldset class="form-group">
              <label>Region</label>
              <select name="region" required class="form-control">
                <option selected value="0" disabled>Select Region...</option>
                @foreach($regions as $region)
                 <option value="{{$region->id}}">{{$region->name}}</option>
                @endforeach
              </select>
            </fieldset>
          </div>

          <div class="col-lg-6">
            <fieldset class="form-group">
              <label>City Delivery Charge</label>
              <input class="form-control" min="1" name="charge" id="helpInputTop" type="number">
            </fieldset>
          </div>

          <hr class="m-t-3 m-b-3">
          <div class="col-lg-4">
            <fieldset class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Add City</button>
            </fieldset>
          </div>
         
        </div>
        </form>
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
  </div>
@stop