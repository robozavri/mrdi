@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/water_supply_companies') }}">Water supply company</a> :
@endsection
@section("contentheader_description", $water_supply_company->$view_col)
@section("section", "Water supply companies")
@section("section_url", url(config('laraadmin.adminRoute') . '/water_supply_companies'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Water supply companies Edit : ".$water_supply_company->$view_col)

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
				{!! Form::model($water_supply_company, ['route' => [config('laraadmin.adminRoute') . '.water_supply_companies.update', $water_supply_company->id ], 'method'=>'PUT', 'id' => 'water_supply_company-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'project_title_number')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/water_supply_companies') }}">Cancel</a></button>
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
	$("#water_supply_company-edit-form").validate({
		
	});
});
</script>
@endpush
