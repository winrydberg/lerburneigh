<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lerburneigh | Home</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/plaza-font.css')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animation.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/fancy-box.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jqueryui.min.css')}}">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->

    @yield('page-css')

    <style>
        .header-sticky.is-sticky {

            z-index: 99;

        }
    </style>

</head>

<body>

    <div class="main-wrapper">

        <header class="header">
            <!-- Header Top Start -->
            <div class="header-top-area d-none d-lg-block text-color-white bg-gren border-bm-1">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center">
                                    <li class="language">Welcome to Lerburneigh Farms - Get Your Fresh Organic Vegetables At Affordable Price 
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="top-info-wrap text-right">
                                <ul class="my-account-container">
                                    @if(!Auth::check())
                                    <li><a href="{{url('login')}}" >| Login |</a></li>
                                    <li><a href="{{url('register')}}">| Sign Up |</a></li>
                                    @else
                                    <li><a href="{{url('my-account')}}">| {{Auth::user()->firstname.' - ('.Auth::user()->phoneno.')'}} |</a></li>
                                    @endif
                                    <li><a href="{{url('my-cart')}}">Cart</a></li>
                                    <li><a href="{{url('wishlist')}}">Wishlist</a></li>
                                    <li><a href="{{url('/check-out')}}">Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Header Top End -->

           
            <!-- haeader Mid Start -->
            <div class="haeader-mid-area  border-bm-gray d-none d-lg-block ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-5">
                            <div class="logo-area" style="margin-top: 10px">
                            <a href="{{url('/')}}"><img src="{{asset('assets/images/logo/main.png')}}" style="width: 50%" class="img-responsive" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="search-box-wrapper">
                                <div class="search-box-inner-wrap">
                                   
                                <form class="search-box-inner border-2" action="{{url('search')}}" method="GET">
                                    {{csrf_field()}}
                                        <div class="search-select-box">
                                             <select class="nice-select">
                                                    <option value="All">All</option>
                                            </select>
                                        </div>
                                        <div class="search-field-wrap">
                                            <input type="text" name="product" class="search-field" placeholder="Search product...">

                                            <div class="search-btn">
                                                <button><i class="icon-search"></i></button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="customer-wrap">
                                <div class="single-costomer-box">
                                    <div class="single-costomer">
                                        <p><i class="icon-check-circle"></i><span>Safe Delivery</span></p>
                                    </div>
                                </div>

                                <div class="single-costomer-box">
                                    <div class="single-costomer">
                                        <p><i class="icon-lock"></i><span>Safe Payment</span></p>

                                    </div>
                                </div>

                                <div class="single-costomer-box">
                                    <div class="single-costomer">
                                        <p><i class="icon-bell"></i><span>24/7 Support</span></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- haeader Mid End -->

            <!-- haeader bottom Start -->
            <div class="haeader-bottom-area bg-gren header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-9 d-none d-lg-block">

                            <div class="main-menu-area white_text">
                                <!--  Start Mainmenu Nav-->
                                <nav class="main-navigation">
                                    <ul>
                                    <li class="active"><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('/shop')}}">Shop</a></li>
                                    <li><a href="{{url('/about-us')}}">About Us</a></li>
                                    <li><a href="{{url('/track-order')}}">Track Order</a></li>
                                    <li><a href="{{url('/gallery')}}">Gallery</a></li>
                                    <li><a href="{{url('/contact-us')}}">Contact</a></li>

                                    </ul>
                                </nav>

                            </div>
                        </div>

                        <div class="col-5 col-md-6 d-block d-lg-none">
                        <div class="logo"><a href="{{url('/')}}">
                                <img src="{{asset('assets/images/logo/main.png')}}" alt="">
                            </a></div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-7">
                            <div class="right-blok-box text-white d-flex">

                                <div class="shopping-cart-wrap">
                                    @if((int)$carttotal > 0)
                                    <a href="#">
                                        <i class="icon-shopping-bag2"></i>
                                        <span class="cart-total">{{$carttotal}}</span> 
                                    <span class="cart-total-amunt">GHC {{$cartamount}}</span>
                                    </a>
                                    @else
                                <a href="{{url('/my-cart')}}">
                                        <i class="icon-shopping-bag2"></i>
                                        <span id="cartCount" class="cart-total">{{Cart::instance('shopping')->count()}}</span> 
                                <span class="cart-total-amunt" id="cartAmount" >GHC {{Cart::subtotal()}}</span>
                                    </a>
                                    @endif
                                   
                                </div>

                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- haeader bottom End -->


            <!-- off-canvas menu start -->
            <aside class="off-canvas-wrapper">
                <div class="off-canvas-overlay"></div>
                <div class="off-canvas-inner-content">
                    <div class="btn-close-off-canvas">
                        <i class="icon-x"></i>
                    </div>

                    <div class="off-canvas-inner">

                        <div class="search-box-offcanvas">
                            <form action="{{url('search')}}">
                                <input type="text" name="product" placeholder="Search product...">
                                <button class="search-btn"><i class="icon-search"></i></button>
                            </form>
                        </div>

                        <!-- mobile menu start -->
                        <div class="mobile-navigation">

                            <!-- mobile menu navigation start -->
                            <nav>
                                <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="{{url('/')}}">Home</a>
                                    </li>
                                   
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->


                        <div class="header-top-settings offcanvas-curreny-lang-support">
                            <h5>My Account</h5>
                            
                        </div>

                        <!-- offcanvas widget area start -->
                        <div class="offcanvas-widget-area">
                            <div class="top-info-wrap text-left text-black">
                                <h5>My Account</h5>
                                <ul class="offcanvas-account-container">
                                    <li><a href="my-account.html">My account</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                </ul>
                            </div>

                        </div>
                        <!-- offcanvas widget area end -->
                    </div>
                </div>
            </aside>
            <!-- off-canvas menu end -->


        </header>