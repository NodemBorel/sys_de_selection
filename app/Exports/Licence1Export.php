<?php

namespace App\Exports;

use App\Models\Licence1;
use Maatwebsite\Excel\Concerns\FromCollection;

class Licence1Export implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Licence1::select(
            'nom',
            'prenom',
            'sexe',
            'nationalite',
            'email',
            'typebaccalaureat',
            'moyenne',
            'age',
            'region',
            'nomEtb',
            'numero',
            'filiere',
            'numActe',
            'dateNaiss',
            'lieuNaiss',
            'langue',
            'adresse',
            'anneebac',
            'delivBac',
        )->get();
    }
}
