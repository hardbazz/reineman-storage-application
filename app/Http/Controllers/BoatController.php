<?php

namespace App\Http\Controllers;

use App\Boat;
use App\Client;
use App\Http\Requests\BoatRequest;
use App\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BoatController extends Controller
{
    public function index()
    {
        $boats = Boat::orderBy('bid', 'asc')->get();

        return view('boats.index', compact('boats'));
    }

    public function show($id) {
        $boat = Boat::with('clients')
            ->join('clients', 'clients.bid', '=', 'boats.bid')
            ->select('boats.*', 'clients.*')
            ->find($id);

        $storage = Storage::with('boats')
            ->join('boats', 'boats.bid', '=', 'storage.bid')
            ->select('storage.bid', 'storage.spot', 'boats.bid')
            ->get();

        return View::make('boats.show', compact('boat', 'storage'));
    }

    public function create()
    {
        $boats   = Boat::select('bid', 'name')->get();

        return view('boats.create', compact('boats'))->withBoat(new Boat);
    }

    public function store(BoatRequest $request)
    {
        Boat::create($request->all());

        return redirect('/boats');
    }

    public function edit($id)
    {
        $boats = Boat::select()->where('bid', '=', $id)->get();
        $storage = Storage::select('sid', 'bid', 'spot')->get();

        return View::make('boats.edit', compact('boats', 'storage'));

    }

    public function update($id, BoatRequest $request)
    {
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
