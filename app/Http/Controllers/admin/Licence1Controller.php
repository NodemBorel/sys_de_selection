<?php

namespace App\Http\Controllers\Admin;

use App\Models\Licence1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Stroage;
use App\Http\Controllers\Controller;
use App\Models\Licence1Select;
use Illuminate\Support\Facades\File;

class Licence1Controller extends Controller
{
    private $candidats;
    public function licence1(Request $request)
    {
        $nationalite = $request->input('nationalite');
        $moyenneBaccalaureat = (float)$request->input('moyenne');
        $typebaccalaureat = $request->input('typebaccalaureat');
        $age = $request->input('age');
        $sexes = $request->input('sexe', []);  // Expecting array input
        $region = $request->input('region');
        $filiere = $request->input('filiere');

        $candidats_tous = DB::table('licence1s')->get();

        $query = DB::table('licence1s');

        if ($moyenneBaccalaureat) {
            $query->where('moyenne', '>=', $moyenneBaccalaureat);
        }

        if ($filiere) {
            $query->where('filiere', $filiere);
        }

        if ($sexes) {
            $query->whereIn('sexe', $sexes);
        }

        if ($nationalite) {
            $query->where('nationalite', $nationalite);
        }

        if ($region) {
            $query->where('region', $region);
        }

        if ($typebaccalaureat) {
            $query->where('typebaccalaureat', $typebaccalaureat);
        }

        if ($age) {
            $query->where('age', '<=', $age);
        }

        if ($request->has('selectionner')) {
            $this->candidats = $query->get();

            $candidats_non = DB::table('licence1s')
                ->where('moyenne', '<', $moyenneBaccalaureat)
                ->whereIn('sexe', $sexes)
                ->orWhere('filiere', '!=', $filiere)
                ->get();

            foreach ($candidats_non as $candidat) {
                if ($candidat->moyenne < $moyenneBaccalaureat && $candidat->filiere != $filiere) {
                    $candidat->motif = 'Moyenne insuffisante et Filiere non sélectionnée';
                } else if ($candidat->moyenne < $moyenneBaccalaureat) {
                    $candidat->motif = 'Moyenne insuffisante';
                } else if ($candidat->filiere != $filiere) {
                    $candidat->motif = 'Filiere non sélectionnée';
                }
            }
        } else {
            $this->candidats = collect([]); // Tableau vide si le bouton "Sélectionner" n'est pas cliqué
            $candidats_non = collect([]); // Tableau vide également
        }

        $candidats = $this->candidats;

        session(['candidats' => $candidats]);
        session()->save(); // Sauvegarde les données de la session

        $select1 = DB::table('licence1_selects')->get();

        //  Pourcentages de sexe
        $totalUsers = max(1, Licence1Select::count());
        $maleCount = Licence1Select::where('sexe', 'Masculin')->count();
        $femaleCount = Licence1Select::where('sexe', 'Feminin')->count();

        // Calcul des pourcentages
        $malePercentage = ($maleCount / $totalUsers) * 100;
        $femalePercentage = ($femaleCount / $totalUsers) * 100;

        $ages = Licence1Select::pluck('age')->toArray();

        $averageAge = count($ages) > 0 ? array_sum($ages) / count($ages) : 0;
        $minAge = count($ages) > 0 ? min($ages) : 0;
        $maxAge = count($ages) > 0 ? max($ages) : 0;

        //moyenne Bac
        $moyenne = Licence1Select::pluck('moyenne')->toArray();

        $averageMoy = count($moyenne) > 0 ? array_sum($moyenne) / count($moyenne) : 0;
        $minMoyenne = count($moyenne) > 0 ? min($moyenne) : 0;
        $maxMoyenne = count($moyenne) > 0 ? max($moyenne) : 0;


        $data = [
            'candidats' => $candidats,
            'candidats_tous' => $candidats_tous,
            'candidats_non' => $candidats_non,
            'select1' => $select1,
            'malePercentage' => $malePercentage,
            'femalePercentage' => $femalePercentage,
            'averageAge' => $averageAge,
            'minAge' => $minAge,
            'maxAge' => $maxAge,
            'averageMoy' => $averageMoy,
            'minMoyenne' => $minMoyenne,
            'maxMoyenne' => $maxMoyenne,
        ];

        return view("admin.licence1", $data);
    }


    public function blockUnblockLinks(Request $request)
    {
        $jsonFilePath = public_path('links.json');
        $linkId = $request->input('link_id');
        $status = $request->input('status'); // true for blocking, false for unblocking

        $links = json_decode(File::get($jsonFilePath), true);
        $links[$linkId]['blocked'] = $status;

        File::put($jsonFilePath, json_encode($links));

        return response()->json([
            'message1' => 'Arrete avec success',
            'message2' => 'Effectue avec success',
        ]);
    }

    /*public function downloadActeNaiss($acte_naissance) {
        $filePath = public_path('uploads/L1/'.$acte_naissance);
        //dd($filePath);
        // Check if the file exists
        if (file_exists($filePath)) {
            // Provide file for download
            return response()->download($filePath);
        } else {
            // Return error response or handle the situation as needed
            return response()->json(['error' => 'File not found'], 404);
        }
    }    */

    public function view_acte_naiss($doc)
    {
        $data = Licence1::find($doc);
        return view('Admin/ViewDoc/ViewActeNaissL1', compact('data'));
    }

    public function view_releve($doc)
    {
        $data = Licence1::find($doc);
        return view('Admin/ViewDoc/ViewReleveL1', compact('data'));
    }

    public function validselect()
{
    $candidats = session('candidats');
    if ($candidats) {
        $successCount = 0;
        $alreadyExistsCount = 0;  // To track candidates already in the table

        // Get the current maximum value of 'Additive' from 'Licence1Select'
        $currentAdditive = Licence1Select::max('Additive');
        $currentAdditive = is_null($currentAdditive) ? 0 : $currentAdditive + 1;  // Initialize to 0 if null, otherwise increment by 1

        DB::beginTransaction();  // Start a transaction for data integrity
        try {
            foreach ($candidats as $candidat) {
                // Check if a record with the same 'numActe' already exists in 'Licence1Select'
                $exists = Licence1Select::where('numActe', $candidat->numActe)->exists();
                if (!$exists) {
                    // If not exists, delete from 'licence1s' and insert into 'Licence1Select'
                    if (isset($candidat->id)) {
                        DB::table('licence1s')->where('id', $candidat->id)->delete();
                    }

                    $select = new Licence1Select;
                    $select->fill((array) $candidat);

                    // Assign the current Additive value to the new record
                    $select->Additive = $currentAdditive;

                    if ($select->save()) {
                        $successCount++;
                    }
                } else {
                    // Increment the counter if candidate already exists
                    $alreadyExistsCount++;
                }
            }
            DB::commit();  // Commit the transaction
        } catch (\Exception $e) {
            DB::rollBack();  // Roll back the transaction in case of an error
            return redirect()->back()->with('message', 'Une erreur s\'est produite lors de la modification des données: ' . $e->getMessage());
        }

        // Prepare success message
        $message = $successCount . ' enregistrement(s) ont été ajoutés avec succès.';
        if ($alreadyExistsCount > 0) {
            $message .= ' ' . $alreadyExistsCount . ' enregistrement(s) existent déjà et n\'ont pas été ajoutés.';
        }

        return redirect()->back()->with('message', $message);
    } else {
        return redirect()->back()->with('message', 'Une erreur s\'est produite lors de l\'enregistrement des données.');
    }
}


    public function delete_select()
    {

        DB::table('licence1_selects')->truncate();

        return redirect()->back();
    }

    public function delete_list()
    {

        DB::table('licence1s')->truncate();

        return redirect()->back();
    }
}
