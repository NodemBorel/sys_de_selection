<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class Licence1Controller extends Controller
{
    public function licence1(){
        return view('admin.licence1');
    }

    public function blockUnblockLinks(Request $request)
    {
        $jsonFilePath = public_path('links.json');
        $linkId = $request->input('link_id');
        $status = $request->input('status'); // true for blocking, false for unblocking

        $links = json_decode(File::get($jsonFilePath), true);
        $links[$linkId]['blocked'] = $status;

        File::put($jsonFilePath, json_encode($links));

        return response()->json([
            'message1' => 'Arrete avec success',
            'message2' => 'Effectue avec success',
        ]);
    }
}
