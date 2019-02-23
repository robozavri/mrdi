<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Water_supply_company extends Model
{
    use SoftDeletes;
	
	protected $table = 'water_supply_companies';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];
    
        public function united_water_supply_company()
    {
        
               $titles = [ 
            'ქალაქი'                                    => 'city',          
            'რეგიონი'                                   => 'region',
//            'პროექტის დასახელება და ხელშეკრულების ნომერი'=> 'project_title_number',
            'დონორი'                                   => 'donor',
            'კონტრაქტორი'                               => 'contractor',
            'ხელშეკრულების ხელმოწერის თარიღი'           => 'Signing_contract_date',
            'სამუშაოების დაწყების თარიღი'                 => 'job_start_date',
            'სამუშაოების თავდაპირველი დასრულების თარიღი' => 'job_original_finish_date',
            'სამუშაოების თავდაპირველი ღირებულება, ლარი'  => 'job_original_price_lari',
            'სამუშაოების შეცვლილი ღირებულება, ლარი'      => 'finished_job',
            'შესრულებული სამუშაო'                       => 'executed_job',
            'ანაზღაურებული თანხა, ლარი'                 => 'payed_amount',
       ];
  
        $request = new \Illuminate\Http\Request();
        $Cfiled = new FieldController;
       
        foreach($titles as $key => $value){

            $request->replace([
                'module_id'        => 14,
                'colname'          => $value,
                'label'            => $key,
                'field_type'       => 19,
                'defaultvalue'     => '',
                'maxlength'        => 100,
                'minlength'        => '',
                "popup_value_type" => "table",
                "popup_vals_table" => "departments",
            ]);
//            dump([
//                'module_id'        => 14,
//                'colname'          => $value,
//                'label'            => $key,
//                'field_type'       => 19,
//                'defaultvalue'     => '',
//                'maxlength'        => 100,
//                'minlength'        => '',
//                "popup_value_type" => "table",
//                "popup_vals_table" => "departments",
//            ]);
             $Cfiled->store($request);
        }
        
         $xml = simplexml_load_file('files/full/testxml/united_water_supply_company.xml');
          
       //ეს იმისთვის რო პირველი სათაურები არ შეყაროს და მხოლოდ მონაცემები შეყაროს  
       $i = 0;
       foreach($xml->Worksheet->Table->Row as $row){
           if($i == 0 || $i == 2 ){
               $i++;
               continue;
           }

    Water_supply_company::create([
       'city'                      => $row->Cell[1]->Data->__toString(),
       'region'                    => $row->Cell[2]->Data->__toString(),   
        'project_title_number'     => $row->Cell[3]->Data->__toString(),
        'donor'                    => $row->Cell[4]->Data->__toString(),
        'contractor'               => $row->Cell[5]->Data->__toString(),
        'Signing_contract_date'    => $row->Cell[6]->Data->__toString(),
        'job_start_date'           => $row->Cell[7]->Data->__toString(),
        'job_original_finish_date' => $row->Cell[8]->Data->__toString(),
        'job_original_price_lari'  => $row->Cell[9]->Data->__toString(),
        'finished_job'             => $row->Cell[10]->Data->__toString(),
        'executed_job'             => $row->Cell[11]->Data->__toString(),
        'payed_amount'             => $row->Cell[12]->Data->__toString(),
    ]);
        
         $i++;
           

       }

    }
}
