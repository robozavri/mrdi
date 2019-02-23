@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/mrdis') }}">Mrdi</a> :
@endsection
@section("contentheader_description", $mrdi->$view_col)
@section("section", "Mrdis")
@section("section_url", url(config('laraadmin.adminRoute') . '/mrdis'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Mrdis Edit : ".$mrdi->$view_col)

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
				{!! Form::model($mrdi, ['route' => [config('laraadmin.adminRoute') . '.mrdis.update', $mrdi->id ], 'method'=>'PUT', 'id' => 'mrdi-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'region')
					@la_input($module, 'municipalitet')
					@la_input($module, 'project_title')
					@la_input($module, 'ganxorcielebis_adgili')
					@la_input($module, 'category')
					@la_input($module, 'project_expsne_doc')
					@la_input($module, 'gov_budget_local')
					@la_input($module, 'source_funding')
					@la_input($module, 'kind_of_job')
					@la_input($module, 'funding_year')
					@la_input($module, 'date_government_ordinance')
					@la_input($module, 'numer_government_ordinance')
					@la_input($module, 'year_compensation_amount')
					@la_input($module, 'mony_todo_project')
					@la_input($module, 'co_funding')
					@la_input($module, 'co_funding_procent')
					@la_input($module, 'buying_purchase')
					@la_input($module, 'current_tender_number')
					@la_input($module, 'tender_announcement_date')
					@la_input($module, 'date_completion_proposals')
					@la_input($module, 'date_signing_contract')
					@la_input($module, 'tender_status')
					@la_input($module, 'project_duration')
					@la_input($module, 'contractual_value')
					@la_input($module, 'contractual_value_rgpf')
					@la_input($module, 'job_start_date')
					@la_input($module, 'job_finish_date')
					@la_input($module, 'job_finish_date_deferreded')
					@la_input($module, 'actual_performance_procent')
					@la_input($module, 'actual_performance_lari')
					@la_input($module, 'cash_performance_cofinancing_lari')
					@la_input($module, 'cash_performance_only_rgpf')
					@la_input($module, 'Amount_transferred_municipality')
					@la_input($module, 'amount_transferred_by_municipality')
					@la_input($module, 'given_advance')
					@la_input($module, 'remaining_retirement')
					@la_input($module, 'acceptance_and_delivery')
					@la_input($module, 'note')
					@la_input($module, 'tender_winner_company_contact')
					@la_input($module, 'fine_amount')
					@la_input($module, 'quantitative_indicator')
					@la_input($module, 'count_beneficiaries_direct')
					@la_input($module, 'count_beneficiaries_undirect')
					@la_input($module, 'reg_economy')
					@la_input($module, 'adg_economy')
					@la_input($module, 'intensity_tender_failure')
					@la_input($module, 'Intensification_tender_appeal')
					@la_input($module, 'count_bidders_participating_tender')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/mrdis') }}">Cancel</a></button>
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
	$("#mrdi-edit-form").validate({
		
	});
});
</script>
@endpush
