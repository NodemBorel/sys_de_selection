<?php

namespace App\Http\Controllers\Admin\ImportExport;

use App\Exports\Licence1Export;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\Licence1Import;
use Maatwebsite\Excel\Facades\Excel;

class Licence1ImportExport extends Controller
{
    public function import(Request $request){
        Excel::import(new Licence1Import, $request->file('file')->store('files'));
        return redirect('/licence1')->with('message', 'Importer avec success');
    }

    public function export(){
        return Excel::download(new Licence1Export, 'Licence1.xlsx');
    }
}
