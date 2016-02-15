<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;

class CreateCustomerRequest extends Request {

    protected $acceptableContentTypes = ['application/json'];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            "name"      => "required",
            "device_id" => "required|unique:customers,device_id"
        ];
    }

    public function messages() {
        return [
            "required" => "The :attribute field is required.",
            'email'    => 'The :attribute should be valid email.',
            'exists'   => 'The :attribute already exists.'
        ];
    }

    /**
     * Always return JSON
     *
     * @return bool
     */
    public function wantsJson() {
        return true;
    }

    /**
     * Format the errors from the given Validator instance.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return array
     */
    protected function formatErrors(Validator $validator) {
        return array(
            'errors'  => $validator->getMessageBag()->toArray(),
            'message' => 'Validation error'
        );
    }

}
