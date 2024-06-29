<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateDriverRequests extends FormRequest
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
            'vehicle_number' => ['string'],
            'national_id' => [ 'string'],
            'name' => [ 'string'],
            'name_ar' => [ 'string'],
            'phone' => [ 'string', 'regex:/(09)[0-9]{8}/',Rule::unique('drivers', 'phone')],
            'transportation_company_name' => [ 'string'],
            'transportation_company_name_ar' => [ 'string'],
        ];
    }
}
