@extends('front.master')

@section('body_content')
    <!-- Page Header -->
    <section class="page_header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-uppercase">Menu</h2>
                    <p>Tomato is a Delitious Restaurant</p>
                </div>
            </div>
        </div>
    </section>

    <!-- menu-->
    <section class="menu menu2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header wow fadeInDown">
                        <h1>Overlay
                            <small>These fine folks trusted the award winning restaurant.</small>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="food-menu wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu-tags2">
                            <span data-filter="*" class="tagsort2-active">All</span>
                            <span data-filter=".starter">starters</span>
                            <span data-filter=".breakfast">breakfast</span>
                            <span data-filter=".lunch">lunch</span>
                            <span data-filter=".dinner">dinner</span>
                            <span data-filter=".desserts">desserts</span>
                        </div>
                    </div>
                </div>
                <div class="row menu-items2">

                    @foreach($products->take(9) as $product)
                    <div class="menu-item2 col-sm-4 col-xs-12 starter dinner desserts lunch">
                        <div class="menu-info">
                            <img src="{{ asset($product->product_image) }}" width="360" class="img-responsive" alt=""/>
                            <a href="{{ url('/product-details/'.$product->id) }}">
                                <div class="menu2-overlay">
                                    <h4>{{ $product->product_name }}</h4>
                                    <p>Asparagus, hens egg, toasted
                                        <br>sunflower seeds, Spenwood cheese</p>
                                    <span class="price">TK. {{ $product->product_new_price }}</span>
                                </div>
                            </a>
                        </div>
                        <a href="{{ url('/product-details/'.$product->id) }}" class="menu-more">+</a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection