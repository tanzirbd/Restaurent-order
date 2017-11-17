@extends('front.master')

@section('body_content')
    <!-- Page Header -->
    <section class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-uppercase">Cart</h2>
                    <p>Checkout or add some items to your cart</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Table -->
    <section class="shop-content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <table class="cart-table table table-bordered">
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sum=0)
                        @foreach($cartProducts as $cartProduct)
                        <tr>
                            <td><a href="{{ url('/delete-cart-product/'.$cartProduct->rowId) }}" class="remove"><i class="fa fa-times"></i></a></td>
                            <td><a href="{{ url('/product-details/'.$cartProduct->id) }}"><img src="{{ asset($cartProduct->options->image) }}" alt="" height="40" width="44"></a></td>
                            <td>{{ $cartProduct->name }}</td>
                            <td><span class="amount">TK. {{ $cartProduct->price }}</span></td>
                            <td>
                                <div class="quantity">
                                    <form action="{{ url('/update-cart-product') }}" method="post">

                                        {{ csrf_field() }}
                                        <input type="number" value="{{ $cartProduct->qty }}" name="qty" min="1">
                                        <input type="hidden" value="{{ $cartProduct->rowId }}" name="rowId">
                                        <button type="submit" class="btn-primary"><span class="glyphicon glyphicon-refresh"></span></button>
                                    </form>
                                </div>
                            </td>
                            <td><span class="amount">TK. {{ $subTotal = $cartProduct->price*$cartProduct->qty }}</span></td>
                            {{ Session::put('subTotal') }}
                        </tr>
                            @php( $sum=$sum+$subTotal)
                        @endforeach

                        <tr>
                            <td colspan="6" class="actions">
                                <div class="col-md-6">
                                    <div class="coupon form-group">
                                        <label>Coupon:</label>
                                        <br>
                                        <input placeholder="Coupon code" class="form-control" type="text">
                                        <button type="submit">Apply</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cart-btn">
                                        <a href="{{ url('/order-now') }}" class="btn btn-default">order Now</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="cart_totals">
                        <div class="col-md-6 push-md-6 no-padding">
                            <h4 class="text-left">Cart Totals</h4>
                            <br>
                            <table class="table table-bordered col-md-6">
                                <tbody>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">TK. {{ $sum }}</span></td>
                                </tr>
                                <tr>
                                    <th>Tax</th>
                                    <td><span class="amount">TK. {{ $tax = 0 }}</span></td>
                                </tr>
                                <tr>
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">TK. {{ $orderTotal = $sum-$tax }}</span></strong> </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection