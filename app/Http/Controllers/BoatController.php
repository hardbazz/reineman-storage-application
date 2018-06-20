<?php

namespace App\Http\Controllers;

use App\Boat;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BoatController extends Controller
{
    public function index()
    {
        $boats = Boat::all();

        return view('boats.index', compact('boats'));
    }

    public function show($id) {
        $boat = Boat::with('clients')
            ->join('clients', 'clients.bid', '=', 'boats.bid')
            ->select('boats.*', 'clients.*')
            ->find($id);

//        dd($boat);
        return view('boats.show', compact('boat'));
    }

    public function create()
    {
        $boats   = Boat::select('bid', 'name')->get();
//        $clients = Client::select('cid', 'bid')->get();

//        dd($clients, $boats);
//        return View::make('boats.create', compact('boats', 'clients'))->withClient(new Client);
        return view('boats.create', compact('boats'));
    }

    public function store(Request $request)
    {
        Boat::create($request->all());

        return redirect('/boats');
    }

    public function edit($id)
    {
        $boats = Boat::select()->where('bid', '=', $id)->get();
//        $clients = Client::select('cid', 'bid', 'firstname', 'lastname')->get();

//        return View::make('boats.edit', compact('boats', 'clients'));
        return view('boats.edit', compact('boats'));
    }

    public function update($id, Request $request)
    {

//        $boats = Boat::select()->where('bid', '=', $id)->get();
//        $boats->update($request->all());

        $boats = Boat::findOrFail($id);
        $boats->update($request->all());

        return redirect('/boats');
    }

    public function destroy($id)
    {
        $boats = Boat::findOrFail($id);
        $boats->delete();

        return redirect('/boats');
    }
}
