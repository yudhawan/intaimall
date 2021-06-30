<div class="col-xs-12">
<div class="page-header">
<h1>
Data
<small>
<i class="ace-icon fa fa-angle-double-right"></i>

</small>
</h1>
</div><!-- /.page-header -->
<a href="#view" role="button" class="btn btn-sm btn-primary" data-toggle="modal">
<span class="fa fa-eye"></span> View Data
</a>
<a onclick="po()" role="button" class="btn btn-sm btn-warning" data-toggle="modal">
<span class="fa fa-print"></span> Print Data
</a>
<a onclick="ex()" role="button" class="btn btn-sm btn-success" data-toggle="modal">
<span class="fa fa-file-excel-o"></span> Export Data
</a>
<div class="clearfix">
<div class="pull-right tableTools-container"></div>
</div>
<div class="table-header">
Orders Detail
</div>

<!-- div.table-responsive -->

<!-- div.dataTables_borderWrap -->
<div>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th style="display: none;" class="center"></th>
			<th>Invoice</th>
			<th>Username</th>
			
			<th>Phone</th>
			<th>total</th>
			<th>Date</th>
			
		</tr>
	</thead>

	<tbody>
		@for($i=0; $i < count($order); $i++)
		@foreach($order[$i]['user_id'] as $user)
		
		<tr>
			<td style="display: none;" class="center"></td>
			<td>
				<a href="#details" role="button" data-toggle="modal">{{ $order[$i]['invoice'] }}</a>
			</td>
			<td>{{ $user->name }}</td>

			<td style="display: none;" ></td>
			<td>{{ $user->phone }}</td>

			<td class="hidden-480">{{ $order[$i]['total'] }}</td>

			<td>
				@php
				$date = date_create($order[$i]['order_time']);
				echo date_format($date, 'd M yy');
				@endphp
			</td>
			
		</tr>
		
		@endforeach
		@endfor
	</tbody>
</table>
</div>
</div>

<div id="view" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">View Data</h4>
			</div>

			<div class="modal-body">
						<h3>Select Month</h3>
						<input type="month" id="bulan" name="month">
						<button type="submit" id="submit">Submit</button>
					
			</div>

									
		</div>
	</div>
</div><!-- PAGE CONTENT ENDS -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#submit').click(function() {
			var bulan = $('#bulan').val();
			var a = document.createElement('a');
			a.href = "data/"+bulan;
			document.body.appendChild(a).click();
			
		});	
	});
</script>


<div style="display: none;" id="print">
<div class="clearfix">
	<div class="pull-right tableTools-container"></div>
</div>
<div class="table-header">
	Data Selling Goods
</div>
<div>
	<table id="dynamic-table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">No.</th>
				<th>Invoice</th>
				<th>Username</th>
				<th>Phone</th>
				<th>total</th>
				<th>Date</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				@php $no=1 @endphp
				@for($i=0; $i < count($order); $i++)
				@foreach($order[$i]['user_id'] as $user)
				
				<tr>
					<td class="center">{{ $no++ }}</td>
					<td>
						{{ $order[$i]['invoice'] }}
					</td>
					<td>{{ $user->name }}</td>

					<td style="display: none;" ></td>
					<td>{{ $user->phone }}</td>

					<td class="hidden-480">{{ $order[$i]['total'] }}</td>

					<td>
						@php
						$date = date_create($order[$i]['order_time']);
						echo date_format($date, 'd-m-yy');
						@endphp
					</td>
				</tr>
				
				@endforeach
				@endfor
			</tr>

		</tbody>
	</table>
</div>
</div>

<script type="text/javascript">
	function po(){
		var co = document.getElementById('print').innerHTML;
		var ori = document.body.innerHTML;

		document.body.innerHTML = co;
		window.print();
		document.body.innerHTML = ori;
	}
	function ex(){
		$('#print').table2excel({
			filename: 'Orders.xls'
		})
	}
</script>