<?php

namespace App\Http\Controllers\Admin\ImportExport;

use Illuminate\Http\Request;
use App\Exports\Licence2Export;
use App\Imports\Licence2Import;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class Licence2ImportExport extends Controller
{
    public function import(Request $request){
        Excel::import(new Licence2Import, $request->file('file')->store('files'));
        return redirect('/licence2')->with('message', 'Importer avec success');
    }

    public function export(){
        return Excel::download(new Licence2Export, 'Licence2.xlsx');
    }

    public function exportpdf(){
        $candidats = DB::table('licence2_selects')->get();
        
        // Configuration de Dompdf pour un grand format
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf_export.exportL2', compact('candidats'));
        $pdf->setPaper('A4', 'landscape'); // Définir le format de papier A3 en mode paysage
        
        return $pdf->download('exportPdfNiveau2.pdf');
    }
}
