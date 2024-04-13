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

        $request->validate([
            'acte_naissance' => 'required|file',
            'releve' => 'required|file',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'sexe' => 'required|string',
            'nationalite' => 'required|string',
            'email' => 'required|email',
            'typebaccalaureat' => 'required|string',
            'moyenne' => 'required|numeric|between:0,20',
            'age' => 'required|numeric',
            'region' => 'required|string',
            'nomEtb1' => 'required|string',
            'mgp1' => 'required|numeric',
            'nomEtb2' => 'required|string',
            'mgp2' => 'required|numeric',
            'numero' => 'required|string',
            'filiere' => 'required|string',
            'numero_acte' => 'required|string',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string',
            'langue' => 'required|string',
            'adresse' => 'required|string',
            'provDiplome' => 'required|string',
        ]);

        $etudiant = new Licence3();

        $file1 = $request->acte_naissance;
        $filename = time().'A.'.$file1->getClientOriginalExtension();
        $request->acte_naissance->move('uploads/L3', $filename);
        $etudiant->acte_naissance = $filename;

        $file2 = $request->releve;
        $filename = time().'R.'.$file2->getClientOriginalExtension();
        $request->releve->move('uploads/L3', $filename);
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
