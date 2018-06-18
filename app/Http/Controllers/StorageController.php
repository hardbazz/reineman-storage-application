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

    public function show($id) {
        $storage = Storage::with('clients')
            ->join('clients', 'storage.cid', '=', 'clients.cid')
            ->join('boats', 'clients.bid', '=', 'boats.bid')
            ->select('storage.*', 'clients.*', 'boats.*')
            ->find($id);

//        dd($client);
        return view('storage.show', compact('storage'));
    }
}
