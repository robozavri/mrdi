<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roads_Department extends Model
{
    use SoftDeletes;
	
	protected $table = 'roads_departments';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];
    
    public static function fillRoadsDepartment()
    {
        
          $reader = Excel::load('public/files/roads_departments.xlsx')->get();
           $status = '';

       foreach($reader  as $sheet)
        {
           dump($sheet->getTitle());
           foreach($sheet as $row){
            
               if (strcasecmp($row->n, 'მიმდინარე') == 0) {
                    $status = 'მიმდინარე';
                }
               
               if (strcasecmp($row->n, 'დასრულებული ობიექტები') == 0) {
                    $status = 'დასრულებული';
                }
               if($row->dafinansebis_tsqaro == null || is_float($row->dafinansebis_tsqaro)){
                   continue;
               }

              Roads_Department::create([
//              dump([
                      'dafinansebis_tsqaro' => $row->dafinansebis_tsqaro,
                      'kontraktori_kompania' => $row->kontraktori_kompania,
                      'sakhelshekrulebo_ghirebuleba_atasi_lari' => $row->{'sakhelshekrulebo_ghirebuleba_atasi._lari'},
                      'shesruleba_nazardi_jamit_atasi_lari' => $row->{'shesruleba_nazardi_jamit_atasi._lari'},
                      'nashti' => $row->nashti,
                      'datsqeba' => $row->datsqeba,
                      'dasruleba' => $row->dasruleba,
                      'shenishvna' => $row->shenishvna,
                      'dasakheleba' => $row->dasakheleba,
                      'category' => $sheet->getTitle(),
                      'status' => $status,
                   ]); 
           }
        }
    }
}
