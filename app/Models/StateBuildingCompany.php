<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateBuildingCompany extends Model
{
    use SoftDeletes;
	
	protected $table = 'statebuildingcompanies';
	
	protected $hidden = [
        
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];
    
    public static function fillStateBuildingCompany(){
        
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
    
}
