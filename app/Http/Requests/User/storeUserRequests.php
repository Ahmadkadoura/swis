<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storeUserRequests extends FormRequest
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
            'password' => ['required', 'min:8'],
            'email' => ['required', 'string','email'],
            'contact_email' => ['required', 'string','email'],
            'name' => ['required', 'string','min:4'],
            'phone' => ['required',Rule::unique('Users', 'phone'),'phone:sy,INTERNATIONAL'],
            'photo' => [ 'required', 'image'],
        ];
    }
}
