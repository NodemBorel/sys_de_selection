<?php

namespace App\Http\Controllers\Form_Enregistrement;

use App\Http\Controllers\Controller;
use App\Models\Master2;
use Illuminate\Http\Request;

class Master2Controller extends Controller
{
    public function master2(){
        return view('forms.master2');
    }

    public function save(Request $request){
        
        $etudiant = new Master2();

        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->sexe = $request->sexe;
        $etudiant->nationalite = $request->nationalite;
        $etudiant->email = $request->email;
        $etudiant->age = $request->age;
        $etudiant->region = $request->region;
        $etudiant->nomEtb4 = $request->nomEtb4;
        $etudiant->mgp4 = $request->mgp4;
        $etudiant->numero = $request->numero;
        $etudiant->filiere = $request->filiere;
        $etudiant->numActe = $request->numero_acte;
        $etudiant->dateNaiss = $request->date_naissance;
        $etudiant->lieuNaiss = $request->lieu_naissance;
        $etudiant->langue = $request->langue;
        $etudiant->adresse = $request->adresse;
        $etudiant->provDiplome = $request->provDiplome;
        $etudiant->save();

        return redirect('/master-2')->with('message', 'Vos Informations sont enrégistrées avec succes!');
    }
}
