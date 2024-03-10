<?php

namespace App\Http\Controllers\Form_Enregistrement;

use App\Http\Controllers\Controller;
use App\Models\Licence1;
use Illuminate\Http\Request;

class Licence1Controller extends Controller
{
    public function licence1(){
        return view('forms.licence1');
    }

    public function save(Request $request){

        $etudiant = new Licence1();

        $file1 = $request->acte_naissance;
        $filename = $file1->getClientOriginalName();
        $request->acte_naissance->move('uploads/L1', $filename);
        $etudiant->acte_naissance = $filename;

        $file2 = $request->releve_bac;
        $filename = $file2->getClientOriginalName();
        $request->releve_bac->move('uploads/L1', $filename);
        $etudiant->releve_bac = $filename;

        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->sexe = $request->sexe;
        $etudiant->nationalite = $request->nationalite;
        $etudiant->email = $request->email;
        $etudiant->typebaccalaureat = $request->typebaccalaureat;
        $etudiant->moyenne = $request->moyenne;
        $etudiant->age = $request->age;
        $etudiant->region = $request->region;
        $etudiant->nomEtb = $request->nomEtb;
        $etudiant->numero = $request->numero;
        $etudiant->filiere = $request->filiere;
        $etudiant->numActe = $request->numero_acte;
        $etudiant->dateNaiss = $request->date_naissance;
        $etudiant->lieuNaiss = $request->lieu_naissance;
        $etudiant->langue = $request->langue;
        $etudiant->adresse = $request->adresse;
        $etudiant->anneebac = $request->annee_baccalaureat;
        $etudiant->delivBac = $request->diplome_deliv;
        $etudiant->save();

        return redirect('/licence-1')->with('message', 'Vos Informations sont enrégistrées avec succes!');

    }
}
