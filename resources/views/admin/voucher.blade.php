<div class="col-xs-12">
										<h3 class="header smaller lighter blue">Voucher</h3>
										<a href="#modal-add" role="button" class="btn btn-sm btn-primary" data-toggle="modal">
										    <span class="fa fa-plus"></span> Add Voucher
										</a>
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											All of Voucher
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th style="display: none;" class="center"></th>
														<th>#</th>
														<th>Voucher</th>
														<th class="hidden-480">Description</th>
														<th>Amount</th>
														<th class="hidden-480">Option</th>
														<th style="display: none;"></th>
													</tr>
												</thead>

												<tbody>
													@php $no=1 @endphp
													@foreach($voucher as $key)
													<tr>
														<td style="display: none;" class="center"></td>
														<td>{{$no++}}</td>
														<td>{{$key->name}}</td>
														<td>{{$key->des}}</td>
														<td style="display: none;" class="hidden-480"></td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="class btn btn-xs btn-success" href="#modal-form{{$key->category_id}}" role="button" data-toggle="modal">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="class btn btn-xs btn-danger" href="#">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>
														</td>
														
														
														<td style="display: none;"></td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
</div>
<!--modal edit-->
@foreach ($voucher as $c)
<div id="modal-form{{$c->id}}" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Update voucher</h4>
			</div>
			<form action="/update_vo" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="row">
					
						@csrf
						<input type="hidden" class="form-control" name="category_id" value="{{$c->id}}" required="true">
						<input type="text" class="form-control" name="name" value="{{$c->name}}" placeholder="Voucher Name"><br>
						<textarea class="ckeditor" id="ckeditor" name="des" placeholder="Description">{{$c->des}}</textarea>
						<input type="text" class="form-control" name="amount" value="{{$c->amount}}" placeholder="Amount"><br>
						<input type="file" class="form-control" name="img" value="{{$c->img}}" required="true"><br>
					
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
@endforeach
<div id="modal-add" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Add Voucher</h4>
			</div>
			<form action="/add_voucher" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="row">
					
						@csrf
						<input type="text" class="form-control" name="name"  placeholder="Voucher Name"><br>
						<textarea class="ckeditor" id="ckeditor" name="des" placeholder="Description"></textarea>
						<input type="text" class="form-control" name="amount"  placeholder="Amount"><br>
						<input type="file" class="form-control" name="img"  required="true"><br>
						<div class="show"></div>
						<script type="text/javascript">
							$(function(){
								var imagesPreview = function(input, placeToInsertImagePreview) {

						       	if (input.files) {
						           var filesAmount = input.files.length;

						           for (i = 0; i < filesAmount; i++) {
						               var reader = new FileReader();

						               reader.onload = function(event) {
						                   $($.parseHTML('<img style="width: 30%; height: 30%;" id="view'+i+'"><br>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
						               }
						               $('#del'+i).on('click', function(){
						                $('#view'+i).remove();
						               });
						               reader.readAsDataURL(input.files[i]);
						            }
						        }

						    	};

						    	$('#img').on('change', function() {
						        imagesPreview(this, 'div.show');
							});
						    });
						</script>
					
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-sm" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Cancel
				</button>
				<button class="btn btn-sm btn-primary">
					<i class="ace-icon fa fa-plus"></i>
					Add
				</button>
			</div>
			</form>
		</div>
	</div>
</div>
