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

    public function show($id) {
        $boats = Boat::with('clients')
            ->join('clients', 'clients.bid', '=', 'boats.bid')
            ->select('boats.*', 'clients.*')
            ->find($id);
//        dd($car);

        return view('boats.show', compact('boats'));
    }

    public function create()
    {
        $boats = Boat::select('bid')->get();

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
