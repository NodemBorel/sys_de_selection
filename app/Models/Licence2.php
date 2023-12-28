<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licence2 extends Model
{
    use HasFactory;

    protected $table = 'licence2s';

    protected $fillable = [
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
    ];
}
