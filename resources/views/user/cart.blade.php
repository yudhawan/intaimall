
<main class="main">
	<div class="page-header text-center" style="background-image: url('{{URL::asset('user/banner/contact.png')}}')">
		<div class="container">
			<h1 class="page-title">View Cart<span>Shop</span></h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="alert alert-primary" id="noaddr" role="alert" style="display: none; text-align: center;">
      Please enter your address before proccess to checkout
    </div>
    <div class="page-content">
    	<div class="cart">
            <div class="container">
            	<div class="row">
            		<div class="col-lg-9">
                        <form action="update_cart" method="post">
                            @csrf
                        
            			<table class="table table-cart table-mobile">
							<thead>
								<tr>
									<th>Product</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>

							<tbody>
                                @foreach(session('cart') as $id => $key)
                                
								<tr>
									<td class="product-col">
										<div class="product">
                                            @php 
                                            $id = encrypt($key['id']);
                                            $img = explode(",", $key['img']);
                                            @endphp
											<figure class="product-media">
												<a href="#">
													<img src="{{URL::asset('picture')}}/{{$img[0]}}" alt="Product image">
												</a>
											</figure>

											<h3 class="product-title">
												<a href="#">{{$key['name']}}</a>
											</h3><!-- End .product-title -->
										</div><!-- End .product -->
									</td>
									<td class="price-col">${{$key['price']}}</td>
									<td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="hidden" name="id[]" multiple value="{{$key['id']}}">
                                            <input type="number" class="form-control" name="quantity[]" multiple value="{{$key['quantity']}}" min="1" max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
									<td class="total-col">$
                                    @php
                                    echo $key['quantity'] *= $key['price']; 
                                    @endphp
                                    </td>
									<td class="remove-col"><a href="remove_cart/{{$id}}" class="btn-remove"><i class="icon-close"></i></a></td>
								</tr>
                                @endforeach
							</tbody>
						</table>
                        
            			<div class="cart-bottom">
	            			<button type="submit" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
            			</div>
                        </form>
            		</div><!-- End .col-lg-9 -->
            		<aside class="col-lg-3">
            			<div class="summary summary-cart">
                            <form action="{{url('proccess')}}" method="post" id="bill">
                                @csrf
            				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->
                            <label class="summary-title"><span>Note </span></i></label>
                            <textarea type="text" class="form-control" id="note" placeholder="Add note here ......................" name="note"></textarea>
            				<table class="table table-summary">
            					<tbody>
                                    @php
                                    $total = 0;
                                    foreach(session('cart') as $id => $key){
                                        $total += $key['price']*$key['quantity'];
                                    } 
                                    @endphp
            						<tr class="summary-subtotal">
            							<td>Subtotal:</td>
            							<td>${{$total}}</td>
            						</tr>
            						
            						<tr class="summary-shipping-estimate">
            							<td>Fill the correct address<br> 
                                            @if(!is_null(Auth::user()->address))
                                            <p id="alamat">{{Auth::user()->address}}</p>
                                            <a data-toggle="modal" data-target="#mymodal" ><span class="fa fa-pencil"></span></a>
                                            @else
                                            <p>Your Address</p>
                                            <a data-toggle="modal" data-target="#mymodal" ><span class="fa fa-pencil"></span></a>
                                            @endif
                                        </td>
            							<td>&nbsp;</td>
            						</tr>

            						<tr class="summary-total">
            							<td>Total:</td>
            							<td>${{$total}}</td>
            						</tr>
            					</tbody>
            				</table>

            				<button onclick="pro()" class="btn btn-outline-primary-2"  data-content="Please enter you address before proccess to checkout" data-toggle="popover" data-placement="top" >PROCEED TO CHECKOUT</button>
                            </form>
            			</div><!-- End .summary -->

            			<a href="product" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
            		</aside><!-- End .col-lg-3 -->
            	</div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

<div id="mymodal"  class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="">Input Your Address</h4>
          </div>
          <form method="post" action="update_address">
            @csrf
          <div class="modal-body" style="padding: 10%;">
            <textarea placeholder="Input your address here......" class="form-control" name="address"></textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
          </form>
        </div>

    </div>
</div>
<script type="text/javascript">
    var almt = document.getElementById('alamat');
    function pro(){
        if (almt!=null) {
            $('#bill').submit();
        }else{
            $('[data-toggle="popover"]').popover();
            $(window).scrollTop(0);
            $('#noaddr').show();
        } 
    }

</script>