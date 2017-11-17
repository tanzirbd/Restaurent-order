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
                            <li><a href="./shop_single_full.html">Cakes <i class="fa fa-caret-right"></i></a></li>
                            <li><a href="./shop_single_full.html">Almonds <i class="fa fa-caret-right"></i></a></li>
                            <li><a href="./shop_single_full.html">Furniture <i class="fa fa-caret-right"></i></a></li>
                            <li><a href="./shop_single_full.html">Amaranth <i class="fa fa-caret-right"></i></a></li>
                            <li><a href="./shop_single_full.html">Broad Beans <i class="fa fa-caret-right"></i></a></li>
                            <li><a href="./shop_single_full.html">Coriander <i class="fa fa-caret-right"></i></a></li>
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
                    <div class="col-md-6">
                        <div class="single-shop-carousel">

                            @foreach($subImages as $subImage)
                                <div><img class="img-responsive" src="{{ asset($subImage->product_sub_image) }}" alt=""></div>
                            @endforeach

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-6 shop-single-info">
                        <div class="shop-single-title">
                            <h3 class="text-left">{{ $product->product_name }}</h3>
                        </div>
                        <div class="shop-single-price">
                            <div class="ssp pull-left">TK. {{ $product->product_new_price }} <span>TK. {{ $product->product_price }}</span></div>
                            <div class="rc-ratings pull-right">
                                <span class="fa fa-star active"></span>
                                <span class="fa fa-star active"></span>
                                <span class="fa fa-star active"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <p>{{ $product->product_description }}</p>
                        <div class="quantity">
                            <form action="{{ url('/add-to-cart') }}" method="post">
                                {{ csrf_field() }}

                                <input type="number" name="qty" value="1" min="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit"class="btn btn-default pull-right">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="tab-style3">
                        <!-- Nav Tabs -->
                        <div class="align-center mb-40 mb-xs-30">
                            <ul class="nav nav-tabs tpl-minimal-tabs animate">
                                <li class="active">
                                    <a aria-expanded="true" href="#mini-one" data-toggle="tab">Food Description</a>
                                </li>
                                <li class="">
                                    <a aria-expanded="false" href="#mini-two" data-toggle="tab">Review (20)</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Nav Tabs -->
                        <!-- Tab panes -->
                        <div style="height: auto;" class="tab-content tpl-minimal-tabs-cont align-center section-text">
                            <div style="" class="tab-pane fade active in" id="mini-one">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                    the release of Letraset sheets containing.</p>
                                <p class="list">
                                    <span><i class="fa fa-angle-right"></i> Curabitur a dui ut sem pulvinar accumsan a nec quam.</span>
                                    <span><i class="fa fa-angle-right"></i> Pellentesque euismod turpis eu ante euismod, nec molestie mi ullamcorper.</span>
                                    <span><i class="fa fa-angle-right"></i> Mauris tristique ante a purus dignissim, eu efficitur libero congue.</span>
                                </p>
                            </div>
                            <div style="" class="tab-pane fade" id="mini-two">
                                <div class="col-md-12">
                                    <h4 class="text-left">3 Reviews for Food</h4>
                                    <br>
                                    <ul class="comment-list">
                                        <li>
                                            <a class="pull-left" href="./index.html"><img class="comment-avatar"
                                                                                          src="{{ asset('front_resturent') }}/img/xtra/1.jpg"
                                                                                          alt="" height="50" width="50"></a>
                                            <div class="comment-meta">
                                                <a href="./index.html">John Doe</a>
                                                <span>
                                                <em>Feb 17, 2015, at 11:34</em>
                                                </span>
                                            </div>
                                            <div class="rating2">
                                                <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor sit
                                                amet urna nec tempor. Nullam pellentesque in orci in luctus. Sed
                                                convallis tempor tellus a faucibus. Suspendisse et quam eu velit commodo
                                                tempus.
                                            </p>
                                        </li>
                                        <li>
                                            <a class="pull-left" href="./index.html"><img class="comment-avatar"
                                                                                          src="{{ asset('front_resturent') }}/img/xtra/2.jpg"
                                                                                          alt="" height="50" width="50"></a>
                                            <div class="comment-meta">
                                                <a href="./index.html">Rebecca</a>
                                                <span>
                                                <em>March 08, 2015, at 03:34</em>
                                                </span>
                                            </div>
                                            <div class="rating2">
                                                <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9734;</span>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor sit
                                                amet urna nec tempor. Nullam pellentesque in orci in luctus. Sed
                                                convallis tempor tellus a faucibus. Suspendisse et quam eu velit commodo
                                                tempus.
                                            </p>
                                        </li>
                                        <li>
                                            <a class="pull-left" href="./index.html"><img class="comment-avatar"
                                                                                          src="{{ asset('front_resturent') }}/img/xtra/1.jpg"
                                                                                          alt="" height="50" width="50"></a>
                                            <div class="comment-meta">
                                                <a href="./index.html">Antony Doe</a>
                                                <span>
                                                <em>June 11, 2015, at 07:34</em>
                                                </span>
                                            </div>
                                            <div class="rating2">
                                                <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9734;</span>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor sit
                                                amet urna nec tempor. Nullam pellentesque in orci in luctus. Sed
                                                convallis tempor tellus a faucibus. Suspendisse et quam eu velit commodo
                                                tempus.
                                            </p>
                                        </li>
                                    </ul>
                                    <br>
                                    <h4 class="text-left">Add a review</h4>
                                    <br>
                                    <form id="form" class="review-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input name="name" class="input-md form-control" placeholder="Name *"
                                                       maxlength="100" required="" type="text">
                                            </div>
                                            <div class="col-md-6">
                                                <input name="email" class="input-md form-control" placeholder="Email *"
                                                       maxlength="100" required="" type="email">
                                            </div>
                                        </div>
                                        <span>Your Ratings</span>
                                        <div class="clearfix"></div>
                                        <div class="rating3">
                                            <span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
                                        </div>
                                        <div class="clearfix space20"></div>
                                        <textarea name="text" id="text" class="input-md form-control" rows="6"
                                                  placeholder="Add review.." maxlength="400"></textarea>
                                        <br>
                                        <button type="submit" class="btn btn-default">
                                            Submit Review
                                        </button>
                                    </form>
                                </div>
                                <div class="clearfix space30"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="shop-products">
                        <h6>More Food Items</h6>
                        <div class="row">
                            @foreach($latestProducts as $latestProduct)
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-info">
                                        <div class="product-img">
                                            <a href="{{ url('/product-details/'.$latestProduct->id) }}"><img src="{{ asset($latestProduct->product_image) }}" width="260" height="285" alt=""/></a>
                                        </div>
                                        <h4><a href="{{ url('/product-details/'.$latestProduct->id) }}">{{ $latestProduct->product_name }}</a></h4>
                                        <div class="rc-ratings">
                                            <span class="fa fa-star active"></span>
                                            <span class="fa fa-star active"></span>
                                            <span class="fa fa-star active"></span>
                                            <span class="fa fa-star active"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <div class="product-price">TK. {{ $latestProduct->product_new_price }}</div>
                                        <div class="shop-meta">
                                            <form action="{{ url('/add-to-cart') }}" method="post">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="qty" value="1" min="1">
                                                <input type="hidden" name="product_id" value="{{ $latestProduct->id }}">
                                                <button type="submit"class="pull-center btn btn-secondary"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection