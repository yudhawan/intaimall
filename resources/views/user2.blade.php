<!doctype html>
<html class="no-js" lang="zxx">
    <head>
     
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>IntaiMall</title>
        <meta name="description" content="Live Preview Of Oswan eCommerce HTML5 Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('user/assets/img/favicon.png') }}">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{ URL::asset('user/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/assets/css/chosen.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/assets/css/icofont.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/assets/css/meanmenu.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/assets/css/bundle.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('user/assets/css/responsive.css') }}">
        <script src="{{ URL::asset('user/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    </head>
    <body>
        <div class="wrapper">
            <!-- header start -->
            <header>
                <div class="header-area transparent-bar ptb-55">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-4">
                                <div class="logo-small-device">
                                    <a href="index.html"><img alt="" style="width: 148px; height: 31px;" src="{{ URL::asset('user/assets/img/logo/intai.png') }}"></a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-8">
                                <div class="header-contact-menu-wrapper pl-45">
                                    <div class="header-contact">
                                        <p>WANT TO TALK WITH US  +01254 265 987</p>
                                    </div>
                                    <div class="menu-wrapper text-center">
                                        <button class="menu-toggle">
                                            <img class="s-open" alt="" src="{{ URL::asset('user/assets/img/icon-img/menu.png')}}">
                                            <img class="s-close" alt="" src="{{ URL::asset('user/assets/img/icon-img/menu-close.png')}}">
                                        </button>
                                        
                                        <div class="main-menu">
                                            <nav>
                                                <ul>
                                                    <li><a href="index.html"><i class="fa fa-home" > home</i></a></li>
                                                    <li><a href=""><i class="fa fa-navicon">Category</i></a>
                                                        <ul>
                                                            @for($i=0; $i < count($category); $i++)
                                                            
                                                            <li><a href="product/{{$category[$i]['category_name']}}">{{$category[$i]['category_name']}}</a></li>
                                                            <ul class="nested">
                                                                @foreach($category[$i]['sub'] as $key)
                                                                <li><a href="product/{{ $key->sub }}">{{ $key->sub }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                            @endfor
                                                        </ul>
                                                    </li>
                                                    <li class="active"><a href="wishlist.html"><i class="fa fa-heart" >Wishlist </i></a></li>
                                                    <li><a href="contact.html"><i class="fa fa-address-card">contact us</i></a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-cart cart-small-device">
                                    <button class="icon-cart">
                                        <i class="ti-shopping-cart"></i>
                                        <span class="count-style">02</span>
                                        <span class="count-price-add">$295.95</span>
                                    </button>
                                    <div class="shopping-cart-content">
                                        <ul>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="{{URL::asset('user/assets/img/cart/cart-1.jpg')}}"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h3><a href="#">Gloriori GSX 250 R </a></h3>
                                                    <span>Price: $275</span>
                                                    <span>Qty: 01</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="icofont icofont-ui-delete"></i></a>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="{{URL::asset('user/assets/img/cart/cart-2.jpg')}}"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h3><a href="#">Demonissi Gori</a></h3>
                                                    <span>Price: $275</span>
                                                    <span class="qty">Qty: 01</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="icofont icofont-ui-delete"></i></a>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="{{URL::asset('user/assets/img/cart/cart-3.jpg')}}"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h3><a href="#">Demonissi Gori</a></h3>
                                                    <span>Price: $275</span>
                                                    <span class="qty">Qty: 01</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="icofont icofont-ui-delete"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-total">
                                            <h4>total: <span>$550.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-btn">
                                            <a class="btn-style cr-btn" href="#">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-menu-area col-12">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul class="menu-overflow">
                                            <li><a href="index.html"><i class="fa fa-home" > home</i></a></li>
                                            <li><a href="#"><i class="fa fa-navicon">Category</i></a>
                                                <ul>
                                                    @for($i=0; $i < count($category); $i++)
                                                    
                                                    <li><a href="product/{{$category[$i]['category_name']}}">{{$category[$i]['category_name']}}</a></li>
                                                    <ul class="nested">
                                                        @foreach($category[$i]['sub'] as $key)
                                                        <li><a href="product/{{ $key->sub }}">{{ $key->sub }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    @endfor
                                                </ul>
                                            </li>
                                            <li class="active"><a href="wishlist.html"><i class="fa fa-heart" >Wishlist </i></a></li>
                                            <li><a href="contact.html"><i class="fa fa-address-card">contact us</i></a></li>
                                        </ul>
                                    </nav>							
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-cart-wrapper">
                        <div class="header-cart">
                            <button class="icon-cart">
                                <i class="ti-shopping-cart"></i>
                                <span class="count-style">02</span>
                                <span class="count-price-add">$295.95</span>
                            </button>
                            <div class="shopping-cart-content">
                                <ul>
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="" src="{{URL::asset('user/assets/img/cart/cart-1.jpg')}}"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h3><a href="#">Gloriori GSX 250 R </a></h3>
                                            <span>Price: $275</span>
                                            <span>Qty: 01</span>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="icofont icofont-ui-delete"></i></a>
                                        </div>
                                    </li>
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="" src="{{URL::asset('user/assets/img/cart/cart-2.jpg')}}"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h3><a href="#">Demonissi Gori</a></h3>
                                            <span>Price: $275</span>
                                            <span class="qty">Qty: 01</span>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="icofont icofont-ui-delete"></i></a>
                                        </div>
                                    </li>
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="" src="{{URL::asset('user/assets/img/cart/cart-3.jpg')}}"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h3><a href="#">Demonissi Gori</a></h3>
                                            <span>Price: $275</span>
                                            <span class="qty">Qty: 01</span>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="icofont icofont-ui-delete"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-total">
                                    <h4>total: <span>$550.00</span></h4>
                                </div>
                                <div class="shopping-cart-btn">
                                    <a class="btn-style cr-btn" href="#">checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            @if($fragment=='user/shop'):
            @else:
            <div class="slider-area">
                <div class="slider-active owl-carousel">
                    <div class="single-slider slider-1" style="background-image: url(user/assets/img/slider/slider-bg.jpg)">
                        <div class="container">
                            <div class="slider-content slider-animated-1">
                                <div class="slider-img text-center">
                                    <img class="animated" src="user/assets/img/slider/bike-1.png" alt="slider images">
                                </div>
                                <div class="slider-text-img">
                                    <h6 class="animated">BOOK YOUR BIKE INSTANTLY AND ENJOY DISCOUNT</h6>
                                    <img class="animated" src="user/assets/img/icon-img/bike.png" alt="slider images">
                                </div>
                                <h2 class="animated">MOTORCYCLE</h2>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider slider-1" style="background-image: url(user/assets/img/slider/slider-bg.jpg)">
                        <div class="container">
                            <div class="slider-content slider-animated-1">
                                <div class="slider-img text-center">
                                    <img class="animated" src="user/assets/img/slider/bike-2.png" alt="slider images">
                                </div>
                                <div class="slider-text-img">
                                    <h6 class="animated">BOOK YOUR BIKE INSTANTLY AND ENJOY DISCOUNT</h6>
                                    <img class="animated" src="user/assets/img/icon-img/bike.png" alt="slider images">
                                </div>
                                <h2 class="animated">MOTORCYCLE</h2>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider slider-1" style="background-image: url(user/assets/img/slider/slider-bg.jpg)">
                        <div class="container">
                            <div class="slider-content slider-animated-1">
                                <div class="slider-img text-center">
                                    <img class="animated" src="user/assets/img/slider/bike-1.png" alt="slider images">
                                </div>
                                <div class="slider-text-img">
                                    <h6 class="animated">BOOK YOUR BIKE INSTANTLY AND ENJOY DISCOUNT</h6>
                                    <img class="animated" src="user/assets/img/icon-img/bike.png" alt="slider images">
                                </div>
                                <h2 class="animated">MOTORCYCLE</h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="slider-social">
                    <ul>
                        <li class="facebook"><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                        <li class="twitter"><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                        <li class="pinterest"><a href="#"><i class="icofont icofont-social-pinterest"></i></a></li>
                    </ul>
                </div>
                @endif
            @include ($fragment)
            
            
            <footer>
                
                <div class="footer-bottom ptb-35 black-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <div class="copyright">
                                    <p>©Copyright, 2019 Online Shop <a href="https://freethemescloud.com/">IntaiMall</a></p>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="footer-payment-method">
                                    <a href="#"><img alt="" src="{{URL::asset('user/assets/img/icon-img/payment.png')}}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- modal -->
            
        </div>
        
        
        
		
		
		
		
		
		
		
		
		<!-- all js here -->
        <script src="{{ URL::asset('user/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
        <script src="{{ URL::asset('user/assets/js/popper.js') }}"></script>
        <script src="{{ URL::asset('user/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('user/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ URL::asset('user/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ URL::asset('user/assets/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ URL::asset('user/assets/js/waypoints.min.js') }}"></script>
        
        <script src="{{ URL::asset('user/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ URL::asset('user/assets/js/plugins.js') }}"></script>
        <script src="{{ URL::asset('user/assets/js/main.js') }}"></script>
    </body>
</html>
