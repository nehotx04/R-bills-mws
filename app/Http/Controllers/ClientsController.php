<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientsController extends Controller
{
    protected function subsidiaryVerify($request){
        $token =  $request->header('Authorization');
        $response = Http::withToken($token)->get('http://127.0.0.1:3333/api/subsidiaries/'.$request->subsidiary_id);
        if($response->successful()){
            return [true,$responseData = $response->json()];
        }
        return [false,$response->status()];
    }

    public function store(Request $request)
    {   
        $subVer = $this->subsidiaryVerify($request);
        if($subVer[0]){
            

            $client = Client::create([
                'name'=> $request->name,
                'lastname'=> $request->lastname,
                'dni'=> $request->dni,
                'ubication'=> $request->ubication,
                'subsidiary_id'=> $request->subsidiary_id
            ]);
            return response()->json($client);
        }
        return response("Error in request",$subVer[1]);

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
