<?php

namespace App\Http\Controllers;

use App\Boat;
use App\Client;
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

//        dd($storage);
        return view('storage.show', compact('storage'));
    }

    public function create()
    {
        $storage = Storage::select('sid', 'cid', 'spot')->get();
        $clients = Client::select('cid', 'bid', 'firstname', 'lastname')->get();

        return View::make('storage.edit', compact('storage', 'clients'))->withClient(new Client);
    }

    public function store(Request $request)
    {
        Client::create($request->all());

        return redirect('/clients');
    }

    public function edit($id)
    {
        $storage = Storage::findOrFail($id);
        $clients = Client::select('cid', 'firstname', 'lastname')->get();

        return View::make('storage.edit', compact('storage', 'clients'));
    }

    public function update($id, Request $request)
    {
        $storage = Storage::findOrFail($id);

        $storage->update($request->all());

//        dd($clients);
        return redirect('/');
    }
}
