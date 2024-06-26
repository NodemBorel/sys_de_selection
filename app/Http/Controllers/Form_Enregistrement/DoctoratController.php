<?php

namespace App\Http\Controllers\Form_Enregistrement;

use App\Http\Controllers\Controller;
use App\Models\Doctorat;
use Illuminate\Http\Request;

class DoctoratController extends Controller
{
    public function doctorat(){
        return view('forms.doctorat');
    }

    public function save(Request $request){
        
        $etudiant = new Doctorat();

        $file1 = $request->acte_naissance;
        $filename = time().'A.'.$file1->getClientOriginalExtension();
        $request->acte_naissance->move('uploads/PHD', $filename);
        $etudiant->acte_naissance = $filename;

        $file2 = $request->releve;
        $filename = time().'R.'.$file2->getClientOriginalExtension();
        $request->releve->move('uploads/PHD', $filename);
        $etudiant->releve = $filename;

        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->sexe = $request->sexe;
        $etudiant->nationalite = $request->nationalite;
        $etudiant->email = $request->email;
        $etudiant->age = $request->age;
        $etudiant->region = $request->region;
        $etudiant->nomEtb5 = $request->nomEtb5;
        $etudiant->mgp5 = $request->mgp5;
        $etudiant->numero = $request->numero;
        $etudiant->filiere = $request->filiere;
        $etudiant->numActe = $request->numero_acte;
        $etudiant->dateNaiss = $request->date_naissance;
        $etudiant->lieuNaiss = $request->lieu_naissance;
        $etudiant->langue = $request->langue;
        $etudiant->adresse = $request->adresse;
        $etudiant->provDiplome = $request->provDiplome;
        $etudiant->save();

        return redirect('/doctorat')->with('message', 'Vos Informations sont enrégistrées avec succes!');
    }
}
