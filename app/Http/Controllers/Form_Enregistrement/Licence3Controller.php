<?php

namespace App\Http\Controllers\Form_Enregistrement;

use App\Http\Controllers\Controller;
use App\Models\Licence3;
use Illuminate\Http\Request;

class Licence3Controller extends Controller
{
    public function licence3(){
        return view('forms.licence3');
    }

    public function save(Request $request){

        $etudiant = new Licence3();

        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->sexe = $request->sexe;
        $etudiant->nationalite = $request->nationalite;
        $etudiant->email = $request->email;
        $etudiant->typebaccalaureat = $request->typebaccalaureat;
        $etudiant->moyenne = $request->moyenne;
        $etudiant->age = $request->age;
        $etudiant->region = $request->region;
        $etudiant->nomEtb1 = $request->nomEtb1;
        $etudiant->mgp1 = $request->mgp1;
        $etudiant->nomEtb2 = $request->nomEtb2;
        $etudiant->mgp2 = $request->mgp2;
        $etudiant->numero = $request->numero;
        $etudiant->filiere = $request->filiere;
        $etudiant->numActe = $request->numero_acte;
        $etudiant->dateNaiss = $request->date_naissance;
        $etudiant->lieuNaiss = $request->lieu_naissance;
        $etudiant->langue = $request->langue;
        $etudiant->adresse = $request->adresse;
        $etudiant->provDiplome = $request->provDiplome;
        $etudiant->save();
        
        return redirect('/licence-3')->with('message', 'Vos Informations sont enrégistrées avec succes!');
    }
}
