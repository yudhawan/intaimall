
            <div class="page-header text-center" style="background-image: url({{URL::asset('user/assets/images/page-header-bg.jpg')}})">
                <div class="container">
                    <h1 class="page-title">INTAIMALL<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('product')}}">Category</a></li>
                        <li class="breadcrumb-item"><a href="{{url('product')}}/{{!is_null($catname) || !is_null($cate)?  $catname : ''}}">
                        {{!is_null($catname) || !is_null($cate)?  $catname : ''}}</a></li>
                        
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="toolbox">
                                <div class="toolbox-left">
                                    
                                </div><!-- End .toolbox-left -->

                                <div class="toolbox-right">

                                </div><!-- End .toolbox-right -->
                            </div><!-- End .toolbox -->
                            
                            <div class="products mb-3">
                                <div class="row justify-content-center">
                                    
                                    @foreach($product as $key)
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            @if(!is_null($key->discount))
                                            <span class="product-label label-sale">{{$key->discount}}% OFF</span>                                            
                                            @endif
                                            <figure class="product-media">
                                                @if($key->stock==0 || is_null($key->stock))
                                                <span class="product-label label-out">Out of Stock</span>
                                                @endif
                                                @php
                                                    $id = encrypt($key->product_id);
                                                    $gambar=explode(',', $key->img);
                                                @endphp

                                                <a href="{{url('details')}}/{{$id}}">
                                                    <img src="{{URL::asset('picture/')}}/{{ $gambar[0] }}" alt="Product image" class="product-image">
                                                </a>
                                                
                                                <div class="product-action-vertical">
                                                    <a href="{{url('addwishlist')}}/{{ $id }}" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    <!-- <a href="#" data-toggle="modal" data-target="#modal{{ $key->product_id }}" class="btn-product-icon btn-quickview btn-expandable" title="Quick view"><span>Quick view</span></a> -->
                                                </div><!-- End .product-action-vertical -->
                                                @if($key->stock==0 || is_null($key->stock))

                                                @else
                                                 <div class="product-action">
                                                    <a href="{{url('add_cart')}}/{{$id}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                                </div>
                                                @endif
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                               <!-- {{--  <div class="product-cat">
                                                    <a href="#">Women</a>
                                                </div> --}} -->
                                                <h3 class="product-title"><a href="product.html">{{ $key->product_name }}</a></h3><!-- End .product-title -->
                                                @php
                                                $discount = ($key->price*$key->discount)/100;
                                                $fixprice = $key->price-$discount;
                                                @endphp
                                                @if(is_null($key->discount))
                                                <div class="product-price">
                                                    ${{ $key->price }}
                                                </div>
                                                @else
                                                <div class="product-price">
                                                    ${{ $fixprice }}
                                                </div>
                                                <div>
                                                    <strike style="color: #B2ACAC">${{ $key->price }}</strike>
                                                </div>
                                                @endif
                                                <!-- <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                    </div>
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div> -->

                                                <div class="product-nav product-nav-thumbs">
                                                    @for($i=0; $i < count($gambar); $i++)
                                                    <a class="active">
                                                        <img src="{{URL::asset('picture/')}}/{{ $gambar[$i] }}" alt="product desc">
                                                    </a>
                                                    @endfor
                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    @endforeach
                                    

                                </div><!-- End .row -->
                            </div><!-- End .products -->


                            <!-- <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                            <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                        </a>
                                    </li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item-total">of 6</li>
                                    <li class="page-item">
                                        <a class="page-link page-link-next" href="#" aria-label="Next">
                                            Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav> -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3 order-lg-first">
                            <div class="sidebar sidebar-shop">
                                @if(!is_null($cate))
                                
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        
                                        <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5"><b>
                                            {{$catname}}</b>
                                        </a>
                                        
                                    </h3>
                                    
                                    <div class="collapse show" id="widget-5">
                                        <div class="widget-body">
                                            <div class="filter-price">
                                                @foreach($cate as $sub)
                                                <div class="filter-price-text" style="margin-left: 20px; text-align: justify;">
                                                   <a style="color: #5E5959;" href="{{url('product')}}/{{$sub->sub}}"><b><i class="fa fa-minus-square"></i>{{$sub->sub}}</b></a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @else
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5"><b>
                                            Category</b>
                                        </a>
                                    </h3>
                                    
                                    <div class="collapse show" id="widget-5">
                                        <div class="widget-body">
                                            @for($i = 0; $i < count($category); $i++)
                                            <div class="filter-price">
                                                <div class="filter-price-text" style="margin-left: 10px;">
                                                   <a style="color: #5E5959;" href="{{url('product')}}/{{$category[$i]['category_name']}}"><b><i class="fa fa-angle-right"></i>{{$category[$i]['category_name']}}</b></a>
                                                </div>
                                            </div>
                                            @endfor
                                        </div>
                                    </div>
                                    
                                </div>
                                @endif
                            </div><!-- End .sidebar sidebar-shop -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
            