@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/twotestmodules') }}">Twotestmodule</a> :
@endsection
@section("contentheader_description", $twotestmodule->$view_col)
@section("section", "Twotestmodules")
@section("section_url", url(config('laraadmin.adminRoute') . '/twotestmodules'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Twotestmodules Edit : ".$twotestmodule->$view_col)

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
				{!! Form::model($twotestmodule, ['route' => [config('laraadmin.adminRoute') . '.twotestmodules.update', $twotestmodule->id ], 'method'=>'PUT', 'id' => 'twotestmodule-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'proj_date')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/twotestmodules') }}">Cancel</a></button>
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
	$("#twotestmodule-edit-form").validate({
		
	});
});
</script>
@endpush
