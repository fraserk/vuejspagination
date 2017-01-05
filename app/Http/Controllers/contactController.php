<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class contactController extends Controller
{
    public function show()
    {
        return Contact::paginate(10);
    }
}
