<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\ErrorReturn\PrepareErrorMessage;
use Illuminate\Contracts\Validation\Validator;

class EmployeeValidationUpdate extends FormRequest
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
        $rules['id']            = 'required';
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
