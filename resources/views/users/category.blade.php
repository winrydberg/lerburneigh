@extends('users.includes.master')

@section('content')
           <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item">Category</li>
                        <li class="breadcrumb-item active">{{$category->name}}</li>
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
                <div class="row">
                    <div class="col-lg-3 order-lg-1 order-2">
                        <!-- shop-sidebar-wrap start -->
                        <div class="shop-sidebar-wrap">
                            <div class="shop-box-area">

                                <!--sidebar-categores-box start  -->
                                <div class="sidebar-categores-box shop-sidebar mb-30">
                                    <h4 class="title">Sub categories</h4>
                                    <!-- category-sub-menu start -->
                                    <div class="category-sub-menu">
                                        <ul>
                                              @foreach($categories as $c)
                                                <li class="has-sub"><a href="#">{{$c->name}}</a>
                                                    <ul>
                                                        <li><a href="#">Compound Butter (3)</a></li>
                                                        <li><a href="#">Cultured Butter (4)</a></li>
                                                        <li><a href="#">Whipped Butter (4)</a></li>
                                                    </ul>
                                                </li>
                                            @endforeach
                                          
                                        </ul>
                                    </div>
                                    <!-- category-sub-menu end -->
                                </div>
                                <!--sidebar-categores-box end  -->

                                <!-- shop-sidebar start -->
                                <div class="shop-sidebar mb-30">
                                    <h4 class="title">Filter By Price</h4>
                                    <!-- filter-price-content start -->
                                    <div class="filter-price-content">
                                        <form action="#" method="post">
                                            <div id="price-slider" class="price-slider"></div>
                                            <div class="filter-price-wapper">

                                                <a class="add-to-cart-button" href="#">
                                                    <span>FILTER</span>
                                                </a>
                                                <div class="filter-price-cont">

                                                    <span>Price:</span>
                                                    <div class="input-type">
                                                        <input type="text" id="min-price" readonly="" />
                                                    </div>
                                                    <span>—</span>
                                                    <div class="input-type">
                                                        <input type="text" id="max-price" readonly="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- filter-price-content end -->
                                </div>
                                <!-- shop-sidebar end -->

                               

                                <!-- shop-sidebar start -->
                                
                                <!-- shop-sidebar end -->

                            </div>
                        </div>
                        <!-- shop-sidebar-wrap end -->
                    </div>
                    <div class="col-lg-9 order-lg-2 order-1">

                        <div class="shop-banner mb-30">
                            <img  style="background-color: rgba(26, 25, 25, 0.3); border-radius: 10px;" src="{{asset('assets/images/slider/banner1.png')}}"  alt="Shop banner">
                        </div>

                        <!-- shop-product-wrapper start -->
                        <div class="shop-product-wrapper">
                            <div class="row align-itmes-center">
                                <div class="col">
                                    <!-- shop-top-bar start -->
                                    <div class="shop-top-bar">
                                        <!-- product-view-mode start -->

                                        <div class="product-mode">
                                            <!--shop-item-filter-list-->
                                            <ul class="nav shop-item-filter-list" role="tablist">
                                                {{-- <li class="active"><a class="active grid-view" data-toggle="tab" href="#grid"><i class="ion-ios-keypad-outline"></i></a></li> --}}
                                                <li class="active"><a class="active list-view" data-toggle="tab" href="#list"><i class="ion-ios-list-outline"></i></a></li>
                                            </ul>
                                            <!-- shop-item-filter-list end -->
                                        </div>
                                        <!-- product-view-mode end -->
                                        <!-- product-short start -->
                                        <div class="product-short">
                                            <p>Sort By :</p>
                                            <select class="nice-select" name="sortby">
                                                <option value="trending">Relevance</option>
                                                <option value="sales">Name(A - Z)</option>
                                                <option value="sales">Name(Z - A)</option>
                                                <option value="rating">Price(Low > High)</option>
                                                <option value="date">Rating(Lowest)</option>
                                            </select>
                                        </div>
                                        <!-- product-short end -->
                                    </div>
                                    <!-- shop-top-bar end -->
                                </div>
                            </div>

                            <!-- shop-products-wrap start -->
                            <div class="shop-products-wrap">
                                <div class="tab-content">
                                   
                                    <div class="tab-pane active" id="list">
                                        @foreach($products as $product)
                                        <div class="shop-product-list-wrap">
                                            <div class="row product-layout-list">
                                                <div class="col-lg-3 col-md-3">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product">
                                                        <div class="product-image">
                                                            <a href="{{url('/products/'.$product->id.'/'.$product->slug)}}">
                                                            <img style="object-fit: cover; height: 180px;" class="img-fluid" src="{{asset('storage/images/products/'.$product->image)}}" alt="Produce Images">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="product-content-list text-left">
                                                        <div class="price-box">
                                                            <span class="new-price"> GHC {{$product->price}}	</span>
                                                        </div>
                                                    <p><a href="{{url('/products/'.$product->id.'/'.$product->slug)}}" class="product-name">{{$product->name}}</a></p>

                                                        <div class="product-rating">
                                                            <ul class="d-flex">
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li class="bad-reting"><a href="#"><i class="icon-star"></i></a></li>
                                                            </ul>
                                                        </div>

                                                       <p>{!!$product->description!!}</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="block2">
                                                        <ul class="stock-cont">
                                                            
                                                        <li class="product-stock-status">Availability: <span class="in-stock">{{$product->instock==true?'In Stock': 'Out Of Stock'}}</span></li>
                                                        </ul>
                                                        <div class="product-button">
                                                            <div class="add-to-cart">
                                                                <div class="product-button-action">
                                                                    @if($product->instock)
                                                                       <button onclick="addToCart('{{$product->id}}')" class="add-to-cart btn btn-success">Add To Cart</button>
                                                                    @else
                                                                       <button disabled class="add-to-cart btn btn-success">Add To Cart</button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <ul class="actions">
                                                                <li class="add-to-wishlist">
                                                                    <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>
                                                                </li>
                                                                <li class="add-to-compare">
                                                                    <div class="compare-button"><a href="compare.html"><i class="icon-sliders"></i> Compare</a></div>
                                                                </li>
                                                                <li class="quickviewbtn">
                                                                    <a class="detail-link quickview" href="#"> <i class="icon-eye2"></i> Quick View</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrap end -->

                            <!-- paginatoin-area start -->
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <ul class="pagination-box">
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>
                                                <a class="Next" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area end -->
                        </div>
                        <!-- shop-product-wrapper end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->


@stop

@section('below-scripts')
    <script>
        function addToCart(id){
            
            $.ajax({
                url: "{{url('/add-to-cart')}}",
                method: 'POST',
                data: {id: id, _token: "{{Session::token()}}"},
                success: function(response){
                  if(response.status == 'success'){
                      $('#cartCount').text(response.cartCount)
                      Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '<p>'+response.message+'</p>',
                        showConfirmButton: false,
                        timer: 1500
                    })
                  }else{
                         Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                  }
                   
                    // setTimeout(function(){
                    //     window.location.reload();
                    // }, 1500)
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