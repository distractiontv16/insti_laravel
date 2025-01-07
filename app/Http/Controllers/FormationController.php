<?php

namespace App\Http\Controllers;

use App\Models\Formation;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::all();
        return view('pages.formations', compact('formations'));
    }
}