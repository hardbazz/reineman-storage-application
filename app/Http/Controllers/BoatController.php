<?php

namespace App\Http\Controllers;

use App\Boat;
use Illuminate\Http\Request;

class BoatController extends Controller
{
    public function index()
    {
        $boats = Boat::all();

        return view('boats.index', compact('boats'));
    }
}
