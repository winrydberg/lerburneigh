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
                                
                                <div id="lg2" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                             <p>CREATE A NEW ACCOUNT HERE</p>
                                             @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if(Session::has('success'))
                                               <div class="alert alert-success">
                                                   {{Session::get('success')}}
                                               </div>
                                            @endif
                                            <form action="{{url('/register')}}" method="post">
                                               {{csrf_field()}}
                                                <div class="login-input-box">
                                                    <input type="text" required name="firstname" placeholder="Name">
                                                    {{-- <input type="text" required name="lastname" placeholder="Last Name"> --}}
                                                    <input type="text" required name="phoneno" placeholder="Phone Number">
                                                    <input name="email" placeholder="Email (Optional)" type="email">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                          <input type="password" required name="password" placeholder="Password">
                                                        </div>
                                                        <div class="col-md-6">
                                                          <input type="password" required name="confirmpassword" placeholder="Confirm Password">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="button-box">
                                                    <button class="register-btn btn btn-block" type="submit"><span>Register</span></button>
                                                </div>
                                               <div class="row col-md-12" style="margin-top: 20px;">
                                                   <p>Already have an account? <a style="color:green; margin-left: 20px;" href="{{url('login')}}"><strong>Log In</strong></a></p>
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
    <script>
        setInterval(function() {
            $('.alert').slideUp();
        }, 2000);
    </script>
@stop

