<!-- foto gallery -->
<style type="text/css">
    .card {
        margin: auto;
        padding: 20px;
    }

    fieldset.active {
        display: block !important
    }

    fieldset {
        display: none
    }

    .pic0 {
        width: 400px;
        height: 350px;
        margin-left: 85px;
        margin-right: auto;
        display: block
    }

    .product-pic {
        padding-left: auto;
        padding-right: auto;
        width: 100%
    }

    .thumbnails {
        position: absolute
    }

    .fit-image {
        width: 100%;
        object-fit: cover
    }

    .tb {
        width: 62px;
        height: 62px;
        margin: 2px;
        opacity: 0.4;
        cursor: pointer
    }

    .tb-active {
        opacity: 1
    }

    .thumbnail-img {
        width: 60px;
        height: 60px
    }

    @media screen and (max-width: 768px) {
        .pic0 {
            width: 250px;
            height: 350px
        }
    }
</style>
<!-- color -->
<style type="text/css">
    .radio-toolbar {
      margin: 10px;
    }

    .radio-toolbar input[type="radio"] {
      opacity: 0;
      position: fixed;
      width: 0;
    }

    .radio-toolbar label {
        display: inline-block;
        /*background-color: #ddd;*/
        padding: 10px 20px;
        font-family: sans-serif, Arial;
        font-size: 16px;
        border: 2px solid #ccc;
        border-radius: 4px;
    }

    .radio-toolbar label:hover {
      background-color: #dfd;
    }

    .radio-toolbar input[type="radio"]:focus + label {
        border: 2px dashed #444;
    }

    .radio-toolbar input[type="radio"]:checked + label {
        /*background-color: #bfb;*/
        border-color: #e94b3c;
    }
</style>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('product')}}/{{$cat->category_name}}">{{$cat->category_name}}</a></li>
                <li class="breadcrumb-item"><a href="{{url('product')}}/{{$sub->sub}}">{{$sub->sub}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$pro->product_name}}</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-6">
                        @php 
                            $img = explode(",", $pro->img);
                        @endphp
                        <div class="container-fluid px-sm-1 py-5 mx-auto">
                            <div class="row justify-content-center">
                                <div class="d-flex">
                                    <div class="card">
                                        <div class="d-flex flex-column thumbnails">
                                            
                                            <div id="f1" class="tb tb-active"> <img class="thumbnail-img fit-image" src="{{URL::asset('picture')}}/{{$img[0]}}"> </div>
                                            @for($i=1; $i < count($img); $i++)
                                            @php 
                                            $n = $i+1;
                                            @endphp
                                            <div id="f{{$n}}" class="tb"> <img class="thumbnail-img fit-image" src="{{URL::asset('picture')}}/{{$img[$i]}}"> </div>
                                            @endfor
                                        </div>
                                        
                                        <fieldset id="f11" class="active">
                                            <div class="product-pic"> <img class="pic0" src="{{URL::asset('picture')}}/{{$img[0]}}"> </div>
                                        </fieldset>
                                        @for($i=1; $i < count($img); $i++)
                                        @php 
                                            $a = $i+1;
                                        @endphp
                                        <fieldset id="f{{$a}}1" class="">
                                            <div class="product-pic"> <img class="pic0" src="{{URL::asset('picture')}}/{{$img[$i]}}"> </div>
                                        </fieldset>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <form action="{{url('add_to_basket')}}" method="post">
                        <div class="product-details product-details-centered">
                            <h1 class="product-title">{{$pro->product_name}}</h1><!-- End .product-title -->
                            
                            @csrf

                            @if($review->isEmpty())
                            @else
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                            </div>
                            @endif
                            @if(is_null($discount))
                            <div class="product-price">
                                ${{$pro->price}}
                            </div>
                            @else
                            <div>
                               <strike>${{$pro->price}}</strike>
                            </div>
                            <div class="product-price">$
                                @php
                                $price = ($pro->price*$discount->discount)/100;
                                echo $dis = $pro->price-$price;
                                @endphp
                            </div>
                            @endif
                            <div class="product-content">
                                @php
                                $desc = str_replace("<p>", "", $pro->description);
                                $text = explode(" ", $desc);
                                @endphp
                                @for($i=0; $i < 20; $i++)
                                {{$text[$i]}}
                                @endfor
                            </div>

                            <div class="details-filter-row details-row-size">
                                <label>Color:</label>
                                @php 

                                $warna = explode(",",$pro->color);
                                @endphp
                                <div class="radio-toolbar">

                                    <input type="radio" id="color0" name="color" value="{{$warna[0]}}" checked="">
                                    <label for="color0" style="background-color: {{$warna[0]}}"></label>
                                    @for($i=1; $i < count($warna); $i++)
                                    <input type="radio" id="color{{$i}}" name="color" value="{{$warna[$i]}}" >
                                    <label for="color{{$i}}" style="background-color: {{$warna[$i]}}"></label>
                                    @endfor
                                </div>
                                <br>
                                
                            </div>
                            <div class="details-filter-row details-row-size">
                                <label>Stock: {{$pro->stock}}</label>
                            </div>
                                

                            <div class="product-details-action">
                                
                                <div class="details-action-col">
                                    <div class="product-details-quantity">
                                        <input type="hidden" name="id" value="{{$pro->product_id}}">
                                        <input type="number" name="quantity" id="qty" class="form-control" value="1" min="1" max="{{$pro->stock}}" step="1" data-decimals="0" required>
                                    </div>

                                    <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                                </div>
                               @php 
                               $id = encrypt($pro->product_id);
                               @endphp

                                <div class="details-action-wrapper">
                                    <a href="{{url('addwishlist')}}/{{$id}}" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                </div>
                            </div>
                             
                            <!-- <div class="product-details-footer">
                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>

                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                </div>
                            </div> -->
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            {{$desc}}
                        </div>
                    </div>
                    @if($review->isEmpty())
                    <div class="tab-pane fade" style="text-align: center;" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <h3>No Review</h3>
                    </div>
                    @else
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="reviews">
                            <h3>Reviews (2)</h3>
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">Samanta J.</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">6 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Good, perfect size</h4>

                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                        </div><!-- End .review-content -->

                                       
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->

                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">John Doe</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">5 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Very good</h4>

                                        <div class="review-content">
                                            <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                        </div>

                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

    $(".tb").hover(function(){

    $(".tb").removeClass("tb-active");
    $(this).addClass("tb-active");

    current_fs = $(".active");

    next_fs = $(this).attr('id');
    next_fs = "#" + next_fs + "1";

    $("fieldset").removeClass("active");
    $(next_fs).addClass("active");

    current_fs.animate({}, {
    step: function() {
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    next_fs.css({
    'display': 'block'
    });
    }
    });
    });

    });
</script>