<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorat extends Model
{
    use HasFactory;

    protected $table = 'doctorats';

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
