@extends('admin.includes.master')

@section('top_style')
<!-- summernote -->
<link rel="stylesheet" href="{{asset('dist/plugins/summernote/summernote-bs4.css')}}">
<!-- dropify -->
<link rel="stylesheet" href="{{asset('dist/plugins/dropify/dropify.min.css')}}">
@stop

@section('content')
       <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">New Product</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> New Product</li>
        {{-- <li><i class="fa fa-angle-right"></i> Form Elements</li> --}}
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
        <h4 class="text-black">Add New Product</h4>
        @if(Session::has('success'))
          <p class="alert alert-success">{{Session::get('success')}}</p>
        @elseif(Session::has('error'))
          <p class="alert alert-danger">{{Session::get('error')}}</p>
        @endif
      <form action="{{url('/admin/new-product')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
          <div class="col-lg-6">
            <fieldset class="form-group">
              <label>Product Name</label>
              <input required class="form-control" name="name" id="basicInput" type="text">
            </fieldset>
          </div>
         
          <div class="col-lg-6">
            <fieldset class="form-group">
              <label>Category</label>
              <select name="category" required class="form-control">
              <option selected value="{{null}}">Select category</option>
                @foreach($categories as $category)
                  
                 <option value="{{$category->id}}">{{$category->name}}</option>
                   @if(count($category->children) > 0)
                       @foreach ($category->children as $item)
                           <option value="{{$item->id}}">--{{$item->name}}</option>
                       @endforeach
                   @endif
                @endforeach
              </select>
            </fieldset>
          </div>

           <div class="col-lg-6">
            <fieldset class="form-group">
              <label>Price(GHC)</label>
              <input required class="form-control" name="price" id="helpInputTop" type="number">
            </fieldset>
          </div>

          <div class="col-lg-6">
            <fieldset class="form-group">
              <label>Sale Price(GHC)</label>
              <input required class="form-control" name="sale_price" id="helpInputTop" type="number">
            </fieldset>
          </div>

          <div class="col-lg-6">
            <fieldset class="form-group">
              <label>Featured</label>
                <select name="featured" class="form-control">
                    <option value="1" selected="selected">Featured</option>
                    <option value="0">Not Featured</option>
                </select>
            </fieldset>
          </div>

          <div class="col-lg-6">
            <fieldset class="form-group">
              <label for="input-file-now">Product Image</label>
              <input type="file" id="input-file-now" name="image" class="dropify" />
            </fieldset>
          </div>


          <div class="col-lg-12">
            <fieldset class="form-group">
              <label>Product Description</label>
               <textarea name="description" id="summernote"></textarea>
            </fieldset>
          </div>


          <hr class="m-t-3 m-b-3">
          <div class="col-lg-4">
            {{-- <fieldset class="form-group"> --}}
              <button type="submit" class="btn btn-primary btn-block">Add Product</button>
            {{-- </fieldset> --}}
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
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 

<script src="{{asset('dist/plugins/popper/popper.min.js')}}"></script> 
<script src="{{asset('dist/bootstrap/js/bootstrap.beta.min.js')}}"></script> 
<!-- template --> 
<script src="{{asset('dist/js/niche.js')}}"></script> 
<!-- summernote --> 
<script src="{{asset('dist/plugins/summernote/summernote-bs4.js')}}"></script> 
<script>
      $('#summernote').summernote({
            height: 200, // set editor height
			placeholder: 'Enter Product Description',
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
        var edit = function() {
  		$('.click2edit').summernote({focus: true});
		};

		var save = function() {
  		var markup = $('.click2edit').summernote('code');
  		$('.click2edit').summernote('destroy');
};
</script>

<!-- dropify --> 
<script src="{{asset('dist/plugins/dropify/dropify.min.js')}}"></script> 
<script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

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