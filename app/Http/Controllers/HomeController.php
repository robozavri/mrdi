<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Twotestmodule;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    public $listing_cols = ['id', 'region', 'municipalitet', 'project_title'];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
   
    
    public function getGov_piceByRegion(Request $request)
    {
        $region = $request->region;
      
        if(is_null($region) || empty($region))
        { 
            abort(404); 
        }
      
        $result = \DB::select('SELECT SUM(gov_pice) as amount FROM twotestmodules where name = :name', [ 'name' => $region]);
        
        if(!empty($result))
        {
          return  $result[0]->amount;
        }

    }
    
    public function getGov_pice()
    {
        $result = \DB::select('select SUM(gov_pice) as amount from twotestmodules');
        if(!empty($result))
        {
          return  $result[0]->amount;
        }
    }
    
    public function getBudgetSums(Request $request)
    {
        $res = $request->params;
//        dd($res);
//        $result = \DB::select('select SUM(gov_budget_local) as budgetMoney,SUM(year_compensation_amount) as projectAmount from mrdis')->where($res)->get();
        
//       $result =  \DB::table('mrdis')->sum('gov_budget_local')->where($res)->get();
        $result = \DB::table('mrdis')->select(\DB::raw('SUM(year_compensation_amount) as sumAmount'),\DB::raw('SUM(mony_todo_project) as projectAmount'))->where($res)->get();
        
         return response()->json($result);
      
    }

}