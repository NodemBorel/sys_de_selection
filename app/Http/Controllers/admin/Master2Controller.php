<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Master2Select;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Master2;
use Illuminate\Support\Facades\File;

class Master2Controller extends Controller
{
    private $candidats;
    public function master2(Request $request){

        $candidats = DB::table('master2s')->get();
        //$totalCandidat = $candidats->count();

        $nationalite = $request->input('nationalite');
        $mgp = $request->input('mgp'); 
        //$typebaccalaureat = $request->input('typebaccalaureat');
        $age = $request->input('age');
        $pourcentageFemmes = $request->input('pourcentageFemmes');
        $pourcentageHommes = $request->input('pourcentageHommes');
        $pourcentageCmr = $request->input('pourcentageCmr');
        $pourcentageAutrePay = $request->input('pourcentageAutrePay');
        //$sexe = $request->input('sexe');
        //$region = $request->input('region');
        $filiere = $request->input('filiere');

        $query = DB::table('master2s');

        if ($mgp) {
            $query->where('mgp4', '>=', $mgp);
        }

        if ($filiere) {
            $query->where('filiere', $filiere);
        }

        if($age){
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
            ->sortByDesc('mgp4')
            ->take($numberOfCameroonPeople)
            ->pluck([]);
            //dd($cameroonPeople);
            
        // Retrieve % of boys and girls from other countries
        $numberOfOtherCountriesPeople = ceil(($pourcentageAutrePay / 100) * $totalCandidat);
        $otherCountriesPeople = $preSelect->where('filiere', $filiere)
            ->where('nationalite', '!=', 'Cameroun')
            ->sortByDesc('mgp4')
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
            ->sortByDesc('mgp4')
            ->take($numberOfBoys)
            ->pluck([]);
            //dd($boys);

        // Retrieve % of girls
        $numberOfGirls = ceil(($pourcentageFemmes / 100) * $totalCandidatCountry);
        //dd($numberOfGirls);
        $girls = $CountrySelectResult->where('sexe', 'Féminin')
            ->sortByDesc('mgp4')
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

        $select = DB::table('master2_selects')->get();

        //  Pourcentages de sexe
        //The max(1, ...) function ensures that the $totalUsers variable is always at least 1 to avoid division by zero errors.
        $totalUsers = max(1, Master2Select::count());
        $maleCount = Master2Select::where('sexe', 'Masculin')->count();
        $femaleCount = Master2Select::where('sexe', 'Feminin')->count();

        // Calcul des pourcentages
        $malePercentage = ($maleCount / $totalUsers) * 100;
        $femalePercentage = ($femaleCount / $totalUsers) * 100;

        //These lines extract the ages of the users using the pluck() method on the Licence1Select model, extracting the 'age' column values. The ages are then converted to an array using toArray().
        $ages = Master2Select::pluck('age')->toArray();

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

        return view('admin.master2',$data);
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

    public function view_acte_naiss($doc){
        $data = Master2::find($doc);
        return view('Admin/ViewDoc/ViewActeNaissM2', compact('data'));
    }

    public function view_releve($doc){
        $data = Master2::find($doc);
        return view('Admin/ViewDoc/ViewReleveM2', compact('data'));
    }

    public function validselect(){
        $candidats = session('pre_candidats');
        if ($candidats) {
            $successCount = 0;
            foreach ($candidats as $candidat) {
                
                $select = new Master2Select;
                $select->fill((array) $candidat);
                $select->save();
                $successCount++;
                
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

        DB::table('master2_selects')->truncate();

        return redirect()->back();
    }
}
