<?php

namespace App\Http\Controllers\Admin\ImportExport;

use Illuminate\Http\Request;
use App\Exports\Licence3Export;
use App\Imports\Licence3Import;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class Licence3ImportExport extends Controller
{
    public function import(Request $request){
        Excel::import(new Licence3Import, $request->file('file')->store('files'));
        return redirect('/licence3')->with('message', 'Importer avec success');
    }

    public function export(){
        return Excel::download(new Licence3Export, 'Licence3.xlsx');
    }

    public function exportpdf(){
        $candidats = DB::table('licence3_selects')->get();
        
        // Configuration de Dompdf pour un grand format
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf_export.exportL3', compact('candidats'));
        $pdf->setPaper('A4', 'landscape'); // Définir le format de papier A3 en mode paysage
        
        return $pdf->download('exportPdfNiveau3.pdf');
    }
}
