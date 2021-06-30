
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">History</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
    	<div class="cart">
            <div class="container">
            	<div class="row">
            		<div class="col-lg-9">                    
            			<table class="table table-cart table-mobile">
							<thead>
								<tr>
									
									<th>Invoice</th>
									<th>Product Name</th>
									<th>Total</th>
									<th>Status</th>
								</tr>
							</thead>

							<tbody>
                                @foreach($order as $key)
                                @php 
                                
                                $brng = encrypt($key->product);
                                @endphp
								<tr>
									
									<td class="product-col"><b>{{$key->invoice}}</b></td>
									<td ><b>{{$key->product}}</b></td>
									<td class="total-col">${{$key->total}}
                                    </td>
									<td>
                                        @if($key->status==1)
                                        <i class="fa fa-truck"></i> <span style="color: #FC9924">On Proccess</span>
                                        @else
                                        <i class="fa fa-check-square"></i><span style="color: #00DF2A">Done</span>
                                        @endif
                                    </td>
								</tr>
                                @endforeach
							</tbody>
						</table>
            		</div><!-- End .col-lg-9 -->
            		
            	</div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
