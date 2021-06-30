<main class="main">
    <div class="page-header text-center" style="background-image: url({{URL::asset('user/assets/images/page-header-bg.jpg')}})">
        <div class="container">
            <h1 class="page-title">Wishlist<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <table class="table table-wishlist table-mobile">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Stock Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($wis as $key)
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                @php 
                                $id = encrypt($key->product_id);
                                $img = explode(",", $key->img);
                                @endphp
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{URL::asset('picture')}}/{{$img[0]}}" alt="Product image">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a href="{{url('details')}}/{{$id}}">{{$key->product_name}}</a>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        <td class="price-col">${{$key->price}}</td>
                        @if($key->stock!=0)
                        <td class="stock-col"><span class="in-stock">In stock</span></td>
                        @else
                        <td class="stock-col"><span class="out-of-stock">Out of stock</span></td>
                        @endif
                        <td class="action-col">
                            <a href="{{('add_cart')}}/{{$id}}" class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>Add to Cart</a>
                        </td>
                        <td class="remove-col"><a href="{{url('rmvw')}}/{{$id}}" class="btn-remove"><i class="icon-close"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- End .table table-wishlist -->
           <!--  <div class="wishlist-share">
                <div class="social-icons social-icons-sm mb-2">
                    <label class="social-label">Share on:</label>
                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div>
            </div> -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main>