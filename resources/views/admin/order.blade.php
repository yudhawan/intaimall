<div class="col-xs-12">
<div class="page-header">
<h1>
Orders
<small>
<i class="ace-icon fa fa-angle-double-right"></i>

</small>
</h1>
</div><!-- /.page-header -->

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
			<th>Goods</th>
			<th>Phone</th>
			<th>total</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		@foreach($order as $user)
		
		<tr>
			<td style="display: none;" class="center"></td>
			<td>
				<b>{{ $user->invoice }}</b>
			</td>
			<td>{{ $user->name }}</td>

			<td>{{ $user->product }}</td>
			<td>{{ $user->phone }}</td>

			<td class="hidden-480">{{ $user->total }}</td>

			<td>
				@php
				$date = date_create($user->order_time);
				echo date_format($date, 'd M yy');
				@endphp
			</td>
			<td><a href="{{url('proccess_order')}}/{{$user->invoice}}" class="btn btn-primary"><i class="fa fa-truck"></i>Proccess</a></td>
		</tr>
		
		@endforeach
		
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
