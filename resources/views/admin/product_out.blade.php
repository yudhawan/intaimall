<div class="col-xs-12">
										<div class="page-header">
							<h1>
								Product
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
							</h1>
						</div><!-- /.page-header -->
						<a href="/aproduct" role="button" class="btn btn-sm btn-danger">
              				<span class="fa fa-mail-reply"></span> Back To Product
            			</a>
            			
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											All Goods
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<form action="" method="post">
											@csrf
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>

														<th class="center" style="display: none;">
															</th>
														<th>Product Name</th>
														<th style="display: none;"></th>
														<th class="hidden-480">Price</th>
														<th >Category</th>
														<th class="hidden-480">Stock</th>
														<th>Option</th>
													</tr>
												</thead>

												<tbody>
													@for($i=0; $i < count($final); $i++)
													@foreach($final[$i]['category'] as $key)
													<tr>
														<td class="center" style="display: none;">
															
														</td>
														<td>{{$final[$i]['product_name']}}</td>
														<td style="display: none;"></td>
														<td>{{$final[$i]['price']}}</td>
														<td>{{$key->category_name}}</td>
														<td class="hidden-480">{{$final[$i]['stock']}}</td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																
																{{-- <a class="class btn btn-xs btn-success"  href="/aedit_product/{{$final[$i]['product_id']}}" role="button" data-toggle="modal">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a> --}}
																
																<a class="class btn btn-xs btn-danger" href="/delete/{{$final[$i]['product_id']}}/{{$table='product'}}" onclick="return confirm('Are you sure to delete this?')">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
																
																<a href="#modal-disc{{$final[$i]['product_id']}}" role="button" id="disc" data-toggle="modal" class="btn btn-sm btn-warning">
																  	<span class="fa fa-percent"></span>
																
																</a>
															</div></td>
													</tr>
													@endforeach
													@endfor
												</tbody>
											</table>
										</div>
										</form>
						</div>
@for($i=0; $i < count($final); $i++)
<div id="modal-disc{{$final[$i]['product_id']}}" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Discount %</h4>
			</div>
			<form action="/add_discount" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				
				<div class="form-group">
						@csrf
						<input type="hidden" class="form-control" name="product_id" value="{{$final[$i]['product_id']}}" required="true">
						<div>
							<h3>Discount Value</h3>
							<div class="input-group">
								<span class="input-group-addon"><i class="ace-icon fa fa-percent "></i></span><input type="number" class="col-xs-10 col-sm-5" name="discount" placeholder="Discount" required="true">
							</div>
						</div><br>
						
						<div>
							<h3>Time Duration</h3>
							<div class="input-group input-group-sm">
								<span class="input-group-addon"><i class="ace-icon fa fa-calendar "></i></span><input type="datetime-local" name="date"/>
							</div>
						</div><br>
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
</div>
@endfor