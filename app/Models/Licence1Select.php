<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licence1Select extends Model
{
    use HasFactory;

    protected $table = 'licence1_selects';
    
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
        'Additive',
    ];
}
