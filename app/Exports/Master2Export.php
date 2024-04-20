<?php

namespace App\Exports;

use App\Models\Master2Select;
use Maatwebsite\Excel\Concerns\FromCollection;

class Master2Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Master2Select::all(
            'nom',
            'prenom',
            'sexe',
            'nationalite',
            'email',
            'age',
            'region',
            'nomEtb4',
            'mgp4',
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
