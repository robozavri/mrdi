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
      
        $result = \DB::select('SELECT SUM(mony_todo_project) as amount FROM mrdis where region = :region', [ 'region' => $region]);

        
        if(!empty($result))
        {
          return  $result[0]->amount;
        }

    }
    
    public function getGov_pice()
    {
         return \DB::select('select SUM(mony_todo_project) as amount FROM mrdis')[0]->amount;
       
    }
    
    public function getBudgetSums(Request $request)
    {
        $res = $request->params;

        $result = \DB::table('mrdis')->select(\DB::raw('SUM(year_compensation_amount) as sumAmount'),\DB::raw('SUM(mony_todo_project) as projectAmount'))->where($res)->get();
        
         return response()->json($result);
      
    }

}