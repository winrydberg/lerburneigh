@extends('users.includes.master')

@section('content')
          <!-- main-content-wrap start -->
        <div class="main-content-wrap contact-wrap">


            <div class="contact-form-area section-ptb">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="contact-info-wrap">
                                <div class="contact-title mb-30">
                                    <h3>Contact Us</h3>
                                </div>

                                <div class="contact-info-text">
                                    <ul>
                                        <li>
                                            <div class="contact-title">
                                                <i class="fa fa-home"></i>
                                                <h4>Address</h4>
                                            </div>
                                            <p>Aburi - Near Aburi Botanical Gardens</p>
                                        </li>
                                        <li>
                                            <div class="contact-title">
                                                <i class="fa fa-phone"></i>
                                                <h4>Phone</h4>
                                            </div>
                                            <p>Mobile: (+233) 24 820 1381<br>
                                            </p>
                                        </li>
                                        <li>
                                            <div class="contact-title">
                                                <i class="fa fa-envelope-open-o"></i>
                                                <h4>Email</h4>
                                            </div>
                                            <p>contact@lerburneigh.com<br>
                                        </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <div class="contact-info-wrap">
                                <div class="contact-title mb-30">
                                    <h3>Tell Us Your Message</h3>
                                </div>

                                <div class="contact-us-from-wrap">
                                    @if(Session::has('success'))
                                      <p class="alert alert-success">{{Session::get('success')}}</p>
                                    @elseif(Session::has('error'))
                                      <p class="alert alert-danger">{{Session::get('error')}}</p>
                                    @endif
                                <form  class="contact-us-box" action="{{url('contact-us')}}" method="post">
                                    {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <label> Your Name (required)</label>
                                                    <input required name="name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <label> Your Email (required)</label>
                                                    <input required name="email" type="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <label>Phone Number (required)</label>
                                                    <input required name="phoneno" type="number">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <label>Your Meassage (required)</label>
                                                    <textarea required name="message" ></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <button class="submit-button submit-btn" type="submit">Send Message</button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- main-content-wrap end -->
@stop