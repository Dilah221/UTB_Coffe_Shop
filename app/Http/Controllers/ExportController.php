<?php

// app/Http/Controllers/ExportController.php
namespace App\Http\Controllers;

use App\Models\Menu;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MenuExport;
use PDF;

class ExportController extends Controller
{
    public function dashboard()
    {
        $menus = Menu::all(); // ✅ Ambil semua data dari tabel menu

        return view('dashboard', compact('menus')); // ✅ sekarang $menus sudah ada
    }

    public function exportExcel()
    {
        return Excel::download(new MenuExport, 'menus.xlsx');
    }

    public function exportPdf()
    {
        $menus = Menu::all();
        $pdf = PDF::loadView('exports.menu_pdf', compact('menus'));
        return $pdf->download('menus.pdf');
    }
}

