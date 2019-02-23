<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class InvoicesExport implements FromCollection
{
    use Exportable;

    public function collection()
    {
        return Invoice::all();
    }
}