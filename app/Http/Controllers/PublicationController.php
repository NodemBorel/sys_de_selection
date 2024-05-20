<?php

namespace App\Http\Controllers;

use App\Models\Master1;
use App\Models\Master2;
use App\Models\Doctorat;
use App\Models\DoctoratSelect;
use App\Models\Licence1;
use App\Models\Licence2;
use App\Models\Licence3;
use Illuminate\Http\Request;
use App\Models\Licence1Select;
use App\Models\Licence2Select;
use App\Models\Licence3Select;
use App\Models\Master1Select;
use App\Models\Master2Select;

class PublicationController extends Controller
{
    public function display(){
        $etudiants = Licence1Select::all();
        $niveau = "Licence 1";
        return view('publucation', compact('etudiants','niveau'));
    }

    public function display_l2(){
        $etudiants = Licence2Select::all();
        $niveau = "Licence 2";
        return view('publucation', compact('etudiants','niveau'));
    }

    public function display_l3(){
        $etudiants = Licence3Select::all();
        $niveau = "Licence 3";
        return view('publucation', compact('etudiants','niveau'));
    }

    public function display_ms1(){
        $etudiants = Master1Select::all();
        $niveau = "Master 1";
        return view('publucation', compact('etudiants','niveau'));
    }

    public function display_ms2(){
        $etudiants = Master2Select::all();
        $niveau = "Master 2";
        return view('publucation', compact('etudiants','niveau'));
    }

    public function display_doc(){
        $etudiants = DoctoratSelect::all();
        $niveau = "Doctorat";
        return view('publucation', compact('etudiants','niveau'));
    }
}
