
<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="/tambah" method="post" class="form-horizontal"  enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name </label>
										<input type="hidden" name="id" value="{{$product->product_id}}" />
										<div class="col-sm-9">
											<input type="text" id="form-field-1" name="name" value="{{$product->product_name}}" placeholder="Product Name" class="col-xs-10 col-sm-5" required="true" />
										</div>
									</div>
																		
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category </label>

										<div class="col-sm-9">
											<select name="cat_id" required="true">
												<option style="display: none;">{{$category_select->category_name}}</option>
												@foreach($category as $key)
												<option >{{$key->category_name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Price </label>

										<div class="col-sm-9">
											<div class="input-group">
											<span class="input-group-addon"><i class="ace-icon fa fa-dollar "></i></span><input type="number" class="col-xs-10 col-sm-5" value="{{$product->price}}" name="price" placeholder="Price" required="true">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Stock </label>

										<div class="col-sm-9">
											<div class="input-group">
											<span class="input-group-addon"><i class="ace-icon fa fa-at "></i></span><input type="number" class="col-xs-10 col-sm-5" name="stock" value="{{$product->stock}}" placeholder="Stock" required="true">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Discount </label>
											<div class="col-sm-4">
												<input id="disc" type="checkbox" class="ace ace-switch ace-switch-5" required="true">
												<span class="lbl middle"></span>
												<div id="discount"></div>
												<script type="text/javascript">
													var checkbox = document.getElementById('disc');
													var dis = $('#discount').empty();
													$(function(){
														checkbox.addEventListener('change', function(){
															if (checkbox.checked) {
																
																dis.append('<div class="input-group input-group-sm"><span class="input-group-addon"><i class="ace-icon fa fa-percent "></i></span><input type="number" id="des" class="col-xs-3 col-sm-5" name="discount" placeholder="0" required="true"></div>');
															}else{
																
																$('#discount').empty();
															}
														});
													});
												</script>
											</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Color </label>
											<div class="col-sm-4">
												@if($product->color!=NULL)
												@php $color = explode(',', $product->color) @endphp
												<input id="clr" type="checkbox" checked="checked" class="ace ace-switch ace-switch-5" />
												<span class="lbl middle"></span><br>
												@for($i=0; $i < count($color); $i++)
												<input type="color" class="form-control" id="color" value="{{$color[$i]}}" name="color[]" required="true"><br>
												@endfor
												@else
												<input id="clr" type="checkbox" class="ace ace-switch ace-switch-5" />
												<span class="lbl middle"></span><br>
												@endif
												
												<input type="color" class="form-control" id="color" style="display: none;" value="#ff0000" name="color[]" required="true"><br>
												
												<div id="form_color"></div>
												<input type="hidden" value="1" id="total">
												<span class="btn btn-success" style="display: none;" onclick="add()" id="plus"><i class="ace-icon fa fa-plus"></i>Add</span>
												<span class="btn btn-warning" style="display: none;" onclick="remove()" id="minus"><i class="ace-icon fa fa-minus"></i>Remove</span>
												<div id="inpt"></div>
												<script type="text/javascript">
													function add(){
														var total = parseInt($('#total').val())+1;
														var input = '<input type="color" class="color form-control" value="#ff0000" id="color'+total+'" name="color[]" required="true"><br>';
														$('#form_color').append(input);
														$('#total').val(total);
													}
													function remove(){
														var ttl = $('#total').val();
														if (ttl>1) 
														{
															$('#color'+ttl).remove();
															$('#total').val(ttl-1);
														}
													}

												</script>
												<div id="frag"></div>
													
												<script type="text/javascript">
													var clr = document.getElementById('clr');
													var frag = $('#frag').empty();
													
													$(function(){
														clr.addEventListener('change', function(){
															if (clr.checked) {
																$('#color').show();
																
																$('#plus').show();
																$('#minus').show();
															}else{
																$('#color').hide();
																$('.color').hide();
																$('#plus').hide();
																$('#minus').hide();
															}
														});
													});
												</script>
											</div>
									</div>
									<div class="form-group no-margin-bottom">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Images </label>

										<div class="col-sm-9">
											<div id="form-attachments">
											<input type='file' id='img' multiple name='attachment[]' required="true">
											</div>
											<div class="sh"></div>
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
									</div><br>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Description </label>

										<div class="col-sm-9">
											<textarea class="ckeditor" id="ckeditor" name="description" placeholder="Description">{{$product->description}}</textarea>
										</div>
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<input type="submit" class="btn btn-success">
											<button class="btn btn-info" type="reset" value="Reset">
												<i class="ace-icon fa fa-refresh"></i>
												Reset
											</button>
										</div>
									</div>

									
								</form>

								
</div><!-- /.col -->
