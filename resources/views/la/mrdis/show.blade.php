@extends('la.layouts.app')

@section('htmlheader_title')
	Mrdi View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/mrdis') }}" data-toggle="tooltip" data-placement="right" title="Back to Mrdis"><i class="fa fa-chevron-left"></i></a></li>
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
						@la_display($module, 'region')
						@la_display($module, 'municipalitet')
						@la_display($module, 'project_title')
						@la_display($module, 'ganxorcielebis_adgili')
						@la_display($module, 'category')
						@la_display($module, 'project_expsne_doc')
						@la_display($module, 'gov_budget_local')
						@la_display($module, 'source_funding')
						@la_display($module, 'kind_of_job')
						@la_display($module, 'funding_year')
						@la_display($module, 'date_government_ordinance')
						@la_display($module, 'numer_government_ordinance')
						@la_display($module, 'year_compensation_amount')
						@la_display($module, 'mony_todo_project')
						@la_display($module, 'co_funding')
						@la_display($module, 'co_funding_procent')
						@la_display($module, 'buying_purchase')
						@la_display($module, 'current_tender_number')
						@la_display($module, 'tender_announcement_date')
						@la_display($module, 'date_completion_proposals')
						@la_display($module, 'date_signing_contract')
						@la_display($module, 'tender_status')
						@la_display($module, 'project_duration')
						@la_display($module, 'contractual_value')
						@la_display($module, 'contractual_value_rgpf')
						@la_display($module, 'job_start_date')
						@la_display($module, 'job_finish_date')
						@la_display($module, 'job_finish_date_deferreded')
						@la_display($module, 'actual_performance_procent')
						@la_display($module, 'actual_performance_lari')
						@la_display($module, 'cash_performance_cofinancing_lari')
						@la_display($module, 'cash_performance_only_rgpf')
						@la_display($module, 'Amount_transferred_municipality')
						@la_display($module, 'amount_transferred_by_municipality')
						@la_display($module, 'given_advance')
						@la_display($module, 'remaining_retirement')
						@la_display($module, 'acceptance_and_delivery')
						@la_display($module, 'note')
						@la_display($module, 'tender_winner_company_contact')
						@la_display($module, 'fine_amount')
						@la_display($module, 'quantitative_indicator')
						@la_display($module, 'count_beneficiaries_direct')
						@la_display($module, 'count_beneficiaries_undirect')
						@la_display($module, 'reg_economy')
						@la_display($module, 'adg_economy')
						@la_display($module, 'intensity_tender_failure')
						@la_display($module, 'Intensification_tender_appeal')
						@la_display($module, 'count_bidders_participating_tender')
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div>
	</div>
</div>
@endsection
