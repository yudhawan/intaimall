<div class="col-xs-12">
										<h3 class="header smaller lighter blue">Category</h3>
										<a href="#modal-add" role="button" class="btn btn-sm btn-primary" data-toggle="modal">
										    <span class="fa fa-plus"></span> Add Category
										</a>
										<a href="#modal-addb" role="button" class="btn btn-sm btn-success" data-toggle="modal">
										    <span class="fa fa-plus"></span> Add Sub Category
										</a>
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											All of Category
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th style="display: none;" class="center"></th>
														<th>#</th>
														<th>Category</th>
														<th>Sub Category</th>
														<th class="hidden-480">Option</th>
														<th style="display: none;"></th>
														<th style="display: none;" class="hidden-480"></th>
														<th style="display: none;"></th>
													</tr>
												</thead>

												<tbody>
													@php $no=1 @endphp
													@for($i=0; $i < count($final); $i++)
													
													<tr>
														<td style="display: none;" class="center"></td>
														<td>{{$no++}}</td>
														<td>{{ $final[$i]['name'] }}</td>
														
														<td><div class="hidden-sm hidden-xs action-buttons">
																<a class="class btn btn-xs btn-warning" href="#modal-sub{{ $final[$i]['id'] }}" role="button" data-toggle="modal">
																	<i class="ace-icon fa fa-eye bigger-130"></i>
																</a>
															</div>
														</td>
														
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="class btn btn-xs btn-success" href="#modal-form{{ $final[$i]['id'] }}" role="button" data-toggle="modal">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="class btn btn-xs btn-danger" href="/delete/{{ $final[$i]['id'] }}/category">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>
														</td>
														<td style="display: none;"></td>
														<td style="display: none;" class="hidden-480"></td>
														<td style="display: none;"></td>
													</tr>
													@endfor
												</tbody>
											</table>
										</div>
</div>
<!--modal edit-->
@foreach ($category as $c)
<div id="modal-form{{$c->category_id}}" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Update Category</h4>
			</div>
			<form action="/update_cat" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="row">
					
						@csrf
						<input type="hidden" class="form-control" name="category_id" value="{{$c->category_id}}" required="true">
						<input type="text" class="form-control" name="category" value="{{$c->category_name}}" placeholder="Category"><br>
					
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
				<h4 class="blue bigger">Add Category</h4>
			</div>
			<form action="/add_category" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="row">
					
						@csrf
						<input type="text" id="name" class="form-control" name="category" placeholder="Category" required="true"><br>
					
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

<div id="modal-addb" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Add Sub Category</h4>
			</div>
			<form action="/add_sub_cat" method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="row">
					
						@csrf
						<h3>Select the Category</h3>
						<select name="category" class="form-control">
							@foreach($category as $key)
							<option value="{{ $key->category_id }}">{{ $key->category_name }}</option>
							@endforeach
						</select> <br>
						<input type="text" id="name" class="form-control" name="sub_cat" placeholder="Sub Category" required="true"><br>
					
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
@for ($i=0; $i < count($final); $i++)
<div id="modal-sub{{$final[$i]['id']}}" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">{{ $final[$i]['name'] }}</h4>
			</div>
			<div class="modal-body">
			<div class="row">
			<h2></h2>
			<div class="tags" style="margin: 10px;">
				@foreach($final[$i]['sub'] as $key)
				<span class="tag">
					{{ $key->sub }}
				</span>
				<button class="close"><a href="delete/{{ $key->id }}/sub_cat">x</button><br>
				@endforeach
			</div>
			</div>
			</div>
		</div>
	</div>
</div><!-- PAGE CONTENT ENDS -->
@endfor