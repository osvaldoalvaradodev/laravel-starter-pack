<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Session;

use App\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    
    public function list(){
        return view('client.list');
    }

    function getdata(){
        $clients = Client::where('enabled',1)->get();
        return DataTables::of($clients)->make(true);
    }

    function select($id){
        $client = Client::findOrFail($id);
        return $client;
    }

    public function store(Request $request)
    {
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $client = Client::findOrFail($id);
            $client->fill($request->all());
            if($client->save()){
                activitypush('Edita', 'Cliente id:'.$client->id);
                return $client;
            }
            return "Error al editar Cliente";
        }else{
            //Si no, Crea un Item        
            $client = new Client;
            $client->fill($request->all());
            if($client->save()){
                activitypush('Agrega', 'Cliente id:'.$client->id);
                return $client;
            }
            return "Error al agregar Cliente";
        }
    }

    public function delete($id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->enabled=0;
            $client->save();
            activitypush('Elimina', 'Cliente id:'.$client->id);
            return $client;
        } catch (\Throwable $th) {
            return "Error al eliminar Cliente";
        }
    }
}
