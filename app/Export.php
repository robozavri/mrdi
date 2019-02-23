<?php
/**
 * Model genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Mrdi;

class Export implements FromCollection
{
    public function collection()
    {
        return Mrdi::all();
    }
}
