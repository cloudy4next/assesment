<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\Admin\ClientResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientsApiController extends Controller
{
    public function index()
    {

        return new ClientResource(Client::all());
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->all());

        return (new ClientResource($client))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Client $client)
    {

        return new ClientResource($client);
    }

        public function update(Request $request,Client $client,$id)
    {
        $client=Client::find($id);
        if($client){
            $client->update($request->all());
        }
        else{
            return response()->json(error);
        }
        return response()->json(["message" => "Sucessfully Updated","data"=>$service], 200);


    }
    public function destroy(Client $client)
    {
    $client = Client::findOrFail($id);

        if($client)
        {
            $client->delete(); 
            return response()->json(["message" => "Sucessfully Deleted"], 200);
        }
        else
        {
            return response()->json(error);
        }

    }
}
