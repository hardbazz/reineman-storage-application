<?php

namespace App\Http\Controllers;

use App\Boat;
use App\Client;
use App\Http\Requests\StorageRequest;
use App\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StorageController extends Controller
{
    public function index()
    {
        $storage = Storage::orderBy('sid', 'asc')->get();

        return view('storage.index', compact('storage'));
    }

    public function show($id) {
        $storage = Storage::with('boats')
            ->join('boats', 'boats.bid', '=', 'storage.bid')
            ->select('storage.*', 'boats.*')
            ->find($id);

//        dd($client);
        return view('storage.show', compact('storage'));
    }

    public function create()
    {
        $storage = Storage::select('sid', 'bid', 'spot', 'reserved')->get();
        $boats   = Boat::select('bid', 'name', 'model')->get();

//        return view('clients.create', compact('clients'));
        return View::make('storage.create', compact('storage', 'boats'))->withClient(new Storage);
    }

    public function store(Request $request)
    {
        Storage::create($request->all());

        return redirect('/');
    }
    public function edit($id)
    {
        $storage = Storage::findOrFail($id);
        $boats   = Boat::select()->get();

//        dd($storage, $boats);
        return View::make('storage.edit', compact('storage', 'boats'));

    }

    public function update($id, Request $request)
    {
        $storage = Storage::findOrFail($id);

        $storage->update($request->all());

        return redirect('/');
    }

    public function addStorage($id)
    {
        $storage = Storage::select('sid', 'bid', 'spot', 'reserved')->where('sid', '=', $id)->get();
        $boats   = Boat::select('bid', 'name', 'model')->get();
        $bid     = Storage::select('bid', 'sid')->get();

        return View::make('storage.add', compact('storage', 'boats', 'bid'));
    }

    public function updateStorage(StorageRequest $request, $id)
    {
        $storage = Storage::findOrFail($id);
        $storage->update($request->except(['_method', '_token', 'sid']));

        return redirect('/');
    }

//    public function clearStorage($id)
//    {
//        $storage = Storage::findOrFail($id);
//        $storage->where('sid', '=', $id)->update(['bid' => '0']);
//
////        dd($storage->all());
//        return redirect('/');
//    }
}
