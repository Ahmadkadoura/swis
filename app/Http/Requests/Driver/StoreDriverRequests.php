<?php

namespace App\Http\Requests\Driver;

use App\Http\Responses\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class StoreDriverRequests extends FormRequest
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
            'vehicle_number' => ['required', 'string'],
            'national_id' => ['required', 'string'],
            'name' => ['required', 'string'],
            'phone' => ['required',Rule::unique('drivers', 'phone')],
            'transportation_company_name' => ['required', 'string'],
        ];
    }

}
