<?php

namespace App\Http\Controllers;

use App\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StorageController extends Controller
{
    public function index()
    {
        $storage = Storage::all();
        
        return view('storage.index', compact('storage'));
    }
}
