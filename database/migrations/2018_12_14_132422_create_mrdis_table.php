<?php
/**
 * Migration genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Dwij\Laraadmin\Models\Module;

class CreateMrdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Mrdis", 'mrdis', 'project_title', 'fa-cube', [
            ["region", "რეგიონი", "String", false, "", 0, 120, false],
            ["municipalitet", "მუნიციპალიტეტი", "String", false, "", 0, 120, false],
            ["project_title", "პროექტის დასახელება", "String", false, "", 0, 120, false],
            ["ganxorcielebis_adgili", "განხორციელების ადგილი", "String", false, "", 0, 120, false],
            ["category", "კატეგორია", "String", false, "", 0, 120, false],
            ["project_expsne_doc", "საპროექტო-სახარჯთაღრიცხვო დოკუმენტაცია", "String", false, "", 0, 120, false],
            ["gov_budget_local", "სახელმწიფო ბიუჯეტი/ ადგილობრივი ბიუჯეტი", "String", false, "", 0, 120, false],
            ["source_funding", "დაფინანსების წყარო", "String", false, "", 0, 120, false],
            ["kind_of_job", "სამუშაოს სახეობა მშენებლობა/რეაბილიტაცია", "String", false, "", 0, 120, false],
            ["funding_year", "დაფინანსების წელი", "String", false, "", 0, 120, false],
            ["date_government_ordinance", "მთავრობის განკარგულების გამოცემის თარიღი", "String", false, "", 0, 120, false],
            ["numer_government_ordinance", "მთავრობის განკარგულების ნომერი", "String", false, "", 0, 120, false],
            ["year_compensation_amount", "პროექტის მთლიანი ღირებულების ფარგლებში მიმდინარე წელს ასანაზღაურებელი თანხები", "String", false, "", 0, 120, false],
            ["mony_todo_project", "პროექტის განხორციელებისათვის გამოყოფილი თანხა", "String", false, "", 0, 120, false],
            ["co_funding", "თანადაფინანსება", "String", false, "", 0, 120, false],
            ["co_funding_procent", "თანადაფინანსება (%)", "String", false, "", 0, 120, false],
            ["buying_purchase", "შესყიდვის საშუალება", "String", false, "", 0, 120, false],
            ["current_tender_number", "მიმდინარე ტენდერის ნომერი", "String", false, "", 0, 120, false],
            ["tender_announcement_date", "ტენდერის გამოცხადების თარიღი", "String", false, "", 0, 120, false],
            ["date_completion_proposals", "წინადადებების მიღების დასრულების თარიღი", "String", false, "", 0, 120, false],
            ["date_signing_contract", "ხელშეკრულების დადების თარიღი", "String", false, "", 0, 120, false],
            ["tender_status", "ტენდერის სტატუსი", "String", false, "", 0, 120, false],
            ["project_duration", "პროექტის ხანგრძლივობა (ერთწლისანი / მრვალწლიანი)", "String", false, "", 0, 120, false],
            ["contractual_value", "სახელშეკრულებო ღირებულება", "String", false, "", 0, 120, false],
            ["contractual_value_rgpf", "სახელშეკრულებო ღირებულება რგპფ-ს ნაწილი", "String", false, "", 0, 120, false],
            ["job_start_date", "სამუშაოების დაწყების თარიღი", "String", false, "", 0, 120, false],
            ["job_finish_date", "სამუშაოების დასრულების თარიღი", "String", false, "", 0, 120, false],
            ["job_finish_date_deferreded", "სამუშაოების დასრულების თარიღი (გადავადებული)", "String", false, "", 0, 120, false],
            ["actual_performance_procent", "ფაქტიური შესრულება (%)", "String", false, "", 0, 120, false],
            ["actual_performance_lari", "ფაქტიური შესრულება (ლარი)", "String", false, "", 0, 120, false],
            ["cash_performance_cofinancing_lari", "საკასო შესრულება თანადაფინანსების გათვალისწინებით (ლარი)", "String", false, "", 0, 120, false],
            ["cash_performance_only_rgpf", "საკასო შესრულება მხოლოდ რგპფ-ს ნაწილი (ლარი)", "String", false, "", 0, 120, false],
            ["Amount_transferred_municipality", "მუნიციპალიტეტისთვის ჩარიცხული თანხა", "String", false, "", 0, 120, false],
            ["amount_transferred_by_municipality", "მუნიციპალიტეტის მიერ გადარიცხული თანხა", "String", false, "", 0, 120, false],
            ["given_advance", "გაცემული ავანსი", "String", false, "", 0, 120, false],
            ["remaining_retirement", "დარჩენილი დასაკავებელი ავანსი", "String", false, "", 0, 120, false],
            ["acceptance_and_delivery", "განხორციელებულია მიღება-ჩაბარება (კი/არა)", "String", false, "", 0, 120, false],
            ["note", "შენიშვნა", "String", false, "", 0, 120, false],
            ["tender_winner_company_contact", "ტენდერში გამარჯვებული კომპანიის დასახელება და საკონტაქტო ინფორმაცია", "String", false, "", 0, 120, false],
            ["fine_amount", "ჯარიმის თანხა", "String", false, "", 0, 120, false],
            ["quantitative_indicator", "რაოდენობრივი მაჩვენებელი (გრძივე მეტრი ან შენობების რაოდენობა)", "String", false, "", 0, 120, false],
            ["count_beneficiaries_direct", "ბენეფიციართა რაოდენობა (პირდაპირი)", "String", false, "", 0, 120, false],
            ["count_beneficiaries_undirect", "ბენეფიციართა რაოდენობა (არაპირდაპირი)", "String", false, "", 0, 120, false],
            ["reg_economy", "რეგ. ეკონომია", "String", false, "", 0, 120, false],
            ["adg_economy", "ადგ. ეკონომია", "String", false, "", 0, 120, false],
            ["intensity_tender_failure", "ტენდერის ჩავარდნის ინტენსივობა", "String", false, "", 0, 120, false],
            ["Intensification_tender_appeal", "ტენდერის გასაჩივრების ინტენსივობა", "String", false, "", 0, 120, false],
            ["count_bidders_participating_tender", "ტენდერში მონაწილე პრეტენდენტების რაოდენობა", "String", false, "", 0, 120, false],
        ]);
		
		/*
		Row Format:
		["field_name_db", "Label", "UI Type", "Unique", "Default_Value", "min_length", "max_length", "Required", "Pop_values"]
        Module::generate("Module_Name", "Table_Name", "view_column_name" "Fields_Array");
        
		Module::generate("Books", 'books', 'name', [
            ["address",     "Address",      "Address",  false, "",          0,  1000,   true],
            ["restricted",  "Restricted",   "Checkbox", false, false,       0,  0,      false],
            ["price",       "Price",        "Currency", false, 0.0,         0,  0,      true],
            ["date_release", "Date of Release", "Date", false, "date('Y-m-d')", 0, 0,   false],
            ["time_started", "Start Time",  "Datetime", false, "date('Y-m-d H:i:s')", 0, 0, false],
            ["weight",      "Weight",       "Decimal",  false, 0.0,         0,  20,     true],
            ["publisher",   "Publisher",    "Dropdown", false, "Marvel",    0,  0,      false, ["Bloomsbury","Marvel","Universal"]],
            ["publisher",   "Publisher",    "Dropdown", false, 3,           0,  0,      false, "@publishers"],
            ["email",       "Email",        "Email",    false, "",          0,  0,      false],
            ["file",        "File",         "File",     false, "",          0,  1,      false],
            ["files",       "Files",        "Files",    false, "",          0,  10,     false],
            ["weight",      "Weight",       "Float",    false, 0.0,         0,  20.00,  true],
            ["biography",   "Biography",    "HTML",     false, "<p>This is description</p>", 0, 0, true],
            ["profile_image", "Profile Image", "Image", false, "img_path.jpg", 0, 250,  false],
            ["pages",       "Pages",        "Integer",  false, 0,           0,  5000,   false],
            ["mobile",      "Mobile",       "Mobile",   false, "+91  8888888888", 0, 20,false],
            ["media_type",  "Media Type",   "Multiselect", false, ["Audiobook"], 0, 0,  false, ["Print","Audiobook","E-book"]],
            ["media_type",  "Media Type",   "Multiselect", false, [2,3],    0,  0,      false, "@media_types"],
            ["name",        "Name",         "Name",     false, "John Doe",  5,  250,    true],
            ["password",    "Password",     "Password", false, "",          6,  250,    true],
            ["status",      "Status",       "Radio",    false, "Published", 0,  0,      false, ["Draft","Published","Unpublished"]],
            ["author",      "Author",       "String",   false, "JRR Tolkien", 0, 250,   true],
            ["genre",       "Genre",        "Taginput", false, ["Fantacy","Adventure"], 0, 0, false],
            ["description", "Description",  "Textarea", false, "",          0,  1000,   false],
            ["short_intro", "Introduction", "TextField",false, "",          5,  250,    true],
            ["website",     "Website",      "URL",      false, "http://dwij.in", 0, 0,  false],
        ]);
		*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('mrdis')) {
            Schema::drop('mrdis');
        }
    }
}
