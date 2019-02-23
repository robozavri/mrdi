<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SolidWaste_company extends Model
{
    use SoftDeletes;
	
	protected $table = 'solidwaste_companies';
	
	protected $hidden = [
        
    ];
    
    protected $fillable = [
        'project_title' ,
        'project_description',   
        'project_deadlines' ,
        'project_budget_euro',
        'loan_euro',
        'grant_euro' ,
        'local_contribution_euro' ,
        'donor',
        'status',
	];


	protected $guarded = [];

	protected $dates = ['deleted_at'];
    
    public function solid_waste_companies()
    {
        
         $titles = [ 
            'პროექტის მოკლე აღწერა'         => 'project_description',          
            'პროექტის ვადები'               => 'project_deadlines',
            'პროექტის ბიუჯეტი (ევრო)'       => 'project_budget_euro',
            'სესხი (ევრო)'                   => 'loan_euro)',
            'გრანტი (ევრო)'                  => 'grant_euro',
            'ადგილობრივი კონტრიბუცია (ევრო)' => 'local_contribution_euro',
            'დონორი'                        => 'donor',
            'სტატუსი'                        => 'status',
       ];
  
        $request = new \Illuminate\Http\Request();
        $Cfiled = new FieldController;
       
        foreach($titles as $key => $value){

            $request->replace([
                'module_id'        => 13,
                'colname'          => $value,
                'label'            => $key,
                'field_type'       => 19,
                'defaultvalue'     => '',
                'maxlength'        => 100,
                'minlength'        => '',
                "popup_value_type" => "table",
                "popup_vals_table" => "departments",
            ]);
            dump([
                'module_id'        => 13,
                'colname'          => $value,
                'label'            => $key,
                'field_type'       => 19,
                'defaultvalue'     => '',
                'maxlength'        => 100,
                'minlength'        => '',
                "popup_value_type" => "table",
                "popup_vals_table" => "departments",
            ]);
             $Cfiled->store($request);
        }
        
         $xml = simplexml_load_file('files/full/testxml/XMLDELETED_solid_waste_companies.xml');
   //ეს იმისთვის რო პირველი სათაურები არ შეყაროს და მხოლოდ მონაცემები შეყაროს  
       $i = 0;
       foreach($xml->Worksheet->Table->Row as $row){
           if($i == 0){
               $i++;
               continue;
           }

           SolidWaste_company::create([
               'project_title'            => $row->Cell[0]->Data->__toString(),
               'project_description'      => $row->Cell[1]->Data->__toString(),   
                'project_deadlines'       => $row->Cell[2]->Data->__toString(),
                'project_budget_euro'     => $row->Cell[3]->Data->__toString(),
                'loan_euro'               => $row->Cell[4]->Data->__toString(),
                'grant_euro'              => $row->Cell[5]->Data->__toString(),
                'local_contribution_euro' => $row->Cell[6]->Data->__toString(),
                'donor'                   => $row->Cell[7]->Data->__toString(),
                'status'                  => $row->Cell[8]->Data->__toString(),
                ]);
        
         $i++;
           

       }
        
    }
}
