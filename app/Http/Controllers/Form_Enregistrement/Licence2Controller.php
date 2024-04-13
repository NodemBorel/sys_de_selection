<?php

namespace App\Http\Controllers\Form_Enregistrement;

use App\Http\Controllers\Controller;
use App\Models\Licence2;
use Illuminate\Http\Request;

class Licence2Controller extends Controller
{
    public function licence2(){
        return view('forms.licence2');
    }

    public function save(Request $request){

        $etudiant = new Licence2();

        $file1 = $request->acte_naissance;
        $filename = time().'A.'.$file1->getClientOriginalExtension();
        $request->acte_naissance->move('uploads/L2', $filename);
        $etudiant->acte_naissance = $filename;

        $file2 = $request->releve;
        $filename = time().'R.'.$file2->getClientOriginalExtension();
        $request->releve->move('uploads/L2', $filename);
        $etudiant->releve = $filename;

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
        $etudiant->numero = $request->numero;
        $etudiant->filiere = $request->filiere;
        $etudiant->numActe = $request->numero_acte;
        $etudiant->dateNaiss = $request->date_naissance;
        $etudiant->lieuNaiss = $request->lieu_naissance;
        $etudiant->langue = $request->langue;
        $etudiant->adresse = $request->adresse;
        $etudiant->delivBac = $request->input('delivBac');
        $etudiant->provDiplome = $request->provDiplome;
        $etudiant->save();

        return redirect('/licence-2')->with('message', 'Vos Informations sont enrégistrées avec succes!');
    }
}
