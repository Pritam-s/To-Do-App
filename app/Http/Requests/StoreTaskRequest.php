<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
    	// default is "false", we need to change to "true"
        return true;
    }
 
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }
}

