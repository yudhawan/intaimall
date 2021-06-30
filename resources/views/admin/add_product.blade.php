
<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="/tambah" method="post" class="form-horizontal"  enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Product Name </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" name="name" placeholder="Product Name" class="col-xs-10 col-sm-5" required="true" />
										</div>
									</div>
																		
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Category </label>

										<div class="col-sm-9">
											<select name="cat_id" id="cat" required="true">
												<option value="-">---/---</option>
												@for($i=0; $i < count($final); $i++)
												<option value="{{ $final[$i]['id'] }}">{{$final[$i]['name']}}</option>
												@endfor
											</select>
										</div>
									</div>
									<script type="text/javascript">
										$(document).ready(function () {
											$('#cat').change(function() {
												var sel = $(this).children('option:selected').val();
												if (sel) {
													//$("#subsel").find('option').prop('selected', 'selected');
													$(".subb").hide();
													$("#sub"+sel).show();
													$('#subsel'+sel).change(function() {
														var sl = $(this).children('option:selected').val();
														console.log(sel);
														console.log(sl);
													});
												}	
											});

											
										});
									</script>
									@for($i=0; $i < count($final); $i++)
									
									<div class="form-group subb" id="sub{{ $final[$i]['id'] }}" style="display: none">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sub Category </label>

										<div class="col-sm-9">
											<select name="sub{{ $final[$i]['id'] }}" id="subsel{{ $final[$i]['id'] }}">
												<option>---/---</option>
												@foreach($final[$i]['sub'] as $key)
												<option value="{{ $key->id }}">{{$key->sub}}</option>
												@endforeach
											</select>											
										</div>
									</div>
									@endfor
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Price </label>

										<div class="col-sm-9">
											<div class="input-group">
											<span class="input-group-addon"><i class="ace-icon fa fa-dollar "></i></span><input type="number" class="col-xs-10 col-sm-5" name="price" placeholder="Price" required="true">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Stock </label>

										<div class="col-sm-9">
											<div class="input-group">
											<span class="input-group-addon"><i class="ace-icon fa fa-at "></i></span><input type="number" class="col-xs-10 col-sm-5" name="stock" placeholder="Stock" required="true">
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Color </label>
											<div class="col-sm-4">
												<input id="clr" type="checkbox" class="ace ace-switch ace-switch-5" />
												<span class="lbl middle"></span><br>
											
												
												<input type="color" class="input-small form-control" id="color" style="display: none;" value="#ff0000" name="color[]" required="true">
												
												<div id="form_color"></div>
												<input type="hidden" value="1" id="total">
												<span class="btn btn-success" style="display: none;" onclick="add()" id="plus"><i class="ace-icon fa fa-plus"></i>Add</span>
												<span class="btn btn-warning" style="display: none;" onclick="remove()" id="minus"><i class="ace-icon fa fa-minus"></i>Remove</span>
												<div id="inpt"></div>
												<script type="text/javascript">
													function add(){
														var total = parseInt($('#total').val())+1;
														var input = '<input type="color" class="input-small form-control" value="#ff0000" id="color'+total+'" name="color[]" required="true">';
														$('#form_color').append(input);
														$('#total').val(total);
													}
													function remove(){
														var ttl = $('#total').val();
														if (ttl>1) 
														{
															$('#color'+ttl).remove();
															$('#total').val(ttl-1);
															$('#sp').remove();
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
											<input type='file' id='img' multiple name='attachment[]'>
											</div>
											<div class="show" style="border: 1px solid #C4BFBF; padding: 5px; margin:2px; "></div>
											<script type="text/javascript">
												
												$(function(){
													var dropIndex;
													        $(".show").sortable({
													            	update: function(event, ui) { 
													            		dropIndex = ui.item.index();
													            }
													        });
													var imagesPreview = function(input, placeToInsertImagePreview) {

       												if (input.files) {
            										var filesAmount = input.files.length;

            										for (i = 0; i < filesAmount; i++) {
                										var reader = new FileReader();

                										reader.onload = function(event) {
                    										$($.parseHTML('<img  style="width: 30%; height: 30%;" id="view'+i+'">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
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
											<textarea class="ckeditor" id="ckeditor" name="description" placeholder="Description"></textarea>
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
