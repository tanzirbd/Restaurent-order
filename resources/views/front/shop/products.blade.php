@extends('front.master')

@section('body_content')
    <!-- Page Header -->
    <section class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-uppercase">Shop Listing</h2>
                    <p>Tomato is a Delitious Restaurant</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Content -->
    <div class="shop-content">
        <div class="container">
            <div class="row">
                <aside class="col-md-3">
                    <div class="side-widget">
                        <h5>Our Food</h5>
                        <ul class="shop-cat">
                            <li><a href="">Cakes <i class="fa fa-caret-right"></i></a></li>
                            <li><a href="">Almonds <i class="fa fa-caret-right"></i></a></li>
                            <li><a href="">Furniture <i class="fa fa-caret-right"></i></a></li>
                            <li><a href="">Amaranth <i class="fa fa-caret-right"></i></a></li>
                            <li><a href="">Broad Beans <i class="fa fa-caret-right"></i></a></li>
                            <li><a href="">Coriander <i class="fa fa-caret-right"></i></a></li>
                        </ul>
                    </div>
                    <div class="side-widget">
                        <h5>New Arrivals</h5>
                        <ul class="recent-products">

                            @foreach($latestProducts as $latestProduct)
                            <li>
                                <a href="{{ url('/product-details/'.$latestProduct->id) }}"><img src="{{ asset($latestProduct->product_image) }}" alt="{{ $latestProduct->product_name }}"/></a>
                                <div class="rpp-info">
                                    <a href="{{ url('/product-details/'.$latestProduct->id) }}">{{ $latestProduct->product_name }}</a>
                                    <div class="rc-ratings">
                                        <span class="fa fa-star active"></span>
                                        <span class="fa fa-star active"></span>
                                        <span class="fa fa-star active"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <span>TK. {{ $latestProduct->product_new_price }}</span>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </aside>

                <div class="col-md-9">
                    <div class="shop-grid">
                        <select>
                            <option>Default Sorting</option>
                            <option>Cakes</option>
                            <option>Breads</option>
                            <option>Fries</option>
                            <option>Pizza</option>
                        </select>
                        <div class="sg-list">
                            <a href=""><i class="fa fa-th-large"></i></a>
                            <a href=""><i class="fa fa-reorder"></i></a>
                        </div>
                    </div>
                    <div class="shop-products">
                        <div class="row">

                            @foreach($products as $product)
                            <div class="col-md-4 col-sm-6">
                                <div class="product-info">
                                    <div class="product-img">
                                        <a href="{{ url('/product-details/'.$product->id) }}"><img src="{{ asset($product->product_image) }}" width="260" height="285" alt=""/></a>
                                    </div>
                                    <h4><a href="{{ url('/product-details/'.$product->id) }}">{{ $product->product_name }}</a></h4>
                                    <div class="rc-ratings">
                                        <span class="fa fa-star active"></span>
                                        <span class="fa fa-star active"></span>
                                        <span class="fa fa-star active"></span>
                                        <span class="fa fa-star active"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <div class="product-price">TK. {{ $product->product_new_price }}</div>
                                    <div class="shop-meta">
                                        <form action="{{ url('/add-to-cart') }}" method="post">
                                            {{ csrf_field() }}

                                            <input type="hidden" name="qty" value="1" min="1">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit"class="pull-center btn btn-secondary"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection