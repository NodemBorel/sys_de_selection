<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    public function course(){
        $jsonFilePath = public_path('links.json');
        $links = json_decode(File::get($jsonFilePath), true);

        return view('course', compact('links'));
    }
}
