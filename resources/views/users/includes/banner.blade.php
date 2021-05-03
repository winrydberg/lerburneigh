
        <!-- Hero Section Start -->
        <div class="hero-slider-area">

            <div class="container">
                <div class="row">

                    <div class="col-lg-3">
                        <div class="categories-menu-wrap mt-30">
                            <div class="categories_menu">
                                <div class="categories_title">
                                    <h5 class="categori_toggle">Categories</h5>
                                </div>
                                <div class="categories_menu_toggle">
                                    <ul>
                                        @foreach($categories as $c)
                                    <li class="menu_item_children categorie_list {{$loop->index>5?'hide-child':''}}">
                                            <a href="{{url('/category/'.$c->slug)}}" style="text-transform: capitalize!important;">{{$c->name}}<i class="fa fa-angle-right"></i></a>
                                            @if(count($c->children) >0)
                                            <ul class="categories_mega_menu">
                                                @foreach ($c->children as $item)
                                                 <li><a href="{{url('/category/'.$item->slug)}}">{{$item->name}}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                       
                                          @endforeach   
                                
                                        <li class="categories-more-less ">
                                            <a class="more-default"><span class="c-more"></span>+ More Categories</a>
                                            <a class="less-show"><span class="c-more"></span>- Less Categories</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="hero-slider-wrapper mt-30">
                            <!-- Hero Slider Start -->
                            <div class="hero-slider-area hero-slider-one">
                                <div class="swiper-container gallery-top">
                                    <div class="swiper-wrapper">

                                        @foreach($banners as $b)
                                        <div class="swiper-slide" style="background-image:url('{{asset('storage/images/banners/'.$b->image_url)}}'); border-radius: 10px; object-fit: contain;">
                                            <div class="hero-content-one">
                                                <div class="slider-content-text">
                                                <h2>{{$b->title}}</h2>
                                                        <p>{{$b->sub_title}} </p>
                                                        <div class="slider-btn">
                                                            <a href="#">shop Now</a>
                                                        </div>
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
                                        {{-- <div class="swiper-slide" style="background-image:url(assets/images/slider/slide-bg-2.jpg); object-fit: contain;">
                                            <div class="hero-content-one">
                                                <div class="slider-content-text">
                                                    <h2>ADAM Apple <br>Big Sale 20% Off </h2>
                                                        <p>Exclusive Offer -20% Off This Week </p>
                                                        <div class="slider-btn">
                                                            <a href="#">shopping Now</a>
                                                        </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="swiper-slide" style="background-image:url(assets/images/slider/slide-bg-3.jpg)">
                                            <div class="hero-content-one">
                                                <div class="slider-content-text">
                                                    <h2>The Smart <br> Way To Eat Nuts</h2>
                                                        <p>Exclusive Offer -20% Off This Week </p>
                                                        <div class="slider-btn">
                                                            <a href="#">shopping Now</a>
                                                        </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="swiper-slide" style="background-image:url(assets/images/slider/slide-bg-4.jpg)">
                                            <div class="hero-content-one">
                                                <div class="slider-content-text">
                                                    <h2>Fresh Fruits <br>Super Discount</h2>
                                                        <p>Exclusive Offer -20% Off This Week </p>
                                                        <div class="slider-btn">
                                                            <a href="#">shopping Now</a>
                                                        </div>
                                                </div>
                                            </div>

                                        </div> --}}

                                    </div>
                                    <!-- Add Arrows -->
                                    <!--<div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>-->

                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="swiper-container gallery-thumbs">
                                    <div class="swiper-wrapper">
                                         @foreach($banners as $b)
                                        <div class="swiper-slide">
                                        <div class="slider-thum-text"><span>{{$b->title}}</span></div>
                                        </div>
                                        @endforeach
                                        {{-- <div class="swiper-slide">
                                            <div class="slider-thum-text"><span>ADAM Apple Big Sale 20% Off</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider-thum-text"><span>The Smart  Way To Eat Nuts</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider-thum-text"><span>Fresh Fruits Super Discount</span></div>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                            <!-- Hero Slider End -->
                        </div>
                    </div>
                </div>
            </div>


        </div>
        </div>
        <!-- Hero Section End -->