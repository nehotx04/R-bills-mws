<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function store(Request $request)
    {
        $client = Client::create($request->all());
        return response()->json($client);
    }

    public function index()
    {
        $clients = Client::get()->all();
        return response()->json($clients);
    }

    public function show($client)
    {
        $client = Client::find($client);
        return response()->json($client);
    }

    public function update(Client $client, Request $request)
    {
        if($client){
            $client->name = $request->name;
            $client->lastname = $request->lastname;
            $client->dni = $request->dni;
            $client->ubication = $request->ubication;
            $client->save();
            return response()->json($client);
        }else{
            return response("Client not found",404);
        }
    }

    public function destroy(Client $client){
        if($client){
            $client->delete();
            return response("Client Deleted successfully");
        }else{
            return response("Client not found");
        }
    }
}
