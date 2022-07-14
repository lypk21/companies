<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'company_id' => 'required|exists:companies,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|sometimes|email',
            'phone' => 'nullable|sometimes|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
    }


    public function messages()
    {
        return [
            'company_id.required' => 'company is required',
            'phone.numeric' => 'invalid phone format',
            'phone.regex' => 'invalid phone format',
        ];
    }

}
