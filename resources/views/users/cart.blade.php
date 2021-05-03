@extends('users.includes.master')

@inject('Product', 'App\Models\Product')

@section('content')
    
        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">My cart</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->


        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb cart-page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if(count($items) <=0)
                            <p class="alert alert-danger">No Item Currently In Your Cart. Start Shopping Now.</p>

    
                       <a href="{{url('/shop')}}" class="btn btn-info" style="color:#FFF;">GO SHOPPING NOW</a>
                           
                        @else

                        <form action="#" class="cart-table">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="plantmore-product-thumbnail">Image</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="plantmore-product-price">Unit Price</th>
                                            <th class="plantmore-product-quantity">Quantity</th>
                                            <th class="plantmore-product-subtotal">Total</th>
                                            <th class="plantmore-product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                        
                                        <tr>
                                            <td class="plantmore-product-thumbnail">
                                                <a href="#">
                                                <img style="width: 100px; height: 100px; object-fit: cover;" class="img-responsive" src="{{asset('storage/images/products/'.$item->model->image)}}" alt="">
                                                </a>
                                            </td>
                                        <td class="plantmore-product-name"><a href="#">{{$item->model->name}}</a></td>
                                        <td class="plantmore-product-price"><span class="amount">GHC {{$item->model->price}}</span></td>
                                            <td class="plantmore-product-quantity">
                                            <input value="{{$item->qty}}" id="cItem{{$item->model->id}}" min="1" type="number">
                                            <button type="button" onclick="updateCart('{{$item->rowId}}','{{$item->model->id}}')" class="btn-primary"><i class="fa fa-refresh"></i></button>
                                            </td>
                                        <td class="product-subtotal"><span class="amount">{{(float)$item->qty * (float)$item->model->price}}</span></td>
                                            <td class=" plantmore-product-remove">
                                            <button href="#" class="btn-sm btn-danger" onclick="removeFromCart('{{$item->rowId}}')"><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="coupon-all">

                                        <div class="coupon2">
                                            {{-- <input class="submit" name="update_cart" value="Update cart" type="submit"> --}}
                                        <a href="{{url('/shop')}}" class=" continue-btn">Continue Shopping</a>
                                        </div>

                                        <div class="coupon">
                                            <h3>Coupon</h3>
                                            <p>Enter your coupon code if you have one.</p>
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul>
                                        <li>Subtotal <span>GHC {{$total}}</span></li>
                                        <li>Total <span>GHC {{$total}}</span></li>
                                        </ul>
                                    <a href="{{url('/check-out')}}" class="proceed-checkout-btn">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->
@stop

@section('below-scripts')
       <script>
           function removeFromCart(rowId){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Confirm to remove this item from cart!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Remove'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: "{{url('/remove-cart-item')}}",
                            method: 'POST',
                            data: {rowId: rowId, _token: "{{Session::token()}}"},
                            success: function(response){
                                if(response.status == 'success'){
                                    Swal.fire({
                                        icon: 'success',
                                        title: response.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                    setTimeout(function(){
                                        location.reload();
                                    }, 1500)
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
                                // alert(error.message);
                                Swal.fire({
                                    icon: 'error',
                                    title: error.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        })
                       
                    }
                })
           }
       </script>

    <script>
        function updateCart(rowId, id){
            
            $.ajax({
                url: "{{url('/update-cart')}}",
                method: 'POST',
                data: {rowId: rowId, qty: $("#cItem"+id).val(), _token: "{{Session::token()}}"},
                success: function(response){
                  if(response.status == 'success'){
                       Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '<p>'+response.message+'</p>',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    setTimeout(function(){
                        window.location.reload();
                    }, 1500)
                  }else{
                      Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: '<p>'+response.message+'</p>',
                        showConfirmButton: false,
                        timer: 1500
                    })
                  }
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