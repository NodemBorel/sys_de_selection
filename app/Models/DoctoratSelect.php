<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctoratSelect extends Model
{
    use HasFactory;

    protected $table = 'doctorat_selects';
    protected $fillable = [
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
    ];
}
