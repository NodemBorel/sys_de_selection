<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Licence3Select;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Licence3;
use Illuminate\Support\Facades\File;

class Licence3Controller extends Controller
{
    private $candidats;
    public function licence3(Request $request)
    {
        $candidats_tous = DB::table('licence3s')->get();

        $filiere = $request->input('filiere');
        $typebaccalaureat = $request->input('typebaccalaureat');
        $nationalite = $request->input('nationalite');
        $age = $request->input('age');
        $sexes = $request->input('sexe', []);
        $region = $request->input('region');
        $provDiplome = $request->input('provDiplome');
        $mgp2 = (float)$request->input('mgp2');

        $query = DB::table('licence3s');

        if ($filiere) {
            $query->where('filiere', $filiere);
        }

        if ($mgp2) {
            $query->where('mgp2', '>=', $mgp2);
        }

        if ($typebaccalaureat) {
            $query->where('typebaccalaureat', $typebaccalaureat);
        }

        if ($nationalite) {
            $query->where('nationalite', $nationalite);
        }

        if ($age) {
            $query->where('age' , '<=', $age);
        }

        if ($sexes) {
            $query->whereIn('sexe', $sexes);
        }

        if ($region) {
            $query->where('region', $region);
        }

        if ($provDiplome) {
            $query->where('provDiplome', $provDiplome);
        }

        $candidats = $query->get();

        $candidats_non = collect([]);

        if ($request->has('selectionner')) {
            $this->candidats = $query->get();
            $candidats_non = DB::table('licence3s')
                ->where('mgp2', '<', $mgp2)
                ->orWhere('filiere', '!=', $filiere)
                ->get();

            foreach ($candidats_non as $candidat) {
                if ($candidat->mgp2 < $mgp2 && $candidat->filiere != $filiere) {
                    $candidat->motif = 'MGP insuffisant et Filiere non sélectionnée';
                } else if ($candidat->mgp2 < $mgp2) {
                    $candidat->motif = 'MGP insuffisant';
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
        session()->save();

        $select3 = DB::table('licence3_selects')->get();

        //  Pourcentages de sexe
        $totalUsers = max(1, Licence3Select::count());
        $maleCount = Licence3Select::where('sexe', 'Masculin')->count();
        $femaleCount = Licence3Select::where('sexe', 'Feminin')->count();

        // Calcul des pourcentages
        $malePercentage = ($maleCount / $totalUsers) * 100;
        $femalePercentage = ($femaleCount / $totalUsers) * 100;

        $ages = Licence3Select::pluck('age')->toArray();

        $averageAge = count($ages) > 0 ? array_sum($ages) / count($ages) : 0;
        $minAge = count($ages) > 0 ? min($ages) : 0;
        $maxAge = count($ages) > 0 ? max($ages) : 0;

        //mgp
        $moyenne = Licence3Select::pluck('mgp2')->toArray();

        $averageMoy = count($moyenne) > 0 ? array_sum($moyenne) / count($moyenne) : 0;
        $minMoyenne = count($moyenne) > 0 ? min($moyenne) : 0;
        $maxMoyenne = count($moyenne) > 0 ? max($moyenne) : 0;

        $data = [
            'candidats' => $candidats,
            'candidats_tous' => $candidats_tous,
            'candidats_non' => $candidats_non,
            'select' => $select3,
            'malePercentage' => $malePercentage,
            'femalePercentage' => $femalePercentage,
            'averageAge' => $averageAge,
            'minAge' => $minAge,
            'maxAge' => $maxAge,
            'averageMoy' => $averageMoy,
            'minMoyenne' => $minMoyenne,
            'maxMoyenne' => $maxMoyenne,
        ];
    
        return view("admin.licence3", $data); 
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
        $data = Licence3::find($doc);
        return view('Admin/ViewDoc/ViewActeNaissL3', compact('data'));
    }

    public function view_releve($doc){
        $data = Licence3::find($doc);
        return view('Admin/ViewDoc/ViewReleveL3', compact('data'));
    }

    public function validselect()
    {
        $candidats = session('candidats');
        if ($candidats) {
            $successCount = 0;
            $alreadyExistsCount = 0;  // To track candidates already in the table

            // Get the current maximum value of 'Additive' from 'Licence1Select'
            $currentAdditive = Licence3Select::max('Additive');
            $currentAdditive = is_null($currentAdditive) ? 0 : $currentAdditive + 1;  // Initialize to 0 if null, otherwise increment by 1

            DB::beginTransaction();  // Start a transaction for data integrity
            try {
                foreach ($candidats as $candidat) {
                    // Check if a record with the same 'numActe' already exists in 'Licence1Select'
                    $exists = Licence3Select::where('numActe', $candidat->numActe)->exists();
                    if (!$exists) {
                        // If not exists, delete from 'licence1s' and insert into 'Licence1Select'
                        if (isset($candidat->id)) {
                            DB::table('licence3s')->where('id', $candidat->id)->delete();
                        }

                        $select = new Licence3Select;
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

    public function delete_select(){

        DB::table('licence3_selects')->truncate();

        return redirect()->back();
    }

    public function delete_list()
    {

        DB::table('licence3s')->truncate();

        return redirect()->back();
    }
}
