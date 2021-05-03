@extends('users.includes.master')

@section('page-css')
<link rel="stylesheet" href="{{asset('assets/notific/notific.css')}}" />
@stop

@section('banner')
   <div class="alert alert-success" style="width: 100%; border-radius: 0px;">
      <div class="container">
           <p>Kindly note that <strong >Delivery</strong> comes at a charge depending on your location. Minimum amount for delivery is <strong>GHC 50</strong>.   You are assured of <strong>FRESH ORGANIC PRODUCTS</strong> all the time.</p >
      </div>
   </div>
   @include('users.includes.banner')

@stop

@section('content')

          <!-- Deals Off Area Start -->
        <div class="deals-offer-area section-pt-100 section-pb-40 dealis-offer-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <div class="deals-offer-title mb-20">
                            <h2>Deal Of The Day</h2>
                            {{-- <p>Aliquam eget consectetuer habitasse interdum.</p> --}}
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-8">
                        <div class="row row-8 product-active-lg-4">
                            @foreach($products as $product)
                            <div class="product-col">
                                <!-- Single Product Start -->
                                <div class="single-product-wrap mt-30">
                                    <div class="product-image">
                                    <a href="{{url('/products/'.$product->id.'/'.$product->slug)}}">
                                        <img style="height: 200px; object-fit: cover" class="img-responsive" src="{{asset('/storage/images/products/'.$product->image)}}" alt=""></a>
                                        <span class="onsale">Sale!</span>

                                    </div>
                                    <div class="product-button">
                                        <a href="wishlist.html" class="add-to-wishlist"><i class="icon-heart"></i></a>
                                    </div>
                                    <div class="product-content">
                                        <div class="price-box">
                                        <span class="new-price">GHC {{$product->price}}</span>
                                        </div>
                                    <h6 class="product-name"><a href="{{url('/products/'.$product->id.'/'.$product->slug)}}">{{$product->name}}</a></h6>
                                        
                                        <div class="product-button-action">
                                            <button onclick="addToCart('{{$product->id}}')" class="add-to-cart">Add To cart</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Deals Off Area End -->

        <!-- Product Area Start -->
        <div class="product-area section-pt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3>Also On Sale</h3>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>

                <div class="product-wrapper-four">
                    <div class="row row-8 product-row-6-active">
                        @foreach($others as $p)
                        <div class="product-col">
                            <!-- Single Product Start -->
                            <div class="single-product-wrap mt-10">
                                <div class="product-image">
                                <a href="{{url('/products/'.$p->id.'/'.$p->slug)}}">
                                    <img src="{{asset('storage/images/products/'.$p->image)}}" style="height: 150px; object-fit: cover;" alt=""></a>
                                    @if($p->instock)
                                       <span class="onsale">In Stock</span>
                                    @else
                                       <span class="onsale">Out Of Stock</span>
                                    @endif
                                </div>
                                <div class="product-button">
                                    <a href="wishlist.html" class="add-to-wishlist"><i class="icon-heart"></i></a>
                                </div>
                                <div class="product-content">
                                    <div class="price-box">
                                    <span class="new-price">GHC {{$p->price}}</span>
                                    </div>
                                    <h6 class="product-name"><a href="{{url('/products/'.$p->id.'/'.$p->slug)}}">{{$p->name}}</a></h6>

                                    <div class="product-button-action">
                                        <button onclick="addToCart('{{$p->id}}')" class="add-to-cart">Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area Start -->
@stop

@section('below-scripts')
    <script src="{{asset('assets/notific/notific.js')}}"></script>
    <script>
        function addToCart(id){
            
            $.ajax({
                url: "{{url('/add-to-cart')}}",
                method: 'POST',
                data: {id: id, _token: "{{Session::token()}}"},
                success: function(response){
                    Message.add('Product successfully added to cart', {type: 'success'});
                    $('#cartCount').text(response.cartCount)
                    $('#cartAmount').text("GHC: "+response.cartAmount)
                    // setTimeout(function(){
                    //     window.location.reload();
                    // }, 1200);
                //    Swal.fire({
                //         position: 'top-end',
                //         icon: 'success',
                //         title: '<p>'+response.message+'</p>',
                //         showConfirmButton: false,
                //         timer: 1500
                //     })
                //     setTimeout(function(){
                //         window.location.reload();
                //     }, 1500)
                },
                error: function(error){
                    // alert(error.message);
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: error.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>
@stop