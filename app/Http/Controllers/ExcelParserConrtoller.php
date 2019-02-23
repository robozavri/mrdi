<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Input;
use DB;
use App\Models\Roads_Department;
use App\Models\StateBuildingCompany;
use App\Models\SolidWaste_company;
use App\Models\Water_supply_company;
use App\Models\Mrdi;
use Log;
use Dwij\Laraadmin\Controllers\FieldController;
use SimpleXMLElement;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

//use App\Export;

class ExcelParserConrtoller extends Controller
{
    public $listing_cols = ['id', 'region', 'municipalitet', 'project_title'];
    public function main()
    {
       
//        return Excel::download(new Export, 'Export.xlsx');
                        
        $module_fields = \DB::table('module_fields')->select(['colname','label'])->where('module',15)->get();
        
        $colnames = [];
        $labels = [];
        
        foreach($module_fields as $field)
        {
           $colnames[] = $field->colname;
           $labels[] = $field->label;
          
        }
        
//        dd( $labels );
//        dd( $module_fields );
        $data = \DB::table('mrdis')->select($colnames)->get();
//        $result = $result->toArray();
//        $result = (array) $data;
//        $result = json_decode( $data->toArray() ) ;
        $resultData = $data->map(function ($item){
            return get_object_vars($item);
        });
         $result = $resultData->toArray();
//         $cleared = $resultData->toArray();
//        dd( array_values ($cleared[0])  );
//        dd( $cleared  );
//        dd( $result->toArray() );
//        $result = (json_decode( json_encode($data), true) );
//        dd($result);
        Excel::create('mrdi', function($excel) use( $result,$colnames,$labels ) {
//            dd($colnames);
            $excel->sheet('Sheet1', function($sheet) use( $result,$colnames,$labels ) {
//         dd( array_values ($result[0]) ) ;
//                $sheet->setCellValue('A1', 'some first');
//                $sheet->setCellValue('B1', 'some second');
//                $sheet->setCellValue('C1', 'some third');
//                $sheet->setCellValue('D1', 'some fourth');
//
////                $sheet->cell('A1', function($cell) {$cell->setValue('First Name');   });
//      
//                $sheet->fromArray( array(
//                    array('data1', 'data2','data3','data3'),
//                    array('data4', 'data5','data6','data3'),
//                    array('data4', 'data5','data6','data3'),
//                    array('data4', 'data5','data6','data3')
//                ) );
                $sheet->row(1,$labels );
   
                 $i = 2;
                $j = 0;
            foreach ($result as $example) {

              $sheet->row($i, array_values ($result[$j]) );
              $i++;
              $j++;
            }
         
//                $sheet->setAutoFilter();
                
                
            });
        })->export('xls');
//       Excel::create('govexcel', function($excel) {
//            $excel->sheet('Sheetname', function($sheet) {
//                $sheet->fromArray(array(
//                    array('data1', 'data2'),
//                    array('data3', 'data4')
//                ));
//            });
//        })->export('xls');
        
        dd($result);
    }
    
   public function parseExcel(Request $request)
   {
//   dd(Excel::class);
        if ($request->isMethod('get')) {
                return view('welcome');
         }
       // abort(404);
//   $this->mrdi();

   }

    public function mrdi()
    {
         //$xml = simplexml_load_file('files/full/testxml/finish.xml');
//         $reader = Excel::load('public/files/full/testxml/natalie.xls')->get(); // works
       
        $excel->load(storage_path('public/files/full/testxml/natalie.xls'), function (Reader $reader) {
            $reader->sheets(function (Sheet $sheet) {
                $sheet->rows(function (Row $row) {

                    // Get a column
                    $row->column('heading_key');

                    // Magic get
                    $row->heading_key;

                    // Array access
                    $row['heading_key'];
                });
            });
        });
         // dd($reader);
//         foreach($reader  as $sheet)
//         {
//           //  dump($sheet->getTitle());
//             dump( $sheet );
//             // $i = 0;
////             foreach( $sheet as $key => $val){
////                 dump($val);
////                 // dump('esaaa');
////                 // $i++;
////                 // if($i = 100){
////                 //   break;
////                 // }
////                 // break;
////              }
//              break;
//
//              //dump('<hr>');
//              //dump($sheet);
//         }

        dd('$reader');
        dd($reader);
//        dd($xml->record);

        /*
       foreach($xml as $row)
       {
//           dump($row->region);
           dump(
           // Mrdi::create(
           [
            'region' => $row->region->__toString(),
            'municipalitet'        => $row->municipalitet->__toString(),
            'project_title'    => $row->project_title->__toString(),
            'ganxorcielebis_adgili'  => $row->ganxorcielebis_adgili->__toString(),
            'category'           => $row->category->__toString(),
            'project_expsne_doc' => $row->project_expsne_doc->__toString(),
            'gov_budget_local' => $row->gov_budget_local->__toString(),
            'source_funding'  => $row->source_funding->__toString(),
            'kind_of_job' => $row->kind_of_job->__toString(),
            'funding_year' => $row->funding_year->__toString(),
            'date_government_ordinance' => $row->date_government_ordinance->__toString(),
            'numer_government_ordinance' => $row->numer_government_ordinance->__toString(),
            'year_compensation_amount' => $row->year_compensation_amount->__toString(),
            'mony_todo_project' => $row->mony_todo_project->__toString(),
            'co_funding'                 => $row->co_funding->__toString(),
            'co_funding_procent'              => $row->co_funding_procent->__toString(),
            'buying_purchase'      => $row->buying_purchase->__toString(),
            'current_tender_number' => $row->current_tender_number->__toString(),
            'tender_announcement_date' => $row->tender_announcement_date->__toString(),
            'date_completion_proposals' => $row->date_completion_proposals->__toString(),
            'date_signing_contract'   => $row->date_signing_contract->__toString(),
            'tender_status'                 => $row->tender_status->__toString(),
            'project_duration' => $row->project_duration->__toString(),
            'contractual_value'   => $row->contractual_value->__toString(),
            'contractual_value_rgpf' => $row->contractual_value_rgpf->__toString(),
            'job_start_date'                 => $row->job_start_date->__toString(),
            'job_finish_date'                 => $row->job_finish_date->__toString(),
            'job_finish_date_deferreded'  => $row->job_finish_date_deferreded->__toString(),
            'actual_performance_procent'  => $row->actual_performance_procent->__toString(),
            'actual_performance_lari'    => $row->actual_performance_lari->__toString(),
            'cash_performance_cofinancing_lari' => $row->cash_performance_cofinancing_lari->__toString(),
            'cash_performance_only_rgpf' => $row->cash_performance_only_rgpf->__toString(),

            'amount_transferred_municipality' => $row->Amount_transferred_municipality->__toString(),
            'amount_transferred_by_municipality' => $row->amount_transferred_by_municipality->__toString(),
            'given_advance'                 => $row->given_advance->__toString(),
            'remaining_retirement' => $row->remaining_retirement->__toString(),

            'acceptance_and_delivery' => $row->acceptance_and_delivery->__toString(),
            'note'                 => $row->note->__toString(),
            'tender_winner_company_contact'    => $row->tender_winner_company_contact->__toString(),
            'fine_amount'  => $row->fine_amount->__toString(),
            'quantitative_indicator'  => $row->quantitative_indicator->__toString(),
            'count_beneficiaries_direct' => $row->count_beneficiaries_direct->__toString(),
            'count_beneficiaries_undirect' => $row->count_beneficiaries_undirect->__toString(),
            'reg_economy'                 => $row->reg_economy->__toString(),
            'adg_economy'                 => $row->adg_economy->__toString(),
            'intensity_tender_failure'  => $row->intensity_tender_failure->__toString(),
            'Intensification_tender_appeal' => $row->Intensification_tender_appeal->__toString(),
            'count_bidders_participating_tender' => $row->count_bidders_participating_tender->__toString(),
       ]
           );

       }
       */
         // dd('$xml');

        $titles = [
            'რეგიონი' => 'region',
            'მუნიციპალიტეტი'        => 'municipalitet',
            'პროექტის დასახელება'    => 'project_title',
            'განხორციელების ადგილი'  => 'ganxorcielebis_adgili',
            'კატეგორია'           => 'category',
            'საპროექტო-სახარჯთაღრიცხვო დოკუმენტაცია' => 'project_expsne_doc',
            'სახელმწიფო ბიუჯეტი/ ადგილობრივი ბიუჯეტი' => 'gov_budget_local',
            'დაფინანსების წყარო'  => 'source_funding',
            'სამუშაოს სახეობა მშენებლობა/რეაბილიტაცია' => 'kind_of_job',
            'დაფინანსების წელი' => 'funding_year',
            'მთავრობის განკარგულების გამოცემის თარიღი' => 'date_government_ordinance',
            'მთავრობის განკარგულების ნომერი' => 'numer_government_ordinance',
            'პროექტის მთლიანი ღირებულების ფარგლებში მიმდინარე წელს ასანაზღაურებელი თანხები'                 => 'year_compensation_amount',
            'პროექტის განხორციელებისათვის გამოყოფილი თანხა' => 'mony_todo_project',
            'თანადაფინანსება'                 => 'co_funding',
            'თანადაფინანსება (%)'              => 'co_funding_procent',
            'შესყიდვის საშუალება'      => 'buying_purchase',
            'მიმდინარე ტენდერის ნომერი' => 'current_tender_number',
            'ტენდერის გამოცხადების თარიღი' => 'tender_announcement_date',
            'წინადადებების მიღების დასრულების თარიღი' => 'date_completion_proposals',
            'ხელშეკრულების დადების თარიღი'                 => 'date_signing_contract',
            'ტენდერის სტატუსი'                 => 'tender_status',
            'პროექტის ხანგრძლივობა (ერთწლისანი / მრვალწლიანი)' => 'project_duration',
            'სახელშეკრულებო ღირებულება'                 => 'contractual_value',
            'სახელშეკრულებო ღირებულება რგპფ-ს ნაწილი' => 'contractual_value_rgpf',
            'სამუშაოების დაწყების თარიღი'                 => 'job_start_date',
            'სამუშაოების დასრულების თარიღი'                 => 'job_finish_date',
            'სამუშაოების დასრულების თარიღი (გადავადებული)'  => 'job_finish_date_deferreded',
            'ფაქტიური შესრულება (%)'  => 'actual_performance_procent',
            'ფაქტიური შესრულება (ლარი)'                             => 'actual_performance_lari',
            'საკასო შესრულება თანადაფინანსების გათვალისწინებით (ლარი)' => 'cash_performance_cofinancing_lari',
            'საკასო შესრულება მხოლოდ რგპფ-ს ნაწილი (ლარი)' => 'cash_performance_only_rgpf',
            'მუნიციპალიტეტისთვის ჩარიცხული თანხა' => 'amount_transferred_municipality',
            'მუნიციპალიტეტის მიერ გადარიცხული თანხა' => 'amount_transferred_by_municipality',
            'გაცემული ავანსი'                 => 'given_advance',
            'დარჩენილი დასაკავებელი ავანსი' => 'remaining_retirement',
            'განხორციელებულია მიღება-ჩაბარება (კი/არა)' => 'acceptance_and_delivery',
            'შენიშვნა'                 => 'note',
            'ტენდერში გამარჯვებული კომპანიის დასახელება და საკონტაქტო ინფორმაცია'                 => 'tender_winner_company_contact',
            'ჯარიმის თანხა'                 => 'fine_amount',
            'რაოდენობრივი მაჩვენებელი (გრძივე მეტრი ან შენობების რაოდენობა)'                 => 'quantitative_indicator',
            'ბენეფიციართა რაოდენობა (პირდაპირი)' => 'count_beneficiaries_direct',
            'ბენეფიციართა რაოდენობა (არაპირდაპირი)' => 'count_beneficiaries_undirect',
            'რეგ. ეკონომია'                 => 'reg_economy',
            'ადგ. ეკონომია'                 => 'adg_economy',
            'ტენდერის ჩავარდნის ინტენსივობა'  => 'intensity_tender_failure',
            'ტენდერის გასაჩივრების ინტენსივობა' => 'Intensification_tender_appeal',
            'ტენდერში მონაწილე პრეტენდენტების რაოდენობა' => 'count_bidders_participating_tender',
       ];

          $request = new \Illuminate\Http\Request();
          $Cfiled = new FieldController;
          $size = 120;
          $field_type = 19;

        foreach($titles as $key => $value)
        {
            switch ($value) {
                case 'project_title':
                    $size = 300;
                    $field_type = 21;
                    break;
                case 'note':
                    $size = 255;
                    $field_type = 19;
                    break;
                case 'tender_winner_company_contact':
                    $size = 255;
                    $field_type = 19;
                    break;
                default:
                   $size = 120;
                   $field_type = 19;
                    break;
            }

           // $request->replace([
           //     'module_id'        => 15,
           //     'colname'          => $value,
           //     'label'            => $key,
           //     'field_type'       => $field_type,
           //     'defaultvalue'     => '',
           //     'maxlength'        =>  $size,
           //     'minlength'        => '',
           //     "popup_value_type" => "table",
           //     "popup_vals_table" => "departments",
           // ]);
           dump([
                'module_id'        => 15,
                'colname'          => $value,
                'label'            => $key,
                'field_type'       => $field_type,
                'defaultvalue'     => '',
                'maxlength'        =>  $size,
                'minlength'        => '',
                "popup_value_type" => "table",
                "popup_vals_table" => "departments",
            ]);
//             $Cfiled->store($request);
        }




        dd('$xml');

    }



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
//            dump([
//                'module_id'        => 13,
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

    public function fillStateBuildingCompany(){

          $titles = [
//    'პროგრამა' => "programa",
    'დონორი' => "donori",
    'პროექტის რეგისტრაციის თარიღი' => "proektis_registratsiis_tarighi",
    'რეგიონის დასახელება (ქართული)' => "regionis_dasakheleba_kartuli",
    'რეგიონის დასახელება (ინგლისური)' => "regionis_dasakheleba_inglisuri",
    'მუნიციპალიტეტის დასახელება (ქართული)' => "munitsipalitetis_dasakheleba_kartuli",
    'მუნიციპალიტეტის დასახელება (ინსგლისური)' => "munitsipalitetis_dasakheleba_inglisuri",
    'პროექტის ტიპი ქართული დასახელება' => "proektis_tipi_kartuli_dasakheleba",
    'პროექტის ტიპი ქართული დასახელება' => "proektis_tipi_inglisuri_dasakheleba",
    'პროექტის კოდი' => "proektis_kodi",
    'პროექტის დასახელება (ქართული)' => "proektis_dasakheleba_kartuli",
    'პროექტის დასახელება (ინგლისური)' => "proektis_dasakheleba_inglisuri",
    'კონტრაქტის ნომერი' => "kontraktis_nomeri",
    'კონტრაქტორის დასახელება (ქართული)' => "kontraktoris_dasakheleba_kartuli",
    'კონტრაქტორის დასახელება (ინგლისური)' => "kontraktoris_dasakheleba_inglisuri",
    'კონტრაქტორის საიდენთიფიკაციო კოდი' => "kontraktoris_saidentifikatsio_kodi",
    'კონტრაქტორის საკონტაქტო პირი' => "kontraktoris_sakontakto_piri",
    'კონტრაქტორის საკონტაქტო პირის (თანამდებობა)' => "kontraktoris_sakontakto_piri_tanamdeboba",
    'კონტრაქტორი საკონტაქტო პირის (ტელეფონი)' => "kontraktoris_sakontakto_piri_telefoni",
    'კონტრაქტორი საკონტაქტო პირის Email' => "kontraktoris_sakontakto_piris_email",
    'პროექტის დაწყების სავარაუდო თარიღი' => "proektis_datsqebis_savaraudo_tarighi",
    'პროექტის დასრულების სავარაუდო თარიღი' => "proektis_dasrulebis_savaraudo_tarighi",
    'ტენდერის გამოცხადების თარიღი' => "tenderis_gamotskhadebis_tarighi",
    'კონტრაქტის გაფორმების თარიღი' => "kontraktis_gaformebis_tarighi",
    'სამუშაოთა დაწყების თარიღი' => "samushaota_datsqebis_tarighi",
    'სამუშაოთა დასრულების თარიღი' => "samushaota_dasrulebis_tarighi",
    'სამუშაოთა დასრულების ვადის ცვლილება' => "samushaota_dasrulebis_vadis_tsvlileba",
    'კონტრაქტის დასრულების ვადა' => "kontraktis_dasrulebis_vada",
    'სამუშაოთა დაწყება (ფაქტიური)' => "samushaota_datsqeba_faktiuri",
    'სამუშაოთა დასრულება (ფაქტიური)' => "samushaota_dasruleba_faktiuri",
    'პროექტის პირველადი მიღება ჩაბარების თარიღი' => "proektis_pirveladi_migheba_chabarebis_tarighi",
    'პროექტის საბოლოო მიღება ჩაბარების თარიღი' => "proektis_saboloo_migheba_chabarebis_tarighi",
    'ტიპოლოგიის დასახელება (ქართული)' => "tipologiis_dasakheleba_kartuli",
    'ტიპოლოგიის დასახელება (ინგლისური)' => "tipologiis_dasakheleba_inglisuri",
    'პროექტის საწყისი ღირებულება' => "proektis_satsqisi_ghirebuleba",
    'ცვლილება პროექტის საწყის ღირებულებაში' => "tsvlileba_proektis_satsqis_ghirebulebashi",
    'პროექტის საბოლოო ღირებულება' => "proektis_saboloo_ghirebuleba",
    'შესრულებულ სამუშაოთა ღირებულება' => "shesrulebul_samushaota_ghirebuleba",
    'შესრულებულ სამუშაოთა ღირებულება (%)' => "shesrulebul_samushaota_ghirebuleba",
    'შესასრულებელ სამუშაოთა ღირებულება' => "shesasrulebel_samushaota_ghirebuleba",
    'ჯარიმის მოცულობა' => "jarimis_motsuloba",
    'ჯარიმის თარიღი' => "jarimis_tarighi",
    'გადახდილი თანხა' => "gadakhdili_tankha",
    'გადასახდელი თანხა' => "gadasakhdeli_tankha",
    'პროექტის ზედამხედველი' => "proektis_zedamkhedveli",
    'პროექტის ზედამხედველი (თანამდებობა)' => "proektis_zedamkhedveli_tanamdeboba",
    'პროექტის ზედამხედველი (ტელეფონი)' => "proektis_zedamkhedveli_telefoni",
    'სამუშაოთა მოკლე აღწერა (ქართული)' => "samushaota_mokle_aghtsera_kartuli",
    'სამუშაოთა მოკლე აღწერა (ინგლისური)' => "samushaota_mokle_aghtsera_inglisuri",
    'შენიშვნა' => "shenishvna",
    'ავანსის მოცულობა რომელიც შეიძლება გაიცეს გარანტიისას' => "avansis_motsuloba_romelits_sheidzleba_gaitses_garantiisas",
    'გაცემული ავანსის მოცულობა' => "gatsemuli_avansis_motsuleba",
    'დაბრუნებული ავანსის მოცულობა' => "dabrunebuli_avansis_motsuloba",
    'დასაბრუნებელი ავანსის მოცულობა' => "dasabrunebeli_avansis_motsuloba",
    'ხარისხის უზრუნველყოფის თანხა (%)' => "khariskhis_uzrunvelqofis_tankha",
    'ხარისხის უზრუნველყოფის თანხა (რეზერვი)' => "khariskhis_uzrunvelqofis_tankha_rezervi",
    'კონტრაქტორის შერჩევის წესი (კონკურსი/პირდაპირი)' => "kontraktoris_sherchevis_tsesi_konkursipirdapiri",
    'ტენდერის ტიპი' => "tenderis_tipi",
    'შესყიდვის საფუძველი' => "shesqidvis_safudzveli",
    'სახაზინო პროგრამული კოდი' => "sakhazino_programuli_kodi",
    'კატეგორიის კოდი' => "kategoriis_kodi",
    'პროექტის შეწყვეტის ინდიკატორი' => "proektis_shetsqvetis_indikatori",
    'პროექტის წინასწარი ღირებულება' => "proektis_tsinastsari_ghirebuleba",
    'პროექტის (ობიექტის) მიმღები' => "proektis_obiektis_mimghebi",
    'ავანსის გარანტია (#)' => "avansis_garantia",
    'ავანსის გარანტიის გაცემის თარიღი' => "avansis_garantia_gatsemis_tarighi",
    'ავანსის გარანტია (თანხა)' => "avansis_garantia_tankha",
    'ავანსის გარანტია (გარანტიის გამცემი ბანკი)' => "avansis_garantia_garantiis_gamtsemi_banki",
    'ავანსის გარანტია (ნომერი)' => "avansis_garantia_nomeri",
    'ავანსის გარანტია (მოქმედების ვადა)' => "avansis_garantia_mokmedebis_vada",
    'კონტრაქტის გარანტია (#)' => "kontraktis_garantia",
    'კონტრაქტის გარანტია (გაცემის თარიღი)' => "kontraktis_garantia_gatsemis_tarighi",
    'კონტრაქტის გარანტია (თანხა)' => "kontraktis_garantia_tankha",
    'კონტრაქტის გარანტია (გარანტიის გამცემი ბანკი)' => "kontraktis_garantia_garantiis_gamtsemi_banki",
    'კონტრაქტის გარანტია (ნომერი)' => "kontraktis_garantia_nomeri",
    'კონტრაქტის გარანტია (მოქმედების ვადა)' => "kontraktis_garantia_mokmedebis_vada",
    'კონტრაქტის დაზღვევის ვადა' => "kontraktis_dazghvevis_vada",
    'დეფექტებზე პასუხისმგებლობის ვადა' => "defektebze_pasukhismgeblobis_vada",
    'დაკავებული სარეზერვო თანხა' => "dakavebuli_sarezervo_tankha",
    'გადახდილი სარეზერვო თანხა' => "gadakhdili_sarezervo_tankha",
    'გადასახდელი სარეზერვო თანხა' => "gadasakhdeli_sarezervo_tankha",
    'პროექტის დაფინანსება (დონორი)' => "proektis_dafinanseba_donori",
    'პროექტის დაფინანსება (ცენტრალური  ბიუჯეტი)' => "proektis_dafinanseba_tsentraluri_biujeti",
    'პროექტის დაფინანსება (ადგილობრივი ბიუჯეტი)' => "proektis_dafinanseba_adgilobrivi_biujeti",
    'პროექტის დაფინანსება (მგფ)' => "proektis_dafinanseba_mgf",
    'პროექტი განკუთვნილია იძულებით გადაადგილებულ პირთათვის' => "proekti_gankutvnilia_idzulebit_gadaadgilebul_pirtatvis",
    'საოპერაციო ხარჯები (კი/არა)' => "saoperatsio_kharjebi_kiara",
    'პროექტის მენეჯერი მგფ' => "proektis_menejeri_mgf",
    'პროექტის განხორციელების სტატუსი (ქართული დასახელება)' => "proektis_gankhortsielebis_statusi_kartuli_dasakheleba",
    'პროექტის განხორციელების სტატუსი (ინგლისური დასახელება)' => "proektis_gankhortsielebis_statusi_inglisuri_dasakheleba",
    'დასაქმებულთა რაოდენობა' => "dasakmebulta_raodenoba",
    'მბმული სახელმწიფო შესყიდვების სააგენტოს საიტზე' => "bmuli_sakhelmtsifo_shesqidvebis_saagentos_saitze",
  ];

       $reader = Excel::load('public/files/state_building_company.xlsx')->get();
       $arr = [];

        foreach($reader  as $sheet)
        {
            foreach( $titles as $key => $val){

                if(strcasecmp($val, 'avansis_motsuloba_romelits_sheidzleba_gaitses_garantiisas') == 0){
                   $chngname = 'avansis_motsuloba_romelits_sheidzleba_gaitses_garantiisas';
                    $val = 'avansis_motsuloba_romelits_sheidzleba_gaitses_garantiis_tsarmodgenis_shemtkhvevashi';
                    $arr[ $chngname ] = $sheet->{$val};
                }else{
                     $arr[$val] = $sheet->{$val};
                }


            }

            try{
                 StateBuildingCompany::create($arr);
            } catch (Exception $e) {
                Log::info('Caught exception: ',  $e->getMessage(), "\n");
            }
            $arr = [];
        }

    }

    public function fillRoadsDepartment()
    {

          $reader = Excel::load('public/files/roads_departments.xlsx')->get();
           $status = '';

       foreach($reader  as $sheet)
        {

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
