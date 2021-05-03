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
                            <li class="breadcrumb-item active">login &amp; register</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->



        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb lagin-and-register-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <!-- login-register-tab-list start -->
                            
                            <!-- login-register-tab-list end -->
                            <div class="tab-content">
                                
                            <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <p>LOGIN HERE</p>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if(Session::has('error'))
                                            <p class="alert alert-danger">{{Session::get('error')}}</p>
                                            @endif
                                            
                                           <form action="{{url('/login')}}" method="post">
                                            {{csrf_field()}}
                                                <div class="login-input-box">
                                                    <input type="text" name="username" placeholder="Email Address or Phone Number">
                                                    <input type="password" name="password" placeholder="Password">
                                                </div>
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Remember me</label>
                                                        <a href="#">Forgot Password?</a>
                                                    </div>
                                                    <div class="button-box">
                                                        <button class="login-btn btn btn-block" type="submit"><span>Login</span></button>
                                                    </div>
                                                </div>

                                                <div class="row col-md-12" style="margin-top: 20px;">
                                                   <p>Dont have an account? <a style="color:green; margin-left: 20px;" href="{{url('login')}}"><strong>Sign Up here</strong></a></p>
                                               </div>
                                            </form>
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


@section('below-scripts')

@stop

