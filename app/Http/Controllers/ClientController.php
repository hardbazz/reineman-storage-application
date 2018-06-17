<?php

namespace App\Http\Controllers;

use App\Boat;
use App\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    public function show($id) {
        $client = Client::with('boats')
            ->join('boats', 'boats.cid', '=', 'clients.cid')
            ->select('clients.*', 'boats.*')
            ->find($id);

//        dd($client);

        return view('clients.show', compact('client'));
    }

    public function create()
    {
        $clients = Client::select('cid', 'bid')->get();
        $boats   = Boat::select('bid', 'cid', 'name')->get();

//        return view('clients.create', compact('clients'));
        return View::make('clients.create', compact('clients', 'boats'))->withClient(new Client);
    }

    public function store(Request $request)
    {
        Client::create($request->all());

        return redirect('/clients');
    }

    public function edit($id)
    {
        $clients = Client::select()->where('cid', '=', $id)->get();
        $boats   = Boat::select('bid', 'cid', 'name')->get();

        return view('clients.edit', compact('clients', 'boats'));
    }

    public function update($id, Request $request)
    {

//        $clients = Client::select()->where('cid', '=', $id)->get();
//        $clients->update($request->all());

        $clients = Client::findOrFail($id);
        $clients->update($request->all());

        return redirect('/clients');
    }

    public function destroy($id)
    {
        $clients = Client::findOrFail($id);
        $clients->delete();

        return redirect('/clients');
    }
}
