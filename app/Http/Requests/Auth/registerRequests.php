<?php

namespace App\Http\Requests\Auth;

use App\Http\Responses\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class registerRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password' => ['required', 'confirmed', 'min:8'],
            'contact_email' => ['required', 'string','email'],
            'name' => ['required', 'string','min:4'],
            'phone' => ['required','phone:Auto',Rule::unique('drivers', 'phone')],
            'photo' => [ 'image' , 'mimes:jpeg,jpg,png,gif'],
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator,Response::Validation([],$validator->errors()));
    }
}
