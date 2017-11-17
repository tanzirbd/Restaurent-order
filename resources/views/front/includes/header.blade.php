<!-- Navigation-->
<nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('front_resturent') }}/img/nav-logo.png" alt="nav-logo">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/menu') }}">Menu</a></li>
                <li><a href="{{ url('/reservation') }}">Reservation</a></li>
                <li class="dropdown">
                    <a href="./recipe.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recipe<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="./recipe.html">Recipe - 2Col</a></li>
                        <li><a href="./recipe_3col.html">Recipe - 3Col</a></li>
                        <li><a href="./recipe_4col.html">Recipe - 4Col</a></li>
                        <li><a href="./recipe_masonry.html">Recipe - Masonry</a></li>
                        <li>
                            <a href="./recipe_detail-image.html">Recipe - Single <span class="caret-right"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="./recipe_detail-image.html">Recipe - Image</a></li>
                                <li><a href="./recipe_detail-slider.html">Recipe - Gallery</a></li>
                                <li><a href="./recipe_detail-video.html">Recipe - Video</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="./blog_right_sidebar.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="./blog_right_sidebar.html">Blog - Right Sidebar</a></li>
                        <li><a href="./blog_left_sidebar.html">Blog - Left Sidebar</a></li>
                        <li><a href="./blog_fullwidth.html">Blog - Fullwidth</a></li>
                        <li><a href="./blog_masonry.html">Blog - Masonry</a></li>
                        <li>
                            <a href="./blog_single_image.html">Blog - Single <span class="caret-right"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="./blog_single_image.html">Blog - Image</a></li>
                                <li><a href="./blog_single_slider.html">Blog - Gallery</a></li>
                                <li><a href="./blog_single_video.html">Blog - Video</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a href="{{ url('/shop') }}">shop</a></li>
                <li><a href="./contact.html">Contact</a></li>
                <li class="dropdown">
                    <a class="css-pointer dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart fsc pull-left"></i><span class="cart-number">{{ Cart::count() }}</span><span class="caret"></span></a>
                    <div class="cart-content dropdown-menu">
                        <div class="cart-title">
                            <h4>Shopping Cart</h4>
                        </div>
                        <div class="cart-items">

                            @foreach($cartProducts->take(3) as $cartProduct)
                            <div class="cart-item clearfix">
                                <div class="cart-item-image">
                                    <a href="{{ url('/product-details/'.$cartProduct->id) }}"><img src="{{ asset($cartProduct->options->image) }}" width="40" height="44" alt="{{ $cartProduct->name }}"></a>
                                </div>
                                <div class="cart-item-desc">
                                    <a href="{{ url('/product-details/'.$cartProduct->id) }}">{{ $cartProduct->name }}</a>
                                    <span class="cart-item-price">TK. {{ $cartProduct->price }}</span>
                                    <span class="cart-item-quantity">x {{ $cartProduct->qty }}</span>
                                    <a href="{{ url('/delete-cart-product/'.$cartProduct->rowId) }}"><i class="fa fa-times ci-close"></i></a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="cart-action clearfix">
                            <span class="pull-left checkout-price">TK. {{ Session::get('subTotal') }}</span>
                            <a class="btn btn-default pull-right" href="{{ url('/show-cart') }}">View Cart</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!--/.navbar-collapse -->
    </div>
</nav>