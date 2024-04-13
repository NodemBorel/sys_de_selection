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

        $etudiant = new Master1();

        $file1 = $request->acte_naissance;
        $filename = time().'A.'.$file1->getClientOriginalExtension();
        $request->acte_naissance->move('uploads/M1', $filename);
        $etudiant->acte_naissance = $filename;

        $file2 = $request->releve;
        $filename = time().'R.'.$file2->getClientOriginalExtension();
        $request->releve->move('uploads/M1', $filename);
        $etudiant->releve = $filename;

        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->sexe = $request->sexe;
        $etudiant->nationalite = $request->nationalite;
        $etudiant->email = $request->email;
        $etudiant->age = $request->age;
        $etudiant->region = $request->region;
        $etudiant->nomEtb3 = $request->nomEtb3;
        $etudiant->mgp3 = $request->mgp3;
        $etudiant->numero = $request->numero;
        $etudiant->filiere = $request->filiere;
        $etudiant->numActe = $request->numero_acte;
        $etudiant->dateNaiss = $request->date_naissance;
        $etudiant->lieuNaiss = $request->lieu_naissance;
        $etudiant->langue = $request->langue;
        $etudiant->adresse = $request->adresse;
        $etudiant->provDiplome = $request->provDiplome;
        $etudiant->save();

        return redirect('/master-1')->with('message', 'Vos Informations sont enrégistrées avec succes!');
    }
}
