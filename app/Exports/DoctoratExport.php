<?php

namespace App\Exports;

use App\Models\DoctoratSelect;
use Maatwebsite\Excel\Concerns\FromCollection;

class DoctoratExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DoctoratSelect::all(
            'nom',
            'prenom',
            'sexe',
            'nationalite',
            'email',
            'age',
            'region',
            'nomEtb5',
            'mgp5',
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
