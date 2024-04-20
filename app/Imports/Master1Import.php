<?php

namespace App\Imports;

use App\Models\Master1;
use Maatwebsite\Excel\Concerns\ToModel;

class Master1Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Master1([
            'nom' => $row[0],
            'prenom' => $row[1],
            'sexe' => $row[2],
            'nationalite' => $row[3],
            'email' => $row[4],
            'age' => $row[5],
            'region' => $row[6],
            'nomEtb3' => $row[7],
            'mgp3' => $row[8],
            'numero' => $row[9],
            'filiere' => $row[10],
            'numActe' => $row[11],
            'dateNaiss' => $row[12],
            'lieuNaiss' => $row[13],
            'langue' => $row[14],
            'adresse' => $row[15],
            'provDiplome' => $row[16],
        ]);
    }
}
