<!DOCTYPE html>
<html lang="en">


<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->
<head>
    <meta charset="UTF-8">
  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>INTAIMALL</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="IntaiMall Online Shop">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('user/assets/images/logointaimall.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('user/assets/images/logointaimall.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('user/assets/images/logointaimall.png') }}">
    <link rel="manifest" href="{{ URL::asset('user/assets/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ URL::asset('user/assets/images/icons/safari-pinned-tab.svg" color="#666666') }}">
    <link rel="shortcut icon" href="{{ URL::asset('user/assets/images/') }}">
    <meta name="apple-mobile-web-app-title" content="Intaimall">
    <meta name="application-name" content="Intaimall">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ URL::asset('user/assets/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ URL::asset('user/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('user/assets/css/style.css') }}">
</head>

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <!-- <div class="header-left">
                        <div class="header-dropdown">
                            <a href="#">Usd</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">Eur</a></li>
                                    <li><a href="#">Usd</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="header-dropdown">
                            <a href="#">Eng</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li><a href="tel:#"><i class="fa fa-whatsapp"></i>+0123 456 789</a></li>
                                    <li><a href="tel:#"><i class="icon-phone"></i>+0123 456 789</a></li>
                                    
                                    @if(Auth::check())
                                    <li><a href="{{url('wishlist_page')}}"><i class="fa fa-heart"></i>My Wishlist <span>@php echo sizeof($wishlist); @endphp</span></a></li>
                                    <li><a href="{{url('history_page')}}"><i class="fa fa-shopping-bag"></i>History<span>@php echo sizeof($history); @endphp</span></a></li>
                                    <li><a href="{{url('setup')}}"><i class="fa fa-cog"></i>Setting</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @else
                                    <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="{{url('home')}}" class="logo">
                            <img src="{{URL::asset('user/assets/images/logo.png')}}" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container">
                                    <a href="{{url('home')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{url('product')}}" class="sf-with-ul">Category</a>

                                    <div class="megamenu megamenu-md">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="menu-col">
                                                    <div class="row">
                                                        @for($i=0; $i < count($category); $i++)
                                                        <div class="col-md-6">
                                                            <div class="menu-title"><b>{{ $category[$i]['category_name'] }}</b></div><!-- End .menu-title -->

                                                            <ul>
                                                                @foreach($category[$i]['sub'] as $key => $value)
                                                                <li><a href="{{url('product')}}/{{$value->sub}}">{{ $value->sub }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div><!-- End .col-md-6 -->
                                                        @endfor
                                                        
                                                    </div><!-- End .row -->
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .col-md-8 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu megamenu-md -->
                                </li>
                               
                                <li>
                                    <a href="{{url('contacts')}}">Contact</a>
                                </li>
                                
                                @if(Auth::check())
                                @php $pesanan = sizeof($history); @endphp
                                @if($pesanan!=0)
                                <li>
                                    <a href="{{url('checkout')}}">Your Payment</a>
                                </li>
                                @endif
                                @else
                                @endif
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                            <form action="#" method="POST">
                                <div class="header-search-wrapper" id="productlist">
                                    
                                    <label for="product" class="sr-only">Search</label>
                                    

                                    <input type="search" class="form-control" style="width: auto;" name="product" id="product" placeholder="Search in..." >
                                    
                                </div>
                            </form>
                        </div><!-- End .header-search -->
                                           
                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                @if(session('cart'))
                                <span class="cart-count">
                                    
                                    {{ sizeof(session('cart'))}}
                                    
                                </span>
                                @endif
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right">
                                @if(session('cart'))
                                @foreach(session('cart') as $id => $data) 
                                <div class="dropdown-cart-products">
                                    
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="#">
                                                <a href="#">{{$data['name']}}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty"> {{$data['quantity']}} </span>
                                                 x ${{$data['price']}}
                                            </span>
                                        </div><!-- End .product-cart-details -->
                                        @php
                                        $id = encrypt($data['id']);
                                        $img = explode(",",$data['img']);
                                        @endphp
                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{URL::asset('picture')}}/{{$img[0]}}" alt="product">
                                            </a>
                                        </figure>
                                        <a href="{{url('remove_cart')}}/{{$id}}" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    </div><!-- End .product -->
                                    
                                    
                                    
                                </div><!-- End .cart-product -->
                                @endforeach
                                @endif
                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price">
                                        @php
                                        $total = 0;
                                        @endphp
                                        @if(session('cart'))
                                        @foreach(session('cart') as $id => $key)
                                            @php $total += $key['price']*$key['quantity']; @endphp
                                        @endforeach
                                        @endif
                                        {{$total}}
                                    </span>
                                </div>
                                
                                <div class="dropdown-cart-action">
                                    <a href="{{url('cart')}}" class="btn btn-primary">View Cart</a>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->
        
        <main class="main">
            
            @include($fragment)

        </main><!-- End .main -->

        <footer class="footer footer-dark">
        	<div class="footer-middle">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget widget-about">
	            				<img src="{{URL::asset('user/assets/images/logointaimall.png')}}" class="footer-logo" alt="Footer Logo" width="105" height="25">
	            				<p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

	            				<div class="social-icons">
	            					<a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
	            					<a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
	            					<a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
	            					<a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
	            					<a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
	            				</div><!-- End .soial-icons -->
	            			</div><!-- End .widget about-widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="about.html">About IntaiMall</a></li>
	            					<li><a href="#">How to shop on IntaiMall</a></li>
	            					<li><a href="#">FAQ</a></li>
	            					<li><a href="contact.html">Contact us</a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="#">Payment Methods</a></li>
	            					
	            					<li><a href="#">Returns</a></li>
	            					<li><a href="#">Shipping</a></li>
	            					<li><a href="#">Terms and conditions</a></li>
	            					
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            	</div><!-- End .row -->
	            </div><!-- End .container -->
	        </div><!-- End .footer-middle -->

	        <div class="footer-bottom">
	        	<div class="container">
	        		
	        		<figure class="footer-payments">
	        			<img src="{{URL::asset('user/assets/images/payments.png')}}" alt="Payment methods" width="272" height="20">
	        		</figure><!-- End .footer-payments -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

           <!--  <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form> -->
            
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="{{url('home')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{url('product')}}">Category</a>
                        <ul>
                            @for($i=0; $i < count($category); $i++)
                            <li><a href="{{url('product')}}/{{ $category[$i]['category_name'] }}">{{ $category[$i]['category_name'] }}</a></li>
                            @endfor
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('contacts')}}">Contact</a>
                    </li>
                    @if(Auth::check() && $pesanan!=0)
                    <li>
                        <a href="{{url('checkout')}}">Your Payment</a>
                    </li>
                    @else
                    @endif
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form method="POST" action="{{ route('login') }}" >
                                    @csrf
                                        <div class="form-group">
                                            <label for="singin-email">Email address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password" name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <!-- <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="register-email">Full Name</label>
                                            <input type="text" class="form-control" id="register-email" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="register-password">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="register-password" name="password" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="register-password">Confirm Password</label>
                                            <input type="password" class="form-control" id="register-password" name="password" required autocomplete="new-password">
                                        </div>

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div>
                                        </div>
                                    </form> -->
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    {{-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="user/assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                            </div><!-- End .custom-checkbox -->
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                    </div>
                    <div id="myModal" class="modal">

                      <!-- Modal content -->
                      <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>Some text in the Modal..</p>
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Plugins JS File -->
    <script src="{{ URL::asset('user/assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('user/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('user/assets/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ URL::asset('user/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('user/assets/js/superfish.min.js') }}"></script>
    <script src="{{ URL::asset('user/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('user/assets/js/jquery.magnific-popup.min.js') }}"></script> 
    <!-- Main JS File -->
    <script src="{{ URL::asset('user/assets/js/main.js') }}"></script>
    <script type="text/javascript">
        @if(session('modal'))
        $('#signin-modal').modal('show');
        @endif
    </script>
    <script type="text/javascript">
    $(function(){
       setTimeout(function(){
            $("#openModal").show();
       },3000);
    }); 
    $(document).ready(function(){
        $('#product').keyup(function() {
            var query = $(this).val();
            if (query != '') 
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "/search",
                    type: "POST",
                    data: {query: query, _token: _token},
                    success:function(data)
                    {
                        $('#productlist').fadeIn();
                        $('#productlist').html(data);   
                    }
                })
                .done(function() {
                    console.log("success");
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
                 
            }
        });
    });

    $('li').on('click', function() {
        $('#product').val($(this).text());
        $('#productlist').fadeOut();
        /* Act on the event */
    });
</script>
</body>


<!-- molla/index-2.html  22 Nov 2019 09:55:42 GMT -->
</html>