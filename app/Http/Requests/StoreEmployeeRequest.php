<?php

namespace App\Http\Requests;

use App\Employee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name'       => [
                'required',
            ],
            'services.*' => [
                'integer',
            ],
            'services'   => [
                'array',
            ],
        ];
    }
}
