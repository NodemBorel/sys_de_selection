<?php

namespace App\Http\Controllers\Admin\ImportExport;

use Exception;
use Illuminate\Http\Request;
use App\Exports\Master1Export;
use App\Imports\Master1Import;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class Master1ImportExport extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        try {
            $filePath = $request->file('file')->store('files');
            Excel::import(new Master1Import, $filePath);

            return redirect('/master1')->with('message', 'Importé avec succès');
        } catch (Exception $e) {
            return redirect('/master1')->with('message', 'Erreur lors de l\'importation: ' . $e->getMessage());
        }
    }

    public function export(){
        return Excel::download(new Master1Export, 'Master1.xlsx');
    }

    public function exportpdf(){
        $candidats = DB::table('master1_selects')->get();
        
        // Configuration de Dompdf pour un grand format
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf_export.exportM1', compact('candidats'));
        $pdf->setPaper('A4', 'landscape'); // Définir le format de papier A3 en mode paysage
        
        return $pdf->download('exportPdfMaster1.pdf');
    }
}
