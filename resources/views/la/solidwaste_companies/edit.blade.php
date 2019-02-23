@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/solidwaste_companies') }}">SolidWaste company</a> :
@endsection
@section("contentheader_description", $solidwaste_company->$view_col)
@section("section", "SolidWaste companies")
@section("section_url", url(config('laraadmin.adminRoute') . '/solidwaste_companies'))
@section("sub_section", "Edit")

@section("htmlheader_title", "SolidWaste companies Edit : ".$solidwaste_company->$view_col)

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
				{!! Form::model($solidwaste_company, ['route' => [config('laraadmin.adminRoute') . '.solidwaste_companies.update', $solidwaste_company->id ], 'method'=>'PUT', 'id' => 'solidwaste_company-edit-form']) !!}
					 @la_form($module) 
					
					{{--
					@la_input($module, 'project_title')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/solidwaste_companies') }}">Cancel</a></button>
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
	$("#solidwaste_company-edit-form").validate({
		
	});
});
</script>
@endpush
