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
                            <li class="breadcrumb-item active">Order tracker</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <div class="main-content-wrap shop-page section-ptb">
            <div class="container">
                 <div class="col-md-4">
                     <div id="responsemessage" >

                     </div>
                     <form action="#" method="POST" id="trackerForm">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Order Number</label>
                            <input required type="text" class="form-control" id="orderno" placeholder="Order No.">
                            <small id="emailHelp" class="form-text text-muted">Enter Order Number To Check Status</small>
                        </div>
                        
                        <button type="submit" class="btn btn-default">TRACK ORDER</button>
                        </form>
                </div>  
                
                <hr />
                <div class="container">
                    <h4>Order Found</h4>

                    <div class="row">
                        <div class="col-md-8">
                            <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#Field</th>
                            <th scope="col">First</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">Order No: </th>
                            <td id="ordernores"></td>
                            </tr>
                            <tr>
                            <th scope="row">Product Count</th>
                            <td>Jacob</td>
                            </tr>
                            <tr>
                            <th scope="row">Products</th>
                            <td>Products</td>
                            </tr>
                            <tr>
                            <th scope="row">Order Amount</th>
                            <td>Jacob</td>
                            </tr>

                            <tr>
                            <th scope="row">Delivery Charge</th>
                            <td>Jacob</td>
                            </tr>
                            <tr>
                            <th scope="row">Order Status</th>
                            <td>Pending Approval</td>
                            </tr>
                        </tbody>
                    </table>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop

@section('below-scripts')
   <script>
       $('#trackerForm').submit(function(event){
           event.preventDefault();
           $.ajax({
               url: "{{url('/track-order')}}",
               method: "POST",
               data: {orderno: $('#orderno').val(), _token:"{{Session::token()}}"},
               success: function(response){
                   console.log(response)
                    if(response.status =='success'){
                         $('#ordernores').text(response.order.orderno);
                    }else{
                        $('#responsemessage').text(response.message).addClass('alert alert-danger').show();
                    }
               },
               error: function(error){
                     alert("Oops something went wrong. Please try again.");
               }
           })
       })
   </script>
@stop