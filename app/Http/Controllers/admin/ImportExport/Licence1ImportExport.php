<?php

namespace App\Http\Controllers\Admin\ImportExport;

use Illuminate\Http\Request;
use App\Exports\Licence1Export;
use App\Imports\Licence1Import;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class Licence1ImportExport extends Controller
{
    public function import(Request $request){
        Excel::import(new Licence1Import, $request->file('file')->store('files'));
        return redirect('/licence1')->with('message', 'Importer avec success');
    }

    public function export(){
        return Excel::download(new Licence1Export, 'Licence1.xlsx');
    }

    public function exportpdf(){
        $candidats = DB::table('licence1_selects')->get();
        
        // Configuration de Dompdf pour un grand format
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf_export.exportL1', compact('candidats'));
        $pdf->setPaper('A4', 'landscape'); // Définir le format de papier A3 en mode paysage
        
        return $pdf->download('exportPdfNiveau1.pdf');
    }
}
