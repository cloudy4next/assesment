<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\Admin\EmployeeResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeesApiController extends Controller
{

    public function index()
    {

        return new EmployeeResource(Employee::with(['services'])->get());
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->all());
        $employee->services()->sync($request->input('services', []));


        return (new EmployeeResource($employee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Employee $employee)
    {

        return new EmployeeResource($employee->load(['services']));
    }


    public function update(Request $request,Employee $employee,$id)
    {
        $employee=Employee::find($id);
        if($employee){
            $employee->update($request->all());
        }
        else{
            return response()->json(error);
        }
        return response()->json(["message" => "Sucessfully Updated","data"=>$service], 200);


    }
    public function destroy(Employee $employee,$id)
    {

        $employee = Employeess::findOrFail($id);
        if($employee)
        {
            $employee->delete();
            return response()->json(["message" => "Sucessfully Deleted"], 200);
 
        } 
        else
        {
            return response()->json(error);
        }
    }
}
