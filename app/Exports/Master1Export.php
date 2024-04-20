<?php

namespace App\Exports;

use App\Models\Master1Select;
use Maatwebsite\Excel\Concerns\FromCollection;

class Master1Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Master1Select::all(
            'nom',
            'prenom',
            'sexe',
            'nationalite',
            'email',
            'age',
            'region',
            'nomEtb3',
            'mgp3',
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
