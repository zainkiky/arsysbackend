<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DicoBaan extends Controller
{
    public function index()
    {
        $dicoba = \App\Models\DicoBaan::all();

        return view('dicoba', compact('dicoba'));
    }
}
