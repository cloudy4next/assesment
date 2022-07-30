<?php

namespace App\Http\Requests;

use App\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();

    }

    public function rules()
    {
        return [
        ];
    }
}
