<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\Admin\ServiceResource;
use App\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServicesApiController extends Controller
{
    public function index()
    {

        return new ServiceResource(Service::all());
    }

    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->all());

        return (new ServiceResource($service))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }


    public function update(Request $request,Service $service,$id)
    {
        $service=Service::find($id);
        if($service){
            $service->update($request->all());
        }
        else{
            return response()->json(error);
        }
        return response()->json(["message" => "Sucessfully Updated","data"=>$service], 200);


    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        if($service)
            $service->delete(); 
        else
            return response()->json(error);

        return response()->json(["message" => "Sucessfully Deleted"], 200);

    }



}
