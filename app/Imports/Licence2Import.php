<?php

namespace App\Imports;

use App\Models\Licence2;
use Maatwebsite\Excel\Concerns\ToModel;

class Licence2Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Licence2([
            'nom' => $row[0],
            'prenom' => $row[1],
            'sexe' => $row[2],
            'nationalite' => $row[3],
            'email' => $row[4],
            'typebaccalaureat' => $row[5],
            'moyenne' => $row[6],
            'age' => $row[7],
            'region' => $row[8],
            'nomEtb1' => $row[9],
            'mgp1' => $row[10],
            'numero' => $row[11],
            'filiere' => $row[12],
            'numActe' => $row[13],
            'dateNaiss' => $row[14],
            'lieuNaiss' => $row[15],
            'langue' => $row[16],
            'adresse' => $row[17],
            'delivBac' => $row[18],
            'provDiplome' => $row[19],
        ]);
    }
}
