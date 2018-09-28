<?php

namespace App\Http\Controllers;

use App\Boat;
use App\Client;
use App\Http\Requests\BoatRequest;
use App\Storage;
use Illuminate\Http\Request;
use Illuminate\Foundation\helpers;
use Illuminate\Support\Facades\View;

class BoatController extends Controller
{
    public function index()
    {
        $boats = Boat::orderBy('bid', 'asc')->get();

        return view('boats.index', compact('boats'));
    }

    public function show($id) {
        $boat = Boat::findOrFail($id);

        return View::make('boats.show', compact('boat'));
    }

    public function create()
    {
        $boats   = Boat::select('bid', 'name')->get();
        $clients = Client::select('cid', 'bid','firstname', 'lastname')->get();

        return view('boats.create', compact('boats', 'clients'))->withBoat(new Boat);
    }

    public function store(BoatRequest $request)
    {
        if($request->hasFile('photo')){
            // Pak de bestandsnaam met de extensie
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Pak alleen de naam van het bestand
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Pak alleen de extensie van het bestand
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Maak een bestandsnaam voor de database
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload het bestand
            $path = $request->file('photo')->storeAs('public/photo', $filenameToStore);
        } else {
            $filenameToStore = '';
        }

//        Boat::create($request->all());
        $boats = new Boat();
        $boats->name    = $request['name'];
        $boats->model   = $request['model'];
        $boats->length  = $request['length'];
        $boats->width   = $request['width'];
        $boats->cid     = $request['cid'];
        $boats->bid     = $request['bid'];
        $boats->photo   = $filenameToStore;
        $boats->save();

        return redirect('/boats');
    }

    public function edit($id)
    {
        $boats = Boat::select()->where('bid', '=', $id)->get();
        $clients = Client::select('cid', 'bid','firstname', 'lastname')->get();
        $storage = Storage::select('sid', 'bid', 'spot')->get();

        return View::make('boats.edit', compact('boats', 'clients','storage', 'cid'));

    }

    public function update($id, BoatRequest $request)
    {
        $boats = Boat::findOrFail($id);
        //$boats->update($request->all());

        if($request->hasFile('photo')){
            // Pak de bestandsnaam met de extensie
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Pak alleen de naam van het bestand
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Pak alleen de extensie van het bestand
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Maak een bestandsnaam voor de database
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload het bestand
            $path = $request->file('photo')->storeAs('public/photo', $filenameToStore);
        }

        $boats->cid     = $request['cid'];
        $boats->bid     = $request['bid'];
        $boats->name    = $request['name'];
        $boats->model   = $request['model'];
        $boats->length  = $request['length'];
        $boats->width   = $request['width'];
        if($request->hasFile('photo')) {
            $boats->photo = $filenameToStore;
        }
        $boats->update();

        return redirect('/boats');
    }

    public function destroy($id)
    {
        $boats = Boat::findOrFail($id);
        $boats->delete();

        return redirect('/boats');
    }
}
