<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventCOntroler extends Controller
{
    public function index()
    {
        $dicoba = \App\Models\EventTypeModel::all();

        return view('event', compact('dicoba'));
    }
}
