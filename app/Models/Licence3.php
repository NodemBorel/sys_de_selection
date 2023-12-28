<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licence3 extends Model
{
    use HasFactory;

    protected $table = 'licence3s';

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
    ];
}
