<?php

namespace App\Http\Controllers\Admin\ImportExport;

use Exception;
use Illuminate\Http\Request;
use App\Exports\DoctoratExport;
use App\Imports\DoctoratImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class DoctoratImportExport extends Controller
{
    public function import(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        try {
            $filePath = $request->file('file')->store('files');
            Excel::import(new DoctoratImport, $filePath);

            return redirect('/doctorat')->with('message', 'Importé avec succès');
        } catch (Exception $e) {
            return redirect('/doctorat')->with('message', 'Erreur lors de l\'importation: ' . $e->getMessage());
        }
    }

    public function export(){
        return Excel::download(new DoctoratExport, 'Doctorat.xlsx');
    }

    public function exportpdf(){
        $candidats = DB::table('doctorat_selects')->get();
        
        // Configuration de Dompdf pour un grand format
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf_export.exportPHD', compact('candidats'));
        $pdf->setPaper('A4', 'landscape'); // Définir le format de papier A3 en mode paysage
        
        return $pdf->download('exportPdfDoctorat.pdf');
    }
}
