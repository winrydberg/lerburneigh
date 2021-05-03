@extends('users.includes.master')

@section('page-css')
<link rel="stylesheet" href="{{asset('assets/gallery/jquery.lightbox.min.css')}}">
@stop


@section('content')
            <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->


         <!-- main-content-wrap start -->
        <div class="main-content-wrap shop-page section-ptb">
            <div class="container">
                <div class="row single-product-area product-details-inner">
                  <div class="col-lg-12 col-md-12">
                        <!-- Product Details Left -->
                        <div class="product_big_images_gallery">
                            @foreach ($galleries as $item)
                               <div class="single-product-gallery col-md-3">
                                <a href="{{asset('storage/images/gallery/'.$item->image)}}" data-fancybox="images">
                                <img src="{{asset('storage/images/gallery/'.$item->image)}}" style="height: 250px; object-fit: cover;" class="img-fluid" alt="product-details" /></a>
                            </div> 
                            @endforeach
                        </div>
                        <!--// Product Details Left -->
                    </div>
                </div>
        {{-- <ul class="gallery">
            <li>
                <a href="large-1.jpg">
                <img src="thumb-1.jpg">
                </a>
            </li>
            <li>
                <a href="large-2.jpg">
                <img src="thumb-2.jpg">
                </a>
            </li>
            <li>
                <a href="large-3.jpg">
                <img src="thumb-3.jpg">
                </a>
            </li>
            ...
            </ul> --}}
            </div>
        </div>
@stop

@section('below-scripts')
    
    <script src="{{asset('assets/gallery/jquery.lightbox.min.js')}}"></script>

    <script>
        $(function() {
             $('.gallery a').lightbox(); 
        });
    </script>

@stop