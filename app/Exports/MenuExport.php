<?php

// app/Exports/MenuExport.php
namespace App\Exports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\FromCollection;

class MenuExport implements FromCollection
{
    public function collection()
    {
        return Menu::all();
    }
}
