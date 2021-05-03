@extends('users.includes.master')


@section('content')

        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">About Us</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->


        <!-- main-content-wrap start -->
        <div class="main-content-wrap">
            <div class="about-us-wlc section-pt section-pb">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="about-us-wrapper">
                                <div class="title text-center mb-30">
                                    <h2>About LERBURNEIGH FARMS</h2>
                                </div>
                                <div class="about-shop-image">
                                <img src="{{asset('assets/images/slider/bg.jpg')}}"  class="img-responsive" style="width: 100%; height: 400px; object-fit:cover" alt="">
                                </div>
                                <div class="about-welcome-text section-pt text-center">
                                    <h2>We are a modern farm focused on delivering fresh organic fruits and vegetables at affordable prices.</h2>
                                    <p class="welcome-dec">
                                        Order your fresh organic vegetables from <strong>LERBURNEIGH FARMS</strong> and have it delivered at your door step. 
                                        No need to go to the market in search of groceies
                                    </p>
                                    {{-- <div class="signature">
                                        <img src="assets/images/other/about-us-signature.png" alt="">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="service-area section-pt section-pb-30 service-bg" style="margin-bottom: 50px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <!-- single-service Start -->
                            <div class="single-service mb-20 text-center">
                                <div class="service-image">
                                    {{-- <img src="assets/images/icon/about-us-policy1.png" alt=""> --}}
                                </div>
                                <div class="service-content mt-15">
                                    <h5>Fresh Organic Fruits</h5>
                                    {{-- <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit amet enim</p> --}}
                                </div>
                            </div>
                            <!-- single-service End -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <!-- single-service Start -->
                            <div class="single-service mb-20 text-center">
                                <div class="service-image">
                                    <img src="assets/images/icon/about-us-policy2.png" alt="">
                                </div>
                                <div class="service-content mt-15">
                                    <h5>100% Fresh Organic Vegetables</h5>
                                    {{-- <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit amet enim</p> --}}
                                </div>
                            </div>
                            <!-- single-service End -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <!-- single-service Start -->
                            <div class="single-service mb-20 text-center">
                                <div class="service-image">
                                    <img src="assets/images/icon/about-us-policy3.png" alt="">
                                </div>
                                <div class="service-content mt-15">
                                    <h5>Online Support 24/7</h5>
                                    <p>We provide online support </p>
                                </div>
                            </div>
                            <!-- single-service End -->
                        </div>
                    </div>
                </div>
            </div>


            <div class="faq-client-say-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="section-title mb-30">
                                <h3>Why You Choose Us ?</h3>
                            </div>
                            <div class="faq-style-wrap section-pb" id="faq-five">

                                <!-- Panel-default -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <a id="octagon" class="collapsed" role="button" data-toggle="collapse" data-target="#faq-collapse1" aria-expanded="true" aria-controls="faq-collapse1"> <span class="button-faq"></span>Fresh Vegetables </a>
                                        </h5>
                                    </div>
                                    <div id="faq-collapse1" class="collapse show" aria-expanded="true" role="tabpanel" data-parent="#faq-five">
                                        <div class="panel-body">
                                            <p>We serve our customers with straight from farm fresh produce.</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--// Panel-default -->

               
                                <!--// Panel-default -->

                                <!-- Panel-default -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-target="#faq-collapse3" aria-expanded="false" aria-controls="faq-collapse3"> <span class="button-faq"></span>100% Organic Foods</a>
                                        </h5>
                                    </div>
                                    <div id="faq-collapse3" class="collapse" role="tabpanel" data-parent="#faq-five">
                                        <div class="panel-body">
                                            <p>Be assured of fresh organic products</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--// Panel-default -->

                                <!-- Panel-default -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-target="#faq-collapse4" aria-expanded="false" aria-controls="faq-collapse4"> <span class="button-faq"></span>Flexible Payment Options</a>
                                        </h5>
                                    </div>
                                    <div id="faq-collapse4" class="collapse" role="tabpanel" data-parent="#faq-five">
                                        <div class="panel-body">
                                            <p>Pay via MTN Mobile Money, Vodafone Cash and AirtelTigo Money and get your fresh organic products delivered to you place of choice. </p>
                                        </div>
                                    </div>
                                </div>
                                <!--// Panel-default -->
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="testimonials-area section-pb">
                                <div class="section-title mb-30">
                                    <h3>What Clients Say</h3>
                                </div>
                                <div class="row testimonial-two">
                                    
                                    <div class="col-lg-12">
                                        <div class="testimonial-wrap-two text-center">
                                            <div class="quote-container">
                                                <div class="quote-image">
                                                    <img src="assets/images/testimonial/testimonial-02.jpg" alt="">
                                                </div>
                                                <div class="author">
                                                    <h6>Edwin Senunyeme</h6>
                                                    <p>Happy Client</p>
                                                </div>
                                                <div class="testimonials-text">
                                                    <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- main-content-wrap end -->
@stop