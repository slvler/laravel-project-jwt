<?php

namespace App\Http\Controllers;

use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return AddressResource::collection(Address::withTrashed()->get());
    }

    public function list()
    {
        return response()->json( Address::all() , 200);
    }

    public function store(Request $request)
    {
        $store = auth()->user()->address()->create($request->all());
        return response()->json($store);
    }

    public function show($id)
    {
        return new AddressResource(Address::findOrFail($id));
    }

    public function update(Address $address, Request $request)
    {
        if ($request->user()->cannot('update', $address)) {
            abort(403);
        }

        $address->head = $request->head;
        $address->detail = $request->detail;

        $update = $address->save();

        return response()->json($update);
    }
    public function delete($id)
    {
       $delete = Address::where(['id' =>  $id, 'user_id' => auth()->id()])->delete();
       return response()->json($delete);
    }
}
