<?php

namespace App\Http\Controllers\Admin\ImportExport;

use Exception;
use Illuminate\Http\Request;
use App\Exports\Licence1Export;
use App\Imports\Licence1Import;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class Licence1ImportExport extends Controller
{
    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        try {
            // Store the uploaded file and import its contents
            $filePath = $request->file('file')->store('files');
            Excel::import(new Licence1Import, $filePath);

            // Redirect with a success message
            return redirect('/licence1')->with('message', 'Importé avec succès');
        } catch (Exception $e) {
            // Handle any errors that occur during the import process
            return redirect('/licence1')->with('message', 'Erreur lors de l\'importation: ' . $e->getMessage());
        }
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
