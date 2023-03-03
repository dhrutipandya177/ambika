<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Registrationrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone_no' => 'required|numeric|unique:users,phone_no,NOTNULL,password',
            'device_type' => 'required|in:A,I',
            'device_token' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,NOTNULL,password',
            'company_name' => 'required',
            'company_address' => 'required',
            'company_birth_date' => 'required',
            'gst_no' => 'required',
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
