<?php

namespace App\Http\Controllers;

use App\Models\Doctorat;
use App\Models\Licence1;
use App\Models\Licence2;
use App\Models\Licence3;
use App\Models\Master1;
use App\Models\Master2;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function display(){
        $etudiants = Licence1::all();
        $niveau = "Licence 1";
        return view('publucation', compact('etudiants','niveau'));
    }

    public function display_l2(){
        $etudiants = Licence2::all();
        $niveau = "Licence 2";
        return view('publucation', compact('etudiants','niveau'));
    }

    public function display_l3(){
        $etudiants = Licence3::all();
        $niveau = "Licence 3";
        return view('publucation', compact('etudiants','niveau'));
    }

    public function display_ms1(){
        $etudiants = Master1::all();
        $niveau = "Master 1";
        return view('publucation', compact('etudiants','niveau'));
    }

    public function display_ms2(){
        $etudiants = Master2::all();
        $niveau = "Master 2";
        return view('publucation', compact('etudiants','niveau'));
    }

    public function display_doc(){
        $etudiants = Doctorat::all();
        $niveau = "Doctorat";
        return view('publucation', compact('etudiants','niveau'));
    }
}
