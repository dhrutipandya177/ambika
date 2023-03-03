<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return TRUE;
    }

    public function rules()
    {
	    return [
	    	'old_password' => 'required|min:5',
		    'new_password' => 'required|min:5',
	    ];
    }

    protected function failedValidation(Validator $validator) {
        $transformed=[];
        foreach ($validator->errors()->toArray() as $field => $message) {
            $transformed[$field] = $message[0];
        }

        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $transformed,
            'message' => 'The given data was invalid.',
        ], 422));
        //throw new HttpResponseException(response()->json($validator->errors()->all(), 422));
    }
}
