<?php

namespace Dwij\Laraadmin\Helpers;

use DB;
use Log;

use Dwij\Laraadmin\Models\Module;
use Request;
use Dwij\Laraadmin\LAFormMaker;
use Auth;

class LAHelper
{
    // $names = LAHelper::generateModuleNames($module_name);
    public static function generateModuleNames($module_name, $icon) {
        $array = array();
        $module_name = trim($module_name);
        $module_name = str_replace(" ", "_", $module_name);

        $array['module'] = ucfirst(str_plural($module_name));
        $array['label'] = ucfirst(str_plural($module_name));
        $array['table'] = strtolower(str_plural($module_name));
        $array['model'] = ucfirst(str_singular($module_name));
        $array['fa_icon'] = $icon;
        $array['controller'] = $array['module']."Controller";
        $array['singular_l'] = strtolower(str_singular($module_name));
        $array['singular_c'] = ucfirst(str_singular($module_name));

        return (object) $array;
    }

    // $tables = LAHelper::getDBTables([]);
    public static function getDBTables($remove_tables = []) {
        if(env('DB_CONNECTION') == "sqlite") {
            $tables_sqlite = DB::select('select * from sqlite_master where type="table"');
            $tables = array();
            foreach ($tables_sqlite as $table) {
                if($table->tbl_name != 'sqlite_sequence') {
                    $tables[] = $table->tbl_name;
                }
            }
        } else if(env('DB_CONNECTION') == "pgsql") {
            $tables_pgsql = DB::select("SELECT table_name FROM information_schema.tables WHERE table_type = 'BASE TABLE' AND table_schema = 'public' ORDER BY table_name;");
            $tables = array();
            foreach ($tables_pgsql as $table) {
                $tables[] = $table->table_name;
            }
        } else if(env('DB_CONNECTION') == "mysql") {
            $tables = DB::select('SHOW TABLES');
        } else {
            $tables = DB::select('SHOW TABLES');
        }

        $tables_out = array();
        foreach ($tables as $table) {
            $table = (Array)$table;
            $tables_out[] = array_values($table)[0];
        }
        $remove_tables2 = array(
            'backups',
            'la_configs',
            'la_menus',
            'migrations',
            'modules',
            'module_fields',
            'module_field_types',
            'password_resets',
            'permissions',
            'permission_role',
            'role_module',
            'role_module_fields',
            'role_user'
        );
        $remove_tables = array_merge($remove_tables, $remove_tables2);
        $remove_tables = array_unique($remove_tables);
        $tables_out = array_diff($tables_out, $remove_tables);

        $tables_out2 = array();
        foreach ($tables_out as $table) {
            $tables_out2[$table] = $table;
        }

        return $tables_out2;
    }

    // $modules = LAHelper::getModuleNames([]);
    public static function getModuleNames($remove_modules = []) {
        $modules = Module::all();

        $modules_out = array();
        foreach ($modules as $module) {
            $modules_out[] = $module->name;
        }
        $modules_out = array_diff($modules_out, $remove_modules);

        $modules_out2 = array();
        foreach ($modules_out as $module) {
            $modules_out2[$module] = $module;
        }

        return $modules_out2;
    }

    // LAHelper::parseValues($field['popup_vals']);
    public static function parseValues($value) {
        // return $value;
        $valueOut = "";
        if (strpos($value, '[') !== false) {
            $arr = json_decode($value);
            foreach ($arr as $key) {
                $valueOut .= "<div class='label label-primary'>".$key."</div> ";
            }
        } else if (strpos($value, ',') !== false) {
            $arr = array_map('trim', explode(",", $value));
            foreach ($arr as $key) {
                $valueOut .= "<div class='label label-primary'>".$key."</div> ";
            }
        } else if (strpos($value, '@') !== false) {
            $valueOut .= "<b data-toggle='tooltip' data-placement='top' title='From ".str_replace("@", "", $value)." table' class='text-primary'>".$value."</b>";
        } else if ($value == "") {
            $valueOut .= "";
        } else {
            $valueOut = "<div class='label label-primary'>".$value."</div> ";
        }
        return $valueOut;
    }

    // LAHelper::log("info", "", $commandObject);
    public static function log($type, $text, $commandObject) {
        if($commandObject) {
            $commandObject->$type($text);
        } else {
            if($type == "line") {
                $type = "info";
            }
            Log::$type($text);
        }
    }

    // LAHelper::recurse_copy("", "");
    public static function recurse_copy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst, 0777, true);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    LAHelper::recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    // ignore files
                    if(!in_array($file, [".DS_Store"])) {
                        copy($src . '/' . $file, $dst . '/' . $file);
                    }
                }
            }
        }
        closedir($dir);
    }

    // LAHelper::recurse_delete("");
    public static function recurse_delete($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir."/".$object))
                        LAHelper::recurse_delete($dir."/".$object);
                    else
                        unlink($dir."/".$object);
                }
            }
            rmdir($dir);
        }
    }

    // Generate Random Password
    // $password = LAHelper::gen_password();
    public static function gen_password($chars_min=6, $chars_max=8, $use_upper_case=false, $include_numbers=false, $include_special_chars=false) {
        $length = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if($include_numbers) {
            $selection .= "1234567890";
        }
        if($include_special_chars) {
            $selection .= "!@\"#$%&[]{}?|";
        }
        $password = "";
        for($i=0; $i<$length; $i++) {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];
            $password .=  $current_letter;
        }
        return $password;
    }

    // LAHelper::img($upload_id);
    public static function img($upload_id) {
        $upload = \App\Upload::find($upload_id);
        if(isset($upload->id)) {
            return url("files/".$upload->hash.DIRECTORY_SEPARATOR.$upload->name);
        } else {
            return "";
        }
    }


// LAHelper::print_menu_editor($menu)
    public static function print_menu_editor($menu) {
        $editing = \Collective\Html\FormFacade::open(['route' => [config('laraadmin.adminRoute').'.la_menus.destroy', $menu->id], 'method' => 'delete', 'style'=>'display:inline']);
        $editing .= '<button class="btn btn-xs btn-danger pull-right"><i class="fa fa-times"></i></button>';
        $editing .= \Collective\Html\FormFacade::close();
        if($menu->type != "module") {
            $info = (object) array();
            $info->id = $menu->id;
            $info->name = $menu->name;
            $info->url = $menu->url;
            $info->type = $menu->type;
            $info->icon = $menu->icon;

            $editing .= '<a class="editMenuBtn btn btn-xs btn-success pull-right" info=\''.json_encode($info).'\'><i class="fa fa-edit"></i></a>';
        }

        if($menu->type == "module") {
            $info = (object) array();
            $info->id = $menu->id;
            $info->name = $menu->menu_custom_name;
            $info->url = $menu->url;
            $info->type = $menu->type;
            $info->icon = $menu->icon;
            $editing .= '<a class="editMenuBtn btn btn-xs btn-success pull-right" info=\''.json_encode($info).'\'><i class="fa fa-edit"></i></a>';
        }



        $_n ="";

        if($menu->menu_custom_name == "")
            $_n = $menu->name;
        else
            $_n = $menu->menu_custom_name;
        $str = '<li class="dd-item dd3-item" data-id="'.$menu->id.'">
		<div class="dd-handle dd3-handle"></div>
		<div class="dd3-content"><i class="fa '.$menu->icon.'"></i> '.$_n.' '.$editing.'</div>';

        $childrens = \Dwij\Laraadmin\Models\Menu::where("parent", $menu->id)->orderBy('hierarchy', 'asc')->get();

        if(count($childrens) > 0) {
            $str .= '<ol class="dd-list">';
            foreach($childrens as $children) {
                $str .= LAHelper::print_menu_editor($children);
            }
            $str .= '</ol>';
        }
        $str .= '</li>';
        return $str;
    }



    public static function print_menu($menu, $active = false) {

        $i = 0;
        $men = \Dwij\Laraadmin\Models\Menu::where("parent",  $menu->id)->orderBy('hierarchy', 'asc')->get();
        $count = \Dwij\Laraadmin\Models\Menu::where("parent",  $menu->id)->orderBy('hierarchy', 'asc')->count();

        if($menu->type != "module" && $count > 0) {
            
            foreach ($men as $key => $mod) {
                
                $temp_module_obj = Module::get($mod->toArray()['name']);

                if (isset($temp_module_obj)  && LAFormMaker::la_access($temp_module_obj->id, 'view', Auth::id())) {
                    $i++;
                }
            }

            if ($i == 0) {
                
                return '';
            }
        }


        $childrens = \Dwij\Laraadmin\Models\Menu::where("parent", $menu->id)->orderBy('hierarchy', 'asc')->get();

        foreach($childrens as $children) {

            if($children->url == Request::segment(2)){
                $active = true;
            }
                
        }
        
        $act = '';
        $color = '';
        if($active) {
            $act = "active";
            $color = 'style="color:white"';
        }
        
        
        if($menu->url == Request::segment(2)){
            $color = 'style="color:white"';
        }
        
            
        $treeview = "";
        $subviewSign = "";
        if(count($childrens)) {
            $treeview = " class=\"treeview ".$act."\"";
            $subviewSign = '<i class="fa fa-angle-left pull-right"></i>';
        }
        $active_str = '';
        if($active) {
            $active_str = 'class="active"';
        }


        $temp_module_obj = Module::get($menu->name);
        $str = "";
        if(isset($temp_module_obj) && LAFormMaker::la_access($temp_module_obj->id, 'view',  Auth::id()) ){
            $str = '<li'.$treeview.' '.$active_str.'><a href="'.url(config("laraadmin.adminRoute") . '/' . $menu->url ) .'"><i class="fa '.$menu->icon.'"></i> <span '.$color.'>'.LAHelper::real_module_name($menu->name).'</span> '.$subviewSign.'</a>';
        }

        if(!isset($temp_module_obj)){
            $str = '<li'.$treeview.' '.$active_str.'><a href="'.url(config("laraadmin.adminRoute") . '/' . $menu->url ) .'"><i class="fa '.$menu->icon.'"></i> <span '.$color.'>'.LAHelper::real_module_name($menu->name).'</span> '.$subviewSign.'</a>';
        }




        
        if(count($childrens)) {
            $str .= '<ul class="treeview-menu">';
            foreach($childrens as $children) {
                $str .= LAHelper::print_menu($children);
            }
            $str .= '</ul>';
        }
        $str .= '</li>';
        return $str;
    }

    // LAHelper::laravel_ver()
    public static function laravel_ver() {
        $var = \App::VERSION();

        if(starts_with($var, "5.2")) {
            return 5.2;
        } else if(starts_with($var, "5.3")) {
            return 5.3;
        } else if(substr_count($var, ".") == 3) {
            $var = substr($var, 0, strrpos($var, "."));
            return $var."-str";
        } else {
            return floatval($var);
        }
    }

    public static function real_module_name($name){
        $name = str_replace('_', ' ', $name);
        return $name;
    }

    // LAHelper::getLineWithString()
    public static function getLineWithString($fileName, $str) {
        $lines = file($fileName);
        foreach ($lines as $lineNumber => $line) {
            if (strpos($line, $str) !== false) {
                return $line;
            }
        }
        return -1;
    }

    // LAHelper::getLineWithString2()
    public static function getLineWithString2($content, $str) {
        $lines = explode(PHP_EOL, $content);
        foreach ($lines as $lineNumber => $line) {
            if (strpos($line, $str) !== false) {
                return $line;
            }
        }
        return -1;
    }

    // LAHelper::setenv("CACHE_DRIVER", "array");
    public static function setenv($param, $value) {

        $envfile = LAHelper::openFile('.env');
        $line = LAHelper::getLineWithString('.env', $param.'=');
        $envfile = str_replace($line, $param . "=" . $value."\n", $envfile);
        file_put_contents('.env', $envfile);

        $_ENV[$param] = $value;
        putenv($param . "=" . $value);
    }

    public static function openFile($from) {
        $md = file_get_contents($from);
        return $md;
    }



    public static function cropThumbnail($filepath, $thumbpath, $thumbnail_width, $thumbnail_height, $background=false){
        list($original_width, $original_height, $original_type) = getimagesize($filepath);

        if ($original_type === 2) {
            $imgt = "ImageJPEG";
            $imgcreatefrom = "ImageCreateFromJPEG";
        } else if ($original_type === 3) {
            $imgt = "ImagePNG";
            $imgcreatefrom = "ImageCreateFromPNG";
        } else {
             return self::createThumbnail($filepath, $thumbpath, $thumbnail_width, $thumbnail_height, $background=false);
        }

        $old_image = $imgcreatefrom($filepath);

        $width  = imagesx($old_image);
        $height = imagesy($old_image);
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        
        /////////////////// FIT VERSION ////////////////////////////////
        if(($width / $height) < ($thumbnail_width/$thumbnail_height)){
            $scale = $thumbnail_width/$width;
            $newX = 0;
            $newY = - ($scale * $height - $thumbnail_width) / 2;
        }else{
            $scale = $thumbnail_height/$height;
            $newX = - ($scale * $width - $thumbnail_width) / 2;
            $newY = 0;
        }

        $dest = imagecreatetruecolor($thumbnail_width, $thumbnail_height);

        imagecopyresampled($dest, $old_image, $newX, $newY, 0, 0, $scale * $width, $scale * $height, $width, $height);
        $imgt($dest, $thumbpath);
        return file_exists($thumbpath);
        //////////////////////// CENTER CROP WITHOUT ZOOM OUT ///////////////////////////



        // $cropWidthHalf  = round($thumbnail_width / 2); // could hard-code this but I'm keeping it flexible
        // $cropHeightHalf = round($thumbnail_height / 2);
        
        // $x1 = max(0, $centreX - $cropWidthHalf);
        // $y1 = max(0, $centreY - $cropHeightHalf);
        
        // $x2 = min($width, $centreX + $cropWidthHalf);
        // $y2 = min($height, $centreY + $cropHeightHalf);


        // $temp = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
        // imagecopy($temp, $old_image, 0, 0, $x1, $y1, $thumbnail_width, $thumbnail_width);
        // $imgt($temp, $thumbpath);
        // return file_exists($thumbpath);
    }




    public static function createThumbnail($filepath, $thumbpath, $thumbnail_width, $thumbnail_height, $background=false) {
        list($original_width, $original_height, $original_type) = getimagesize($filepath);
        if ($original_width > $original_height) {
            $new_width = $thumbnail_width;
            $new_height = intval($original_height * $new_width / $original_width);
        } else {
            $new_height = $thumbnail_height;
            $new_width = intval($original_width * $new_height / $original_height);
        }
        $dest_x = intval(($thumbnail_width - $new_width) / 2);
        $dest_y = intval(($thumbnail_height - $new_height) / 2);
        if ($original_type === 1) {
            $imgt = "ImageGIF";
            $imgcreatefrom = "ImageCreateFromGIF";
        } else if ($original_type === 2) {
            $imgt = "ImageJPEG";
            $imgcreatefrom = "ImageCreateFromJPEG";
        } else if ($original_type === 3) {
            $imgt = "ImagePNG";
            $imgcreatefrom = "ImageCreateFromPNG";
        } else {
            return false;
        }
        $old_image = $imgcreatefrom($filepath);
        $new_image = imagecreatetruecolor($thumbnail_width, $thumbnail_height); 
        
        if(is_array($background) && count($background) === 3) {
            list($red, $green, $blue) = $background;
            $color = imagecolorallocate($new_image, $red, $green, $blue);
            imagefill($new_image, 0, 0, $color);
            
        } else if($background === 'transparent' && $original_type === 3) {
            imagesavealpha($new_image, TRUE);
            $color = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
            imagefill($new_image, 0, 0, $color);
        }
        imagecopyresampled($new_image, $old_image, $dest_x, $dest_y, 0, 0, $new_width, $new_height, $original_width, $original_height);
        $imgt($new_image, $thumbpath);
        return file_exists($thumbpath);
    }

    public static function print_menu_topnav($menu, $active = false) {
		$childrens = \Dwij\Laraadmin\Models\Menu::where("parent", $menu->id)->orderBy('hierarchy', 'asc')->get();

		$treeview = "";
		$treeview2 = "";
		$subviewSign = "";
		if(count($childrens)) {
			$treeview = " class=\"dropdown\"";
			$treeview2 = " class=\"dropdown-toggle\" data-toggle=\"dropdown\"";
			$subviewSign = ' <span class="caret"></span>';
		}
		$active_str = '';
		if($active) {
			$active_str = 'class="active"';
		}
		
		$str = '<li '.$treeview.''.$active_str.'><a '.$treeview2.' href="'.url(config("laraadmin.adminRoute") . '/' . $menu->url ) .'">'.LAHelper::real_module_name($menu->name).$subviewSign.'</a>';
		
		if(count($childrens)) {
			$str .= '<ul class="dropdown-menu" role="menu">';
			foreach($childrens as $children) {
				$str .= LAHelper::print_menu_topnav($children);
			}
			$str .= '</ul>';
		}
		$str .= '</li>';
		return $str;
	}
}
