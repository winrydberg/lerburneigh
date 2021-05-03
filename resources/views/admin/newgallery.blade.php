@extends('admin.includes.master')

@section('top_style')
<!-- dropify -->
<link rel="stylesheet" href="{{asset('dist/plugins/dropify/dropify.min.css')}}">
@stop

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Add Photo </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Gallery</li>
        {{-- <li><i class="fa fa-angle-right"></i> Form Elements</li> --}}
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
        <h4 class="text-black">New Photo</h4>
        @if(Session::has('success'))
          <p class="alert alert-success">{{Session::get('success')}}</p>
        @elseif(Session::has('error'))
          <p class="alert alert-danger">{{Session::get('error')}}</p>
        @endif
      <form action="{{url('/admin/new-gallery')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
          <div class="col-lg-12">
            <fieldset class="form-group">
              <label>Caption</label>
              <input required class="form-control" name="caption" id="basicInput" type="text">
            </fieldset>
          </div>

          <div class="col-lg-12">
            <fieldset class="form-group">
              <label for="input-file-now">Gallery Image</label>
              <input type="file" required id="input-file-now" name="image" class="dropify" />
            </fieldset>
          </div>

          <hr class="m-t-3 m-b-3">
          <div class="col-lg-4">
            <fieldset class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Add Photo</button>
            </fieldset>
          </div>
         
        </div>
        </form>
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
  </div>
@stop

@section('bottom_scripts')
<!-- jQuery 3 --> 
<script src="{{asset('dist/js/jquery.min.js')}}"></script> 

<!-- v4.0.0-alpha.6 --> 

<script src="{{asset('dist/plugins/popper/popper.min.js')}}"></script> 
<script src="{{asset('dist/bootstrap/js/bootstrap.beta.min.js')}}"></script> 
<!-- template --> 
<script src="{{asset('dist/js/niche.js')}}"></script> 
<!-- dropify --> 
<script src="{{asset('dist/plugins/dropify/dropify.min.js')}}"></script> 
<script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                // $('.dropify-fr').dropify({
                //     messages: {
                //         default: 'Glissez-déposez un fichier ici ou cliquez',
                //         replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                //         remove:  'Supprimer',
                //         error:   'Désolé, le fichier trop volumineux'
                //     }
                // });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>
@stop