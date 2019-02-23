@extends('la.layouts.app')

@section('htmlheader_title')
	Roads Department View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/roads_departments') }}" data-toggle="tooltip" data-placement="right" title="Back to Roads Departments"><i class="fa fa-chevron-left"></i></a></li>
		<li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-general-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
		
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active fade in" id="tab-info">
			<div class="tab-content">
				<div class="panel infolist">
					<div class="panel-default panel-heading">
						<h4>General Info</h4>
					</div>
					<div class="panel-body">
						@la_display($module, 'dasakheleba')
						@la_display($module, 'dafinansebis_tsqaro')
						@la_display($module, 'kontraktori_kompania')
						@la_display($module, 'sakhelshekrulebo_ghirebuleba_atasi_lari')
						@la_display($module, 'shesruleba_nazardi_jamit_atasi_lari')
						@la_display($module, 'nashti')
						@la_display($module, 'datsqeba')
						@la_display($module, 'dasruleba')
						@la_display($module, 'shenishvna')
						@la_display($module, 'category')
						@la_display($module, 'status')
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div>
	</div>
</div>
@endsection
