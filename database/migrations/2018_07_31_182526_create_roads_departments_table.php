<?php
/**
 * Migration genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Dwij\Laraadmin\Models\Module;

class CreateRoadsDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Roads_departments", 'roads_departments', 'dasakheleba', 'fa-road', [
            ["dasakheleba", "დასახელება", "Textarea", false, "", 0, 0, false],
            ["dafinansebis_tsqaro", "დაფინანსების წყარო", "String", false, "", 0, 256, false],
            ["kontraktori_kompania", "კონტრაქტორი კომპანია", "String", false, "", 0, 256, false],
            ["sakhelshekrulebo_ghirebuleba_atasi_lari", "სახელშეკრულებო ღირებულება (ათსი. ლარი)", "String", false, "", 0, 255, false],
            ["shesruleba_nazardi_jamit_atasi_lari", "შესრულება ნაზარდი ჯამით (ათსი. ლარი)", "String", false, "", 0, 255, false],
            ["nashti", "ნაშთი", "String", false, "", 0, 256, false],
            ["datsqeba", "დაწყება", "String", false, "", 0, 256, false],
            ["dasruleba", "დასრულება", "String", false, "", 0, 256, false],
            ["shenishvna", "შენიშვნა", "String", false, "", 0, 256, false],
            ["category", "კატეგორია", "Dropdown", false, "", 0, 255, true, ["\u10e1\u10e2\u10d8\u10e5\u10d8\u10d0-\u10de\u10e0\u10d4\u10d5\u10d4\u10dc\u10ea\u10d8\u10d0","\u10dc\u10d0\u10de\u10d8\u10e0\u10d3\u10d0\u10ea\u10d5\u10d0","\u10db\u10e8\u10d4\u10dc\u10d4\u10d1\u10da\u10dd\u10d1\u10d0","\u10e0\u10d4\u10d0\u10d1\u10d8\u10da\u10d8\u10e2\u10d0\u10ea\u10d8\u10d0"]],
            ["status", "სტატუსი", "Radio", false, "", 0, 0, true, ["\u10db\u10d8\u10db\u10d3\u10d8\u10dc\u10d0\u10e0\u10d4","\u10d3\u10d0\u10e1\u10e0\u10e3\u10da\u10d4\u10d1\u10e3\u10da\u10d8"]],
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
        if (Schema::hasTable('roads_departments')) {
            Schema::drop('roads_departments');
        }
    }
}
