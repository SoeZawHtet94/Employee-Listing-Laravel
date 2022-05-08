<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\ErrorReturn\PrepareErrorMessage;
use Illuminate\Contracts\Validation\Validator;

class EmployeeValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {

        $rules['name']          = 'required';
        $rules['email']         = 'required|email';
        $rules['dateofbirth']   = 'required|date_format:d-m-Y';
        $rules['address']       = 'required|string';
        $rules['gender']        = 'required';
        $rules['phno']          = 'required|numeric';
        $rules['maritualstatus'] = 'required';
        $rules['nrcno']         = 'required';

        return $rules;
    }
}
