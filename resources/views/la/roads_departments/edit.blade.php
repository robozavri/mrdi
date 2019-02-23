@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/roads_departments') }}">Roads Department</a> :
@endsection
@section("contentheader_description", $roads_department->$view_col)
@section("section", "Roads Departments")
@section("section_url", url(config('laraadmin.adminRoute') . '/roads_departments'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Roads Departments Edit : ".$roads_department->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($roads_department, ['route' => [config('laraadmin.adminRoute') . '.roads_departments.update', $roads_department->id ], 'method'=>'PUT', 'id' => 'roads_department-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'dasakheleba')
					@la_input($module, 'dafinansebis_tsqaro')
					@la_input($module, 'kontraktori_kompania')
					@la_input($module, 'sakhelshekrulebo_ghirebuleba_atasi_lari')
					@la_input($module, 'shesruleba_nazardi_jamit_atasi_lari')
					@la_input($module, 'nashti')
					@la_input($module, 'datsqeba')
					@la_input($module, 'dasruleba')
					@la_input($module, 'shenishvna')
					@la_input($module, 'category')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/roads_departments') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#roads_department-edit-form").validate({
		
	});
});
</script>
@endpush
