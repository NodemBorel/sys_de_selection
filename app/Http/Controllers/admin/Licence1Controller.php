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
    public function licence1(Request $request){

        $candidats = DB::table('licence1s')->get();
        //$totalCandidat = $candidats->count();

        $nationalite = $request->input('nationalite');
        $moyenneBaccalaureat = (float)$request->input('moyenne');
        $typebaccalaureat = $request->input('typebaccalaureat');
        $age = $request->input('age');
        $pourcentageFemmes = $request->input('pourcentageFemmes');
        $pourcentageHommes = $request->input('pourcentageHommes');
        $pourcentageCmr = $request->input('pourcentageCmr');
        $pourcentageAutrePay = $request->input('pourcentageAutrePay');
        //$sexe = $request->input('sexe');
        //$region = $request->input('region');
        $filiere = $request->input('filiere');

        $query = DB::table('licence1s');

        if ($moyenneBaccalaureat) {
            $query->where('moyenne', '>=', $moyenneBaccalaureat);
        }

        if ($filiere) {
            $query->where('filiere', $filiere);
        }

        if ($typebaccalaureat) {
            $query->where('typebaccalaureat', $typebaccalaureat);
        }

        if($filiere){
            $query->where('age', '>=', $age);
        }

        $preSelect = $query->get();
        //dd($preSelect);

        $totalCandidat = $preSelect->count();
        //dd($totalCandidat);

        // Retrieve % of boys and girls from Cameroon
        $numberOfCameroonPeople = ceil(($pourcentageCmr / 100) * $totalCandidat);
        $cameroonPeople = $preSelect->where('filiere', $filiere)
            ->where('nationalite', 'Cameroun')
            ->sortByDesc('moyenne')
            ->take($numberOfCameroonPeople)
            ->pluck([]);
            //dd($cameroonPeople);
            
        // Retrieve % of boys and girls from other countries
        $numberOfOtherCountriesPeople = ceil(($pourcentageAutrePay / 100) * $totalCandidat);
        $otherCountriesPeople = $preSelect->where('filiere', $filiere)
            ->where('nationalite', '!=', 'Cameroun')
            ->sortByDesc('moyenne')
            ->take($numberOfOtherCountriesPeople)
            ->pluck([]);
            //dd($otherCountriesPeople);

        if ($cameroonPeople !== null && $otherCountriesPeople !== null) {
            $CountrySelectResult = $cameroonPeople->concat($otherCountriesPeople);
        } else {
            // Handle the case when either $cameroonPeople or $otherCountriesPeople is null
            // You can assign a default value or log an error message here
            $CountrySelectResult = collect(); // Assign an empty collection as the default value
        }
        //dd($CountrySelectResult);

        $totalCandidatCountry = $CountrySelectResult->count();
        //dd($totalCandidatCountry);

        // Retrieve % of boys
        $numberOfBoys = ceil(($pourcentageHommes / 100) * $totalCandidatCountry);
        //dd($numberOfBoys);
        $boys = $CountrySelectResult->where('sexe', 'Masculin')
            ->sortByDesc('moyenne')
            ->take($numberOfBoys)
            ->pluck([]);
            //dd($boys);

        // Retrieve % of girls
        $numberOfGirls = ceil(($pourcentageFemmes / 100) * $totalCandidatCountry);
        //dd($numberOfGirls);
        $girls = $CountrySelectResult->where('sexe', 'Féminin')
            ->sortByDesc('moyenne')
            ->take($numberOfGirls)
            ->pluck([]);   
            //dd($girls);
            
        if ($boys !== null && $girls !== null) {
            $FinalSelct = $boys->concat($girls);
        } else {
            // Handle the case when either $cameroonPeople or $otherCountriesPeople is null
            // You can assign a default value or log an error message here
            $FinalSelct = collect(); // Assign an empty collection as the default value
        };    
        //dd($FinalSelct);

        if ($request->has('selectionner')) {

            $this->candidats = $FinalSelct;

                /*$candidats_non = DB::table('candidats')
                    ->where('moyenne', '<', $moyenneBaccalaureat)
                    ->where('sexe','!=', $sexe)
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
                }*/
        } else {
            $this->candidats = collect([]); // Tableau vide si le bouton "Sélectionner" n'est pas cliqué
            //$candidats_non = collect([]); // Tableau vide également
        }

        $pre_candidats = $this->candidats;

        session(['pre_candidats' => $pre_candidats]);
        session()->save(); // Sauvegarde les données de la session

        $select = DB::table('licence1_selects')->get();

        //  Pourcentages de sexe
        //The max(1, ...) function ensures that the $totalUsers variable is always at least 1 to avoid division by zero errors.
        $totalUsers = max(1, Licence1Select::count());
        $maleCount = Licence1Select::where('sexe', 'Masculin')->count();
        $femaleCount = Licence1Select::where('sexe', 'Feminin')->count();

        // Calcul des pourcentages
        $malePercentage = ($maleCount / $totalUsers) * 100;
        $femalePercentage = ($femaleCount / $totalUsers) * 100;

        //These lines extract the ages of the users using the pluck() method on the Licence1Select model, extracting the 'age' column values. The ages are then converted to an array using toArray().
        $ages = Licence1Select::pluck('age')->toArray();

        $averageAge = count($ages) > 0 ? array_sum($ages) / count($ages) : 0;
        //$minAge uses the min() function to find the minimum age from the ages array. If there are no ages, 0 is assigned.
        $minAge = count($ages) > 0 ? min($ages) : 0;
        $maxAge = count($ages) > 0 ? max($ages) : 0;
        
        $data=[
            'pre_candidats' => $pre_candidats,
            'candidats' => $candidats,
            'select' => $select,
            'malePercentage' => $malePercentage,
            'femalePercentage' => $femalePercentage,
            'averageAge' => $averageAge,
            'minAge' => $minAge,
            'maxAge' => $maxAge,
        ];

        return view('admin.licence1',$data);
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

    public function view_acte_naiss($doc){
        $data = Licence1::find($doc);
        return view('Admin/ViewDoc/ViewActeNaissL1', compact('data'));
    }

    public function view_releve($doc){
        $data = Licence1::find($doc);
        return view('Admin/ViewDoc/ViewReleveL1', compact('data'));
    }

    public function validselect(){
        $candidats = session('pre_candidats');
        if ($candidats) {
            $successCount = 0;
            foreach ($candidats as $candidat) {
                $existingCandidat = Licence1Select::where('id', $candidat->id)
                    ->first();
                if (!$existingCandidat) {
                    $select = new Licence1Select;
                    $select->fill((array) $candidat);
                    $select->save();
                    $successCount++;
                }
            }

            if ($successCount > 0) {
                // Au moins un enregistrement réussi
                return redirect()->back()->with('message', $successCount . ' enregistrement(s) ont été ajoutés avec succès.');
            } else {
                // Aucun enregistrement ajouté (tous existent déjà)
                return redirect()->back()->with('message', 'Aucun nouvel enregistrement ajouté.');
            }
        } else {
            // Échec de l'enregistrement
            return redirect()->back()->with('message', 'Une erreur s\'est produite lors de l\'enregistrement des données.');
        }
    }

    public function delete_select(){

        DB::table('licence1_selects')->truncate();

        return redirect()->back();
    }
}
