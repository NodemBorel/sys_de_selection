<?php

namespace App\Exports;

use App\Models\Licence2Select;
use Maatwebsite\Excel\Concerns\FromCollection;

class Licence2Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Licence2Select::all(
            'nom',
            'prenom',
            'sexe',
            'nationalite',
            'email',
            'typebaccalaureat',
            'moyenne',
            'age',
            'region',
            'nomEtb1',
            'mgp1',
            'numero',
            'filiere',
            'numActe',
            'dateNaiss',
            'lieuNaiss',
            'langue',
            'adresse',
            'delivBac',
            'provDiplome',
        );
    }
}
