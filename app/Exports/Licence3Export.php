<?php

namespace App\Exports;

use App\Models\Licence3Select;
use Maatwebsite\Excel\Concerns\FromCollection;

class Licence3Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Licence3Select::all(
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
            'nomEtb2',
            'mgp2',
            'numero',
            'filiere',
            'numActe',
            'dateNaiss',
            'lieuNaiss',
            'langue',
            'adresse',
            'provDiplome',
        );
    }
}
