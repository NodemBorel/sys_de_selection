<?php

namespace App\Http\Controllers\Admin\ImportExport;

use Exception;
use Illuminate\Http\Request;
use App\Exports\Licence2Export;
use App\Imports\Licence2Import;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class Licence2ImportExport extends Controller
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
            Excel::import(new Licence2Import, $filePath);

            // Redirect with a success message
            return redirect('/licence2')->with('message', 'Importé avec succès');
        } catch (Exception $e) {
            // Handle any errors that occur during the import process
            return redirect('/licence2')->with('message', 'Erreur lors de l\'importation: ' . $e->getMessage());
        }
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
