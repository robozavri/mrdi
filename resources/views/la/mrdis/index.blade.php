@extends("la.layouts.app")

@section("contentheader_title", "Mrdis")
@section("contentheader_description", "Mrdis listing")
@section("section", "Mrdis")
@section("sub_section", "Listing")
@section("htmlheader_title", "Mrdis Listing")

@section("headerElems")
@la_access("Mrdis", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Mrdi</button>
@endla_access
@endsection

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

<div class="box box-success">


<!-- ფილტრები hotkeys -->
	<div class="box-header"> 

<div class="sandro">
 

<ul>
		
		<li><a href="#">ადგილმდებარეობა</a>
<ul class="horizontalList">
                <li><a field="region" class="search-btn" href="#">იმერეთი</a>
					<ul>
						<li><a class="search-btn" field="municipalitet" href="#">ბაღდათი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ვანი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ზესტაფონი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">თერჯოლა</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">სამტრედია</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">საჩხერე</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ტყიბული</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ქ. ქუთაისი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">წყალტუბო</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ჭიათურა</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ხარაგაული</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ხონი</a></li>
					</ul>
				</li>
				
				<li><a field="region" class="search-btn" href="#">სამეგრელო-ზემო სვანეთი</a>
					<ul>
						<li><a class="search-btn" field="municipalitet" href="#">აბაშა</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ზუგდიდი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">მარტვილი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">მესტია</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">სენაკი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ქ.ფოთი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ჩხოროწყუ</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">წალენჯიხა</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ხობი</a></li>
					</ul>
				</li>

				<li><a field="region" class="search-btn" href="#">კახეთი</a>
					<ul>
						<li><a class="search-btn" field="municipalitet" href="#">ახმეტა</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">გურჯაანი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">დედოფლისწყარო</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">თელავი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ლაგოდეხი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">საგარეჯო</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">სიღნაღი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ყვარელი</a></li>
					</ul>
				</li>

                <li><a field="region" class="search-btn" href="#">სამცხე-ჯავახეთი</a>
					<ul>
						<li><a class="search-btn" field="municipalitet" href="#">ადიგენი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ასპინძა</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ახალქალაქი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ახალციხე</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ბორჯომი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ნინოწმინა</a></li>
					</ul>
				</li>

				<li><a field="region" class="search-btn" href="#">ქვემო ქართლი</a>
					<ul>
						<li><a class="search-btn" field="municipalitet" href="#">ბოლნისი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">გარდაბანი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">დმანისი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">თეთრიწყარო</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">მარნეული</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ქ. რუსთავი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">წალკა</a></li>
					</ul>
				</li>

                <li><a field="region" class="search-btn" href="#">შიდა ქართლი</a>
					<ul>
						<li><a class="search-btn" field="municipalitet" href="#">გორი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">კასპი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ქარელი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ხაშური</a></li>
					</ul>
				</li>

				<li><a field="region" class="search-btn" href="#">მცხეთა-მთიანეთი</a>
					<ul>
						<li><a class="search-btn" field="municipalitet" href="#">დუშეთი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">თიანეთი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">მცხეთა</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ყაზბეგი</a></li>
					</ul>
				</li>

				<li><a field="region" class="search-btn" href="#">რაჭა-ლეჩხუმ ქვემო სვანეთი</a>
					<ul>
						<li><a class="search-btn" field="municipalitet" href="#">ამბროლაური</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ონი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ლენტეხი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ცაგერი</a></li>
					</ul>
				</li>

	            <li><a field="region" class="search-btn" href="#">გურია</a>
					<ul>
						<li><a class="search-btn" field="municipalitet" href="#">ლანჩხუთი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ოზურგეთი</a></li>
						<li><a class="search-btn" field="municipalitet" href="#">ჩოხატაური</a></li>
					</ul>
				</li>
			</ul>
		</li>

		<li><a id = "meore" href="#">სამუშაოს ტიპი</a>
			<ul>
		<li><a class="search-btn" field="category" href="#">გზები</a></li>
 <li>   	<a class="search-btn" field="category" href="#">წყალმომარაგება</a></li>
    <li>	<a class="search-btn" field="category" href="#">საბავშო ბაღები</a></li>
   	 <li>   <a class="search-btn" field="category" href="#">სპორტული ინფრასტრუქტურა</a></li>
 <li> 	    <a class="search-btn" field="category" href="#">სტადიონი</a></li>
  	 <li>   <a class="search-btn" field="category" href="#">მრავალბინიანი კორპუსები</a></li>
	<li>    <a class="search-btn" field="category" href="#">კულტურის ობიექტები</a></li>
	<li>    <a class="search-btn" field="category" href="#">სანიაღვრე სისტემები</a></li>
	  <li>  <a class="search-btn" field="category" href="#">ხიდები</a></li>
	  <li>  <a class="search-btn" field="category" href="#">ნაპირსამაგრი</a></li>
	<li>    <a class="search-btn" field="category" href="#">კანალიზაცია</a></li>
<li>	    <a class="search-btn" field="category" href="#">დასვენების ობიექტები</a></li>
	 <li>   <a class="search-btn" field="category" href="#">შენობა-ნაგებობა</a></li>
	    <li><a class="search-btn" field="category" href="#">კეთილმოწყობა</a></li>
	 <li>   <a class="search-btn" field="category" href="#">გარე განათება</a></li>
	 <li>   <a class="search-btn" field="category" href="#">სპეც.ტექნიკა</a></li>
	   <li> <a class="search-btn" field="category" href="#">საირიგაციო სისტემები</a></li>
	   <li> <a class="search-btn" field="category" href="#">ლიფტები</a></li>
	   <li> <a class="search-btn" field="category" href="#">სკოლები</a></li>
	   <li> <a class="search-btn" field="category" href="#">წისქვილების რეაბილიტაცია</a></li>
	   <li> <a class="search-btn" field="category" href="#">სასაფლაოს შემოღობვა</a></li>
	   <li> <a class="search-btn" field="category" href="#">თავშეყრის ადგილები</a></li>
	   <li> <a class="search-btn" field="category" href="#">ცხაურები</a></li>
	   <li> <a class="search-btn" field="category" href="#">ხიდბოგირები</a></li>
	   <li> <a class="search-btn" field="category" href="#">გადასასვლელები</a></li>
	   <li> <a class="search-btn" field="category" href="#">ამბულატორიის შენობები</a></li>
	   <li> <a class="search-btn" field="category" href="#">სარწყავი სისტემები</a></li>
	   <li> <a class="search-btn" field="category" href="#">წყაროების მოპირკეთება</a></li>
	   <li> <a class="search-btn" field="category" href="#">სხვა</a></li>	
     </ul>
</li>

	<li><a id="mesame" href="#">ბიუჯეტი</a>
    <ul>
        <li><a class="search-btn" field="gov_budget_local" href="#">სახელმწიფო ბიუჯეტი</a></li>
        <li><a class="search-btn" field="gov_budget_local" href="#">ადგილობრივი ბიუჯეტი</a></li>
	</ul>
</li>



<li><a id="meotxe" href="#">პროექტის კატეგორია</a>

<ul>
	<li><a class="search-btn" field="source_funding" href="#">რეგ. ფონდი</a></li>
    <li><a class="search-btn" field="source_funding" href="#">სტიქია</a></li>
    <li><a class="search-btn" field="source_funding" href="#">მთის ფონდი</a></li>
    <li><a class="search-btn" field="source_funding" href="#">სოფლის მხარდჭერის პროგრამა</a></li>
    <li><a class="search-btn" field="source_funding" href="#">ადგილობრივი ბიუჯეტი</a></li>
    <li><a class="search-btn" field="source_funding" href="#">გრანტი</a></li>
   
	</ul>
</li>

<li><a id="mexute" href="#">ტენდერის სტატუსი</a>

<ul>

	<li><a class="search-btn" field="tender_status" href="#">არ არის გამოცხადებული</a></li>
   <li> <a class="search-btn" field="tender_status" href="#">გამოცხადებულია</a></li>
  <li>  <a class="search-btn" field="tender_status" href="#">შერჩევა/შეფასება</a></li>
   <li> <a class="search-btn" field="tender_status" href="#">გამარჯვებული გამოვლენილია</a></li>
   <li> <a class="search-btn" field="tender_status" href="#">მიმდინარეობს ცელშეკრულების მომზადება</a></li>
  <li>  <a class="search-btn" field="tender_status" href="#">ხელშეკრულება დადებულია</a></li>
   <li> <a class="search-btn" field="tender_status" href="#">არ შედგა</a></li>
   <li> <a class="search-btn" field="tender_status" href="#">დასრულდა უარყოფითი შედეგით</a></li>
    <li><a class="search-btn" field="tender_status" href="#">შეწყვეტილია</a></li>

</ul>
</li>

	</ul>

</div>
        <a href="{{ route('merdiExcelExport') }}">ბაზაში არსებული ყველა ჩანაწერის ექსპორტი Excel ში </a>
</div>

<style type="text/css">
    .activeitem {
        background: #18191a;
        background: linear-gradient(top, #18191a 0%, #5f6975 40%);
        background: -moz-linear-gradient(top, #18191a 0%, #5f6975 40%);
        background: -webkit-linear-gradient(top, #18191a 0%,#5f6975 40%);
    }
    
	/* sandro Button */
.sandro {
  position: relative;
  display: inline-block;
z-index: +1 !important; 
margin-left: 12px;

}
.sandro ul ul {
	display: none;
}

	.sandro ul li:hover > ul {
		display: block;
	}

.sandro ul {
	background: #efefef; 
	background: linear-gradient(top, #efefef 0%, #bbbbbb 100%);  
	background: -moz-linear-gradient(top, #efefef 0%, #bbbbbb 100%); 
	background: -webkit-linear-gradient(top, #efefef 0%,#bbbbbb 100%); 
	box-shadow: 0px 0px 9px rgba(0,0,0,0.15);
	padding: 0 20px;
	border-radius: 10px;  
	list-style: none;
	position: relative;
	display: inline-table;

}
	.sandro ul:after {
		content: ""; clear: both; display: block;
	}

	.sandro ul li {
		float: left;

	}
		.sandro ul li:hover {
			background: #4b545f;
			background: linear-gradient(top, #4f5964 0%, #5f6975 40%);
			background: -moz-linear-gradient(top, #4f5964 0%, #5f6975 40%);
			background: -webkit-linear-gradient(top, #4f5964 0%,#5f6975 40%);

		}
			.sandro ul li:hover a {
				color: #fff;
			}
		
		.sandro ul li a {
			display: block; padding: 25px 41px;
			color: #757575; text-decoration: none;
		}
			
		
	.sandro ul ul {
		background: #5f6975; border-radius: 0px; padding: 0;
		position: absolute; top: 100%;
	}
		.sandro ul ul li {
			float: none; 
			border-top: 1px solid #6b727c;
			border-bottom: 1px solid #575f6a; position: relative;
		}
			.sandro ul ul li a {
				padding: 8px 15px;
				color: #fff;
			}	
				.sandro ul ul li a:hover {
					background: #4b545f;
				}
		
	.sandro ul ul ul {
		position: absolute; left: 100%; top:0;
	}
		
/* sandro Content (Hidden by Default) */


.modal {
    background: rgba(0, 0, 0, 0.8);
}


.sumOfmonyTodoProject{

	font-size:  15px;
	text-align: center;
	color: darkblue;
}
      
      #meore {
      	padding-right: 91px;
      }    
 
      #mesame {
      	
      	padding-right: 86px;
      }    
 
 #meotxe{
 	padding-right: 59px;
 }
 #mexute{
 	padding-right: 145px;
 	
 }

</style>



<div class="panel panel-default">
     <div class="row" style="margin-left:15px;">
        <h4 class="sumAmount"></h4>
        <h4 class="projectAmount"></h4>
    </div>
  <div class="panel-body parametrs">
 
  </div>
</div>
<!-- მთავრდება ჰოთქეიზ -->

	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Actions</th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("Mrdis", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Mrdi</h4>
			</div>
			{!! Form::open(['action' => 'LA\MrdisController@store', 'id' => 'mrdi-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
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
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"/>-->


@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>

<!--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script>

   var params = {};
   var table;
    
    //გამოვიტანოთ არჩეული პარამეტრები თეგების სახით
    function extractParams(){
           
        $('.parametrs').empty();
                
        Object.keys(params).forEach(function(key) {
             $('.parametrs').append('<button onclick="removeEl(this)" class="choosParam btn btn-default" field="'+key+'">'+params[key]+' <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>');
        });
    }
   
    // სერვერიდან იღებს ჯამურ მონაცემებს იმ პარამეტრების საფუძველზე რითიც ცხრილი დაიფილტრა
    function getBudgetSums(){
        
        if (Object.keys(params).length == 0){
            return;
        }
        
          $.ajax({
               url  : "{{ route('getBudgetSums') }}",
               type : "GET",
               data : { params : params },
            success :  function(data){
                
                $('.sumAmount').empty();
                $('.sumAmount').append('პროექტის ჯამური ღირებულება 2019 წლის ასიგნებებით : ' + data[0].sumAmount)
                $('.projectAmount').empty();
                $('.projectAmount').append('სახელმწიფო ბიუჯეტის წილი (თანხა) : ' + data[0].projectAmount);
            },
              error :  function(data){},
         beforeSend :  function(data){},
           complete :  function(data){
           }
    });
    }
    
    
    
$(function () {
    
	var table = $("#example1").DataTable({
		processing: true,
        serverSide: true,
        "pageLength": 25,
        "dom": 'lBfrtip',
        "buttons": [
           'copy',
//            'csv',
            'excel', 
//            'pdf',
            'print'
        ],
        "order": [[ 0, "desc" ]],
        ajax: "{{ url(config('laraadmin.adminRoute') . '/mrdi_dt_ajax') }}",
		language: {
            lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
      
		@if($show_actions)
		  columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
    
	$("#mrdi-add-form").validate({
		
	});

    // აქ დებს სერცში მენიუდან აღებულ მოსაძებნს მნიშვნელობას [რეგიონი და ა.შ]
    $('.search-btn').on('click', function () {

            var field = $(this).attr('field');
            var value =  $(this).text() ;
            
        if(field == 'region'){
            
        }

            params[field] = value; 

            extractParams();
//        $('.parametrs').append('<button onclick="removeEl(this)" class="choosParam btn btn-default" field="'+field+'">'+value+' <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>');

        $("#example1").dataTable().fnDestroy();
        
        
        var table = $("#example1").DataTable({
        "pageLength": 25,
        "dom": 'lBfrtip',
        "buttons": [
           'copy',
//            'csv',
            'excel', 
//            'pdf',
            'print'
        ],
        "order": [[ 0, "desc" ]],
        "ajax": {
            "url"  : "{{ url(config('laraadmin.adminRoute') . '/where_mrdi_dt_ajax') }}",
            "data": {
                "params" : params
            }
        },
   
        });
        
        getBudgetSums();
//		table.search($(this).text()).draw();
	});

    // რეგიონის ჯამს ითვლის
    $('.search-btn').on('click', function(){
            
            var field = $(this).attr('field');
            var value =  $(this).text() ;
            
            if(field == 'region'){
                  getGov_piceByRegion(value);
            }
	 
	});

	$(':input').not('input[type=search]').removeAttr('placeholder');
});
    
     function removeEl(e){
    
                  
       var fil = $(e).attr('field');
       delete params[fil];
       $(e).remove();
     
         
         extractParams();
         
       $("#example1").dataTable().fnDestroy();
        
        var table = $("#example1").DataTable({
        "pageLength": 25,
        "dom": 'lBfrtip',
        "buttons": [
           'copy',
//            'csv',
            'excel', 
//            'pdf',
            'print'
        ],
        "order": [[ 0, "desc" ]],
        "ajax": {
            "url"  : "{{ url(config('laraadmin.adminRoute') . '/where_mrdi_dt_ajax') }}",
            "data": {
                "params" : params
            }
        },
      
        });
         getBudgetSums();
    }
    
    
$( document ).ready(function() {
    
     $.ajax({
               url  : "{{ route('getGov_pice')}}",
               type : "GET",
            success :  function(data){
                $('.content-header> h1').append('<div class="sumOfmonyTodoProject">სახელმწიფო ბიუჯეტის წილი ყველა რეგიონში: '+data+'</div>');
            },
              error :  function(data){},
         beforeSend :  function(data){},
           complete :  function(data){
           }
    });
});

  function getGov_piceByRegion(region){
        var result;
        var _token = $("input[name=_token]").val();

        $.ajaxSetup({
            url: "{{ route('getGov_piceByRegion') }}",
            global: false,
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        
             $.ajax({
               data : {region : region, _token : _token},
            success :  function(data){
            	$('.content-header').empty();
                  $('.content-header').append('<div class="sumOfmonyTodoProject"> '+region+ '  – სახელმწიფო ბიუჯეტის წილი : '+data+'</div>');              
            },
              error :  function(data){},
         beforeSend :  function(data){},
           complete :  function(data){
           }
    });
        return result;
    }
    
    
</script>
@endpush
