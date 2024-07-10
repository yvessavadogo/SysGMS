<?php

namespace App\Http\Controllers;

use App\Models\Assure;
use Illuminate\Http\Request;

class AssureController extends Controller
{
    public function index()
    {
        $assures = Assure::all();
        return view('assures.index', compact('assures'));
    }
}
