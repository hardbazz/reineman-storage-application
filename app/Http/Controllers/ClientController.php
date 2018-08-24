<?php

namespace App\Http\Controllers;

use App\Boat;
use App\Client;
use App\Http\Requests\ClientRequest;
use App\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('cid', 'asc')->get();

        return view('clients.index', compact('clients'));
    }

    public function show($id) {
        $client = Client::with('boats')
            ->join('boats', 'boats.bid', '=', 'clients.bid')
            ->select('clients.*', 'boats.*')
            ->find($id);

        return view('clients.show', compact('client'));
    }

    public function create()
    {
        $clients = Client::select('cid', 'bid')->get();
        $boats   = Boat::select('bid', 'name')->get();

        return View::make('clients.create', compact('clients', 'boats'))->withClient(new Client);
    }

    public function store(ClientRequest $request)
    {
        Client::create($request->all());

        return redirect('/clients');
    }

    public function edit($id)
    {
        $clients = Client::findOrFail($id);
        $boats   = Boat::select('bid', 'name', 'model')->get();
        $bid     = Storage::select('bid', 'sid')->get();

        return View::make('clients.edit', compact('clients', 'boats', 'bid'));
    }

    public function update($id, ClientRequest $request)
    {
        $clients = Client::findOrFail($id);

        $clients->update($request->all());

//        dd($clients);
        return redirect('/clients');
    }

    public function destroy($id)
    {
        $clients = Client::findOrFail($id);
        $clients->delete();

        return redirect('/clients');
    }
}
