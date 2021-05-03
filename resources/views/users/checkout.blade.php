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
                            <li class="breadcrumb-item active">Check-Out</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->


        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb checkout-page">
            <div class="container">
                
                @if(Cart::subtotal() <= 0)
                   <p class="alert alert-danger">No Item In Your Cart. You cannot checkout with empty cart</p>
                   <a href="{{url('/shop')}}" class="btn btn-info" style="color:#FFF;">ADD ITEMS TO CART NOW</a>
                           
                @else
                <!-- checkout-details-wrapper start -->
                <div class="checkout-details-wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- billing-details-wrap start -->
                            <div class="billing-details-wrap">
                                <form action="#" id="billingAddress" method="POST">
                                    {{csrf_field()}}
                                    <h3 class="shoping-checkboxt-title">Billing Details</h3>
                                    <p>Please fill in the your details. Field marked <span class="required">*</span> are mandatory</p>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Name <span class="required">*</span></label>
                                                <input type="text" value="{{Auth::check()==true?Auth::user()->firstname:''}}" id="fname" name="fname" required>
                                            </p>
                                        </div>
                                        {{-- <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input type="text" value="{{Auth::check()==true?Auth::user()->lastname:''}}" id="lname" name="lname" required>
                                            </p>
                                        </div> --}}

                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Phone <span class="required">*</span></label>
                                                <input type="text" value="{{Auth::check()==true?Auth::user()->phoneno:''}}" required id="phoneno" name="phoneno">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Email address </label>
                                                <input type="email" name="email" id="email">
                                            </p>
                                        </div>

                                        <div class="col-lg-12" >
                                            <div class="single-form-row">
                                                <label>Mode of Collection <span class="required">*</span></label>
                                                <div >
                                                    <select class="form-control" onchange="modeOfCollection()" name="collectionmode" id="collection" required >
                                                         <option value="1">Delivery</option>
                                                         <option value="2">PickUp</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-12" id="regionContainer">
                                            <div class="single-form-row">
                                                <label>Region <span class="required">*</span></label>
                                                <div >
                                                    <select onchange="myFunction()" name="region" class="form-control" id="region" required >
                                                       <option value="null" selected disabled >Select Region...</option>
                                                        @foreach($regions as $r)
                                                         <option value="{{$r->id}}">{{$r->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-lg-12" id="citiesContainer">
                                            <div class="single-form-row">
                                                <label>City <span class="required">*</span></label>
                                                <div >
                                                    <select name="city" id="cities" class="form-control" onchange="onCityChange(this.options[this.selectedIndex].value)">
                                                        <option value="null" selected disabled>Select City...</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12" id="landmarkContainer">
                                            <p class="single-form-row">
                                                <label>Lankmark <span class="required">*</span></label>
                                                <input type="text"  required name="landmark" id="landmark">
                                            </p>
                                        </div>
                                       
                                        
                                        
                                        
                                        
                                    </div>
                                </form>
                            </div>
                            <!-- billing-details-wrap end -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!-- your-order-wrapper start -->
                            <div class="your-order-wrapper">
                                <h3 class="shoping-checkboxt-title">Your Order Summary</h3>
                                <!-- your-order-wrap start-->
                                <div class="your-order-wrap">
                                    <!-- your-order-table start -->
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($items as $item)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                    {{$item->name}} <strong class="product-quantity"> × {{$item->qty}}</strong>
                                                    </td>
                                                    <td class="product-total">
                                                    <span class="amount">GHC {{$item->price}}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Cart Subtotal</th>
                                                <td><span class="amount">GHC {{Cart::subtotal()}}</span></td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>Shipping</th>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <input checked type="radio">
                                                                <label>
                                                                    Delivery Fee: GHC <span class="amount" id="citycharge">0.00</span>
                                                                </label>
                                                            </li>
                                                            
                                                            <li></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                      <td><strong> GHC <span class="amount" id="carttotal"> </span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- your-order-table end -->

                                    <!-- your-order-wrap end -->
                                    <div class="payment-method">
                                        <div class="payment-accordion">
                                        
                                        </div>
                                        <div class="order-button-payment">
                                            <button type="button" style="color:#fff;" class="btn-success btn-block btn add-to-cart" onclick="completeOrder()" class="" >COMPLETE ORDER</button>
                                        </div>
                                    </div>
                                    <!-- your-order-wrapper start -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
                <!-- checkout-details-wrapper end -->
            </div>
        </div>
        <!-- main-content-wrap end -->



        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                      
                          <form id="paymentmethodForm" >
                              {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Payment Method</label>
                                <select class="form-control"  id="paymentmode" name="paymentmode">
                                    <option value="MM">Mobile Money</option>
                                    <option value="CC">Credit Card</option>
                                </select>
                            </div>
                            <span id="momopayment">
                                <div class="form-group">
                                    <label for="momonetwork">Mobile Money Provider</label>
                                    <select class="form-control" name="momonetwork">
                                        
                                        <option value="MTNMOMO">MTN Mobile Money</option>
                                        <option value="VODAFONE">Vodafone Cash</option>
                                        <option value="AIRTELTIGO">AirtelTigo Money</option>
                                       
                                    </select>
                                </div>
                               <div class="form-group">
                                    <label for="momonumber">Momo Number</label>
                                    <input type="text" class="form-control" id="momonumber" name="momonumber" placeholder="Mobile Money No">
                                </div>
                            </span>

                            <span id="cardpayment">
                                <div class="form-group">
                                    <label for="momonumber">Card Holder Name</label>
                                    <input type="text" class="form-control" id="cardname" name="cardname">
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                         <div class="form-group">
                                            <label for="momonumber">Card Number</label>
                                            <input type="text" class="form-control" id="cardno" name="cardno">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                         <div class="form-group">
                                            <label for="momonumber">CVV</label>
                                            <input type="text" class="form-control" id="cvv" name="cvv">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="expmonth">Expiry Month</label>
                                            <select class="form-control" name="expmonth" id="expmonth">
                                                <option value="null" selected disabled>Exp Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="expyear">Expiry Year</label>
                                                <select class="form-control" name="expyear" id="expyear">
                                                    <option value="null" selected disabled>Exp Year</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                
                                                </select>
                                            </div>
                                    </div>
                                </div>
                            </span>
                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                            </form>
                      </form>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="SendOrderNow()" class="btn btn-success" style="color: #FFF;">SUBMIT ORDER NOW</button>
                </div>
                </div>
            </div>
            </div>
@stop

@section('below-scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
          <script>

              $('#cardpayment').hide();

              var cities = [];
              $(document).ready(function(){
                    $("#carttotal").text("{{Cart::subtotal()}}")
                  
              });

            //  $(document).on("change","#regions",function(){
            //     alert('Change Happened');
            // });


            function modeOfCollection(){
                if($('#collection').val() == '2'){
                    $('#regionContainer').hide();
                    $('#citiesContainer').hide();
                    $('#landmarkContainer').hide();
 
                }else{
                    $('#regionContainer').show();
                    $('#citiesContainer').show();
                    $('#landmarkContainer').show();
                }
            }

            function myFunction(){
               $.ajax({
                   url: "{{url('/get-cities')}}",
                   method: "POST",
                   data: {id: $('#region').val(), _token: "{{Session::token()}}"},
                   success: function(response){
                      if(response.status == 'success'){
                          $('#cities option:not(:first)').remove();
                         console.log(response.cities)
                        //  cities = response.cities;
                         for(var i=0;i<response.cities.length; i++){
                             cities.push(response.cities[i])
                             $('#cities').append($('<option>', {
                                    value: response.cities[i].id,
                                    text: response.cities[i].name
                                }));
                         }
                      }
                   },
                   error: function(){

                   }
               })
            }


            function onCityChange(id){
                $.ajax({
                    url: "{{url('/get-city-charge')}}",
                    method: "POST",
                    data: {id: id, _token: "{{Session::token()}}"},
                    success: function(response){
                        if(response.status == 'success'){
                            $('#citycharge').text(response.charge);
                            $("#carttotal").text(response.total);
                        }
                    },
                    error: function(error){
                        console.log("Oops unable to get city's charges")
                    }
                })
            }

             $('#paymentmode').on('change', function(){
                    if($('#paymentmode').val() == 'CC'){
                        $('#cardpayment').show();
                        $('#momopayment').hide();
                    }else{
                        $('#momopayment').show();
                        $('#cardpayment').hide();
                    }
                })


            function completeOrder(){

                if($('#fname').val() == ""){
                              Swal.fire({
                                        icon: 'error',
                                        title: '<p>Name field is required</p>',
                                        
                                    })
                            return;
                }
                // else if($('#lname').val() == ""){
                //             alert("Last Name field is required");
                //             return;
                // }
                else if($('#phoneno').val() == ""){
                           
                            Swal.fire({
                                        icon: 'error',
                                        title: '<p>Phone Number field is required</p>',
                                    })
                            return;
                }else if($('#collection').val() =='1'){
                        if($('#region').val() == null){
                                    // alert("");
                                    Swal.fire({
                                        icon: 'error',
                                        title: '<p>Please select a region</p>',
                                    })
                                   
                                    return;
                        }
                                else if($('#cities').val() == null){
                                    
                                    Swal.fire({
                                        icon: 'error',
                                        title: '<p>Please select a city</p>',
                                    })
                                    return;
                                }
                                else if($('#landmark').val() == ""){
                                    Swal.fire({
                                        icon: 'error',
                                        title: '<p>Landmark field is required</p>',
                                    })
                                    // alert("");
                                    return;
                                }
                        }

                

                $('#myModal').modal('show');

              
               
                // Swal.fire({
                //     title: 'Order Confirmation',
                //     text: "Are you sure you want to place this order?",
                //     icon: 'warning',
                //     showCancelButton: true,
                //     confirmButtonColor: '#3085d6',
                //     cancelButtonColor: '#d33',
                //     confirmButtonText: 'Yes, Place Order'
                //     }).then((result) => {
                //     if (result.isConfirmed) {

                //         $.ajax({
                //             url: "{{url('/place-order')}}",
                //             method: 'POST',
                //             data:  $('#billingAddress').serialize(),
                //             success: function(response){
                //                 console.log(response);
                //                 if(response.status == 'success'){
                //                     Swal.fire({
                //                         icon: 'success',
                //                         title: response.message,
                //                         showConfirmButton: false,
                //                         timer: 1500
                //                     })
                //                     setTimeout(function(){
                //                         location.reload();
                //                     }, 1500)
                //                 }else{
                //                      Swal.fire({
                //                         icon: 'error',
                //                         title: response.message,
                //                         showConfirmButton: false,
                //                         timer: 1500
                //                     })
                //                 }
                //             },
                //             error: function(error){
                //                 // alert(error.message);
                //                 Swal.fire({
                //                     icon: 'error',
                //                     title: error.message,
                //                     showConfirmButton: false,
                //                     timer: 1500
                //                 })
                //             }
                //         })
                       
                //     }
                // })
               
            }


            function SendOrderNow(){

                if($('#paymentmode').val() =='MM'){
                    if($('#momonumber').val() =="" || $('#momonumber').val()==undefined){
                        alert("Mobile Money Number is required");
                        return;
                    }
                }else{
                    if($('#cardname').val() =="" || $('#cardno').val() =="" || $('#cvv').val() =="" || $('#expmonth').val() =="" || $('#expyear').val() ==""){
                        alert("Please fill all the required filled")
                        return 
                    }
                }
              
                // var formdata = $('#paymentmethodForm').serialize();
                // var billingAddress = $('#billingAddress').serialize();
                var formdata = $('#paymentmethodForm,#billingAddress').serialize();

                $.ajax({
                   url: "{{url('/place-order')}}",
                   method: "POST",
                   dataType: "json",
                   data: formdata,
                   success: function(response){
                       console.log(response);
                       $('#myModal').modal('hide');
                      if(response.status == 'success'){
                            Swal.fire({
                                icon: 'success',
                                title: '<p>'+response.message+'</p>',
                               
                            }).then(okay => {
                                if(okay){
                                    window.location.href="{{url('/')}}"; 
                                }
                            })
                            // setTimeout(function(){
                            //     window.location.reload(); 
                            // }, 1200)
                      }else{
                            Swal.fire({
                                icon: 'error',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                      }
                   },
                   error: function(error){
                       console.log(error.message)
                   }
               })
            }
          </script>
@stop