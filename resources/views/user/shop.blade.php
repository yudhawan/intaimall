<style type="text/css" media="screen">
.gam{
    border-radius: 5px; 
    max-width: 150px;
}  
.gam .gmbr{
    width: 100%; 
    height: auto;
}  
.gam .btn_s{

}
.column{
    background-color: #CABDBD;
    width: 25%;
    float: left;
    padding: 10px;
    margin-top: 7%;

}
.column img{
    cursor: pointer;
    opacity: 0.8;
    width: 100%;
}
.column img:hover{
    opacity: 1;
}
.imgview{
    margin-top: 10%;
    position: relative;
}


</style>
<div class="breadcrumb-area pt-255 pb-170" style="background-image: url(assets/img/banner/banner-4.jpg)">
                <div class="container-fluid">
                    <div class="breadcrumb-content text-center">
                        <h2>Shop Page</h2>
                        <ul>
                            <li>
                                <a href="#">home</a>
                            </li>
                            <li>Shop page</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="shop-wrapper fluid-padding-2 pt-120 pb-150">
                <div class="container-fluid">
                    <div class="row">
                        <div class="treeview w-20 border col-lg-3 fixed-left" style=" border-right: 1px solid #868e96;">
                            <div class="product-sidebar-area pr-60">
                               
                                <div class="sidebar-widget pb-50">
                                    <h3 class="sidebar-widget">Categories</h3>
                                    <div class="widget-categories">
                                        <ul class="treeview-colorful-list mb-3">
                                           @for($i=0; $i < count($category); $i++)
                                           
                                           <li><a href="product/{{$category[$i]['category_name']}}">{{$category[$i]['category_name']}}</a></li>
                                           <ul class="nested">
                                               @foreach($category[$i]['sub'] as $key)
                                               <li><a href="product/{{ $key->sub }}">{{ $key->sub }}</a></li>
                                               @endforeach
                                           </ul>
                                           @endfor
                                        </ul>
                                    </div>
                                </div>
                                {{-- <div class="sidebar-widget pb-50">
                                    <h3 class="sidebar-widget">by price</h3>
                                    <div class="row">
                                        <input type="number" class="form-control" style="width: 20%; background-color: #FFFFFF; text-align: center;" id="min" min="0" placeholder="Min" />
                                        <span class="fa fa-angle-double-right"></span>
                                        <input type="number" class="form-control" style="width: 20%; background-color: #FFFFFF; text-align: center;" id="max" placeholder="Max" />
                                    </div>
                                </div> --}}
                                
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="shop-topbar-wrapper">
                                <div class="sidebar-search">
                                        <form action="#">
                                            <input type="text" placeholder="Search Products...">
                                            <button><i class="ti-search"></i></button>
                                        </form>
                                    </div>
                                <div class="product-sorting">
                                    <div class="sorting sorting-bg-1">
                                        <form>
                                            <select class="select">
                                                <option value="">Default softing </option>
                                                <option value="">Sort by news</option>
                                                <option value="">Sort by price</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="grid-list-product-wrapper tab-content">
                                <div id="new-product" class="product-grid product-view tab-pane active">
                                    <div class="row" >
                                        @for($i=0; $i < count($product); $i++)
                                        <div class="product-width col-md-2 col-xl-3 col-lg-2">
                                            <div class="product-wrapper mb-35">
                                                <div class="product-img">
                                                    @php 
                                                        
                                                        $img = explode(',', $product[$i]['img']);
                                                        
                                                    @endphp 
                                                        
                                                    
                                                    <a href="product/$product[$i]['product_id']">
                                                        <img src="{{URL::asset('picture')}}/{{ $img[0] }}" alt="">
                                                    </a>
                                                   
                                                    <div class="product-action">
                                                        <a class="action-plus-2 p-action-none" title="Add To Cart" href="#">
                                                            <i class=" ti-shopping-cart"></i>
                                                        </a>
                                                        <a class="action-cart-2" title="Wishlist" href="#">
                                                            <i class=" ti-heart"></i>
                                                        </a>
                                                        <a class="action-reload" title="Quick View" data-toggle="modal" data-target="#exampleModal{{ $product[$i]['product_id'] }}" href="#">
                                                            <i class=" ti-zoom-in"></i>
                                                        </a>
                                                    </div>
                                                    <div style=" text-align: center;">
                                                        <div class="product-title-spreed">
                                                            <h4><a href="product/$key->product_id">{{ $product[$i]['product_name'] }}</a></h4>
                                                            
                                                        </div>
                                                        @foreach($product[$i]['discount'] as $dis)
                                                        <div class="product-price">
                                                            @php
                                                            $discount = ($product[$i]['price']*$dis->discount)/100;
                                                            $fix=$product[$i]['price']-$discount;
                                                            @endphp
                                                            @if(is_null($key->discount)):
                                                            <a href="product/$key->product_id"><h4 style="color: #e94b3cff;">${{ $product[$i]['price'] }}</h4></a>
                                                            @else
                                                            <a href="product/$key->product_id"><h4 style="color: #e94b3cff;">${{ $fix }}</h4></a>
                                                            <strike style="color: #827777;"><p style="color: #827777;">${{ $product[$i]['price'] }}</p></strike>
                                                            @endif

                                                        </div>
                                                        
                                                        @endforeach
                                                    </div>
                                                </div>
                                                
                                            </div>

                                        </div>
                                        
                                        @endfor
                                    </div>
                                </div>
                                
                            </div>
                            <div class="paginations text-center mt-20">
                                <ul>
                                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="active"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
            @for($i=0; $i < count($product); $i++)
           <div class="modal fade" id="exampleModal{{ $product[$i]['product_id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            
                            <div class="qwick-view-left">
                                @php
                                    $img = explode(",", $product[$i]['img']);
                                @endphp
                                @if(count($img)>0):
                                <div class="imgview">
                                    <img id="expand" style="width: 100%;" src="{{ URL::asset('picture/')}}/{{ $img[0] }}">
                                </div>
                                @for($a=1; $a < count($img); $a++)
                                <div class="column">
                                    <img id="img_grid" src="{{ URL::asset('picture/')}}/{{ $img[$a] }}" onclick="ganti(this)">
                                </div>
                                @endfor
                                @else:
                                <div class="imgview">
                                    <img id="expand" style="width: 100%;" src="{{ URL::asset('picture/')}}/{{ $img[0] }}">
                                </div>
                                @endif
                            </div>
                            <div class="qwick-view-right">
                                <div class="qwick-view-content">
                                    <h3>{{ $product[$i]['product_name'] }}</h3>
                                    @foreach($product[$i]['discount'] as $dis)
                                    <div class="price">
                                        @php
                                        $discount = ($product[$i]['price']*$dis->discount)/100;
                                        $fix=$product[$i]['price']-$discount;
                                        @endphp
                                        <a href="product/$key->product_id"><h4 style="color: #e94b3cff;">${{ $fix }}</h4></a>
                                        <strike><p class="old">${{ $product[$i]['price'] }}  </p></strike>
                                    </div>
                                    @endforeach
                                    @php 
                                    $des=$product[$i]['des'];
                                    echo substr($des, 0, 100).'... <a href="productlist/'.$product[$i]['product_id'].'">More Detail</a>';
                                    @endphp
                                   
                                    <div class="quick-view-select">
                                       
                                        <div class="select-option-part">
                                            <label><b>Color*</b></label><br>
                                            @php
                                            $clr = explode(',', $product[$i]['color']);
                                            @endphp
                                            @for($i=0; $i < count($clr); $i++)
                                            <input type="radio" name="color" style="width: 20px; height: 20px;" id="{{ $clr[$i] }}" value="{{ $clr[$i] }}" />
                                            <label for="{{ $clr[$i] }}"><span style="background-color: {{ $clr[$i] }}; border:1px solid black;"></span></label>
                                            @endfor
                                            {{-- <select class="select">
                                                <option value="">- Please Select -</option>
                                                <option value="">orange</option>
                                                <option value="">pink</option>
                                                <option value="">yellow</option>
                                            </select> --}}
                                        </div>
                                    </div>
                                    <div class="quickview-plus-minus">
                                        <div class="cart-plus-minus">
                                            <input type="text" value="1" min="1" name="jumlah" class="cart-plus-minus-box">
                                        </div>
                                        <div class="quickview-btn-cart">
                                            <a class="btn-style" href="#">add to cart</a>
                                        </div>
                                        <div class="quickview-btn-wishlist">
                                            <a class="btn-hover" href="#"><i class="icofont icofont-heart-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
<script type="text/javascript">
    function ganti(img){
        var expand = document.getElementById('expand');
        expand.src = img.src;
        expand.parentElement.style.display = "block";
    }
    function send(id){
        alert(id);
    }
    $(document).ready(function() {
        $('.treeview-colorful').mdbTreeview();
    });
</script>