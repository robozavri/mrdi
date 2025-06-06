@extends("la.layouts.app")

@section("contentheader_title", "Twotestmodules")
@section("contentheader_description", "Twotestmodules listing")
@section("section", "Twotestmodules")
@section("sub_section", "Listing")
@section("htmlheader_title", "Twotestmodules Listing")

@section("headerElems")
@la_access("Twotestmodules", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Twotestmodule</button>
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

@la_access("Twotestmodules", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Twotestmodule</h4>
			</div>
			{!! Form::open(['action' => 'LA\TwotestmodulesController@store', 'id' => 'twotestmodule-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    @la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'proj_date')
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
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/twotestmodule_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#twotestmodule-add-form").validate({
		
	});
});
    
 
$( document ).ready(function() {
     $.ajax({
               url  : "{{ route('getGov_pice')}}",
               type : "GET",
            success :  function(data){
                $('.content-header > h1').append('<div class="sumOfmonyTodoProject">სახელმწიფო ბიუჯეტის წილი (თანხა): '+data+'</div>');
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
                   result = data;
                console.log(data);
                alert(data);
            },
              error :  function(data){},
         beforeSend :  function(data){},
           complete :  function(data){
           }
    });
        return result;
    }
    
    getGov_piceByRegion('კახეთი');
</script>
@endpush
