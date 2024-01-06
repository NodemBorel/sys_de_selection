<?php

namespace App\Http\Controllers;

use App\Mail\SelectEmail;
use Illuminate\Http\Request;
use App\Models\Licence1Select;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function emailNiveau1()
    {
        // Fetch all emails from the "select1s" table
        $emails = Licence1Select::pluck('email')->toArray();
    
        // Send the email to each recipient
        foreach ($emails as $email) {
            Mail::to($email)->send(new SelectEmail());
        }
    
        return redirect()->back();
    }
}
