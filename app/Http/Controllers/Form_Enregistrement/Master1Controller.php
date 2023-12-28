<?php

namespace App\Http\Controllers\Form_Enregistrement;

use App\Http\Controllers\Controller;
use App\Models\Master1;
use Illuminate\Http\Request;

class Master1Controller extends Controller
{
    public function master1(){
        return view('forms.master1');
    }

    public function save(Request $request){

        $etudaiant = new Master1();

        $etudaiant->nom = $request->nom;
        $etudaiant->prenom = $request->prenom;
        $etudaiant->sexe = $request->sexe;
        $etudaiant->nationalite = $request->nationalite;
        $etudaiant->email = $request->email;
        $etudaiant->age = $request->age;
        $etudaiant->region = $request->region;
        $etudaiant->nomEtb3 = $request->nomEtb3;
        $etudaiant->mgp3 = $request->mgp3;
        $etudaiant->numero = $request->numero;
        $etudaiant->filiere = $request->filiere;
        $etudaiant->numActe = $request->numero_acte;
        $etudaiant->dateNaiss = $request->date_naissance;
        $etudaiant->lieuNaiss = $request->lieu_naissance;
        $etudaiant->langue = $request->langue;
        $etudaiant->adresse = $request->adresse;
        $etudaiant->provDiplome = $request->provDiplome;
        $etudaiant->save();

        return redirect('/master-1')->with('message', 'Vos Informations sont enrégistrées avec succes!');
    }
}
