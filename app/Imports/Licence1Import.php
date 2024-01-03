<?php

namespace App\Imports;

use App\Models\Licence1;
use Maatwebsite\Excel\Concerns\ToModel;

class Licence1Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Licence1([
            'nom' => $row[0],
            'prenom' => $row[1],
            'sexe' => $row[2],
            'nationalite' => $row[3],
            'email' => $row[4],
            'typebaccalaureat' => $row[5],
            'moyenne' => $row[6],
            'age' => $row[7],
            'region' => $row[8],
            'nomEtb' => $row[9],
            'numero' => $row[10],
            'filiere' => $row[11],
            'numActe' => $row[12],
            'dateNaiss' => $row[13],
            'lieuNaiss' => $row[14],
            'langue' => $row[15],
            'adresse' => $row[16],
            'anneebac' => $row[17],
            'delivBac' => $row[18],
        ]);
    }
}
