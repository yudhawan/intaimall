<div class="col-xs-12">
<h3 class="header smaller lighter blue">Discount</h3>

<div class="clearfix">
<div class="pull-right tableTools-container"></div>
</div>

<form action="/" method="post" enctype="multipart/form-data">
<div class="modal-body">
<!-- <div class="row">
	{{ csrf_field() }}
		<input type="text" name="product" class="dropdown" id="product" placeholder="Product Name">
		<div id="productlist"></div>
</div> -->
</div> 
</form>
<div class="table-header">
All of Discount
</div>

<!-- div.table-responsive -->

<!-- div.dataTables_borderWrap -->
<div>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			
			<th>#</th>
			<th>Name</th>
			<th>Price</th>
			<th class="hidden-480">Discount</th>
			<th class="center">Date Expiring</th>
			<th>Option</th>
		</tr>
	</thead>

	<tbody>
		@php $no=1 @endphp
		@for($i=0; $i < count($data); $i++)
		@foreach($data[$i]['product'] as $key)
		<tr>
			
			<td>{{$no++}}</td>
			<td>{{$key->product_name}}</td>
			<td class="hidden-480"><b>
				$@php
				$harga = $key->price;
				$discount = ($harga*$data[$i]['discount'])/100;
				$fix = $key->price-$discount;
				echo $fix;
				@endphp
			</b><br><strike>${{ $key->price }}</strike>
			</td>
			<td>{{ $data[$i]['discount'] }}%</td>

			<td class="center">
			<span class="fa fa-calendar"></span>
				@php 
				$date = date_create($data[$i]['date']);
				echo date_format($date,"d M Y");
				@endphp
			<br>
			<span class="fa fa-clock-o"></span>
				@php 
				$date = date_create($data[$i]['date']);
				echo date_format($date,"H:i");
				@endphp
			</td>
			<td>
				<div class="hidden-sm hidden-xs action-buttons">
					<a class="class btn btn-xs btn-success" href="#modal-form" role="button" onclick="edit({{$data[$i]['id']}},'{{$key->product_name}}',{{$data[$i]['discount']}},'{{ $data[$i]['date'] }}')" data-toggle="modal">
						<i class="ace-icon fa fa-pencil bigger-130"></i>
					</a>

					<a class="class btn btn-xs btn-danger" href="/delete/{{ $data[$i]['id'] }}/discount">
						<i class="ace-icon fa fa-trash-o bigger-130"></i>
					</a>
				</div>
			</td>
			
			
			<td style="display: none;"></td>
		</tr>
		@endforeach
		@endfor
	</tbody>
</table>
</div>
</div>

<!--modal edit-->

<div id="modal-form" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Update Discount</h4>
			</div>
			<form action="/update_disc" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="row" style="margin: 10px; padding: 5px;">
					
						@csrf
						<input type="hidden" class="form-control" id="product_id" name="product_id" required="true">
						<h2>Product Name</h2>
						<div class="input-group input-group-sm"><input type="text" class="form-control" disabled id="name" name="name"><br></div>
						<h2>Discount %</h2>
						<div class="input-group input-group-sm"><span class="input-group-addon"><i class="ace-icon fa fa-percent "></i></span><input type="number" class="col-xs-3 col-sm-5" id="discount" name="discount" placeholder="0"></div>
						<h2>Time Duration</h2><span class="label label-success arrowed" id="tgl"></span>
						<div class="input-group input-group-sm"><span class="input-group-addon"><i class="ace-icon fa fa-calendar "></i></span><input type="datetime-local" name="date"/>
							
						
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Cancel
				</button>
				<button class="btn btn-sm btn-primary" type="submit">
					<i class="ace-icon fa fa-check"></i>
					Save
				</button>
			</div>
			</form>
		</div>
	</div>
</div><!-- PAGE CONTENT ENDS -->


<script type="text/javascript">
	function edit(id,name, discount, tgl){
		$('#product_id').val(id);
		$('#name').val(name);
		$('#discount').val(discount);
		$('#tgl').text(tgl);

	}
</script>
 <script type="text/javascript">
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
						// for (var i = 0; i < data.length; i++) {
						// 	$('#productlist').html('<ul class="dropdown-menu" style="display:block; position:relative"><li><a href="#">'+data[i]['product_name']+'</a></li></ul')
						// }		
						
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