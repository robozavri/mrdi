<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\StateBuildingCompany;

class StateBuildingCompaniesController extends Controller
{
	public $show_action = true;
	public $view_col = 'programa';
	public $listing_cols = ['id', 'proektis_dasakheleba_kartuli'];

	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() >= 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('StateBuildingCompanies', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('StateBuildingCompanies', $this->listing_cols);
		}
	}

	/**
	 * Display a listing of the StateBuildingCompanies.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('StateBuildingCompanies');

		if(Module::hasAccess($module->id)) {
			return View('la.statebuildingcompanies.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new statebuildingcompany.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created statebuildingcompany in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("StateBuildingCompanies", "create")) {

			$rules = Module::validateRules("StateBuildingCompanies", $request);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}

			$insert_id = Module::insert("StateBuildingCompanies", $request);

			return redirect()->route(config('laraadmin.adminRoute') . '.statebuildingcompanies.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified statebuildingcompany.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("StateBuildingCompanies", "view")) {

			$statebuildingcompany = StateBuildingCompany::find($id);
			if(isset($statebuildingcompany->id)) {
				$module = Module::get('StateBuildingCompanies');
				$module->row = $statebuildingcompany;

				return view('la.statebuildingcompanies.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('statebuildingcompany', $statebuildingcompany);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("statebuildingcompany"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified statebuildingcompany.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("StateBuildingCompanies", "edit")) {
			$statebuildingcompany = StateBuildingCompany::find($id);
			if(isset($statebuildingcompany->id)) {
				$module = Module::get('StateBuildingCompanies');

				$module->row = $statebuildingcompany;

				return view('la.statebuildingcompanies.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('statebuildingcompany', $statebuildingcompany);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("statebuildingcompany"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified statebuildingcompany in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("StateBuildingCompanies", "edit")) {

			$rules = Module::validateRules("StateBuildingCompanies", $request, true);

			$validator = Validator::make($request->all(), $rules);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}

			$insert_id = Module::updateRow("StateBuildingCompanies", $request, $id);

			return redirect()->route(config('laraadmin.adminRoute') . '.statebuildingcompanies.index');

		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified statebuildingcompany from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("StateBuildingCompanies", "delete")) {
			StateBuildingCompany::find($id)->delete();

			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.statebuildingcompanies.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('statebuildingcompanies')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('StateBuildingCompanies');

		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) {
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/statebuildingcompanies/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}

			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("StateBuildingCompanies", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/statebuildingcompanies/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}

				if(Module::hasAccess("StateBuildingCompanies", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.statebuildingcompanies.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
