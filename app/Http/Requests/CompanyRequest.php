<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'nullable|sometimes|email',
            'logo' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'website' => 'nullable|sometimes|url',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name is required',
            'email.email' => 'invalid email format',
            'logo.mimes' => 'image format:jpeg,png,jpg,gif,svg',
            'website.url' => 'invalid url format'
        ];
    }
}
