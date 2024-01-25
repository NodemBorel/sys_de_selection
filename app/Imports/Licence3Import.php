<?php

namespace App\Imports;

use App\Models\Licence3;
use Maatwebsite\Excel\Concerns\ToModel;

class Licence3Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Licence3([
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
            'nomEtb2' => $row[11],
            'mgp2' => $row[12],
            'numero' => $row[13],
            'filiere' => $row[14],
            'numActe' => $row[15],
            'dateNaiss' => $row[16],
            'lieuNaiss' => $row[17],
            'langue' => $row[18],
            'adresse' => $row[19],
            'provDiplome' => $row[20],
        ]);
    }
}
