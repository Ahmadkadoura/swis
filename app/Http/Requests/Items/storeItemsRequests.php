<?php

namespace App\Http\Requests\Items;

use App\Enums\sectorType;
use App\Enums\unitType;
use App\Http\Responses\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\ValidationException;

class storeItemsRequests extends FormRequest
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
            'code' => ['required', 'string'],
            'sectorType' => ['required', new Enum(sectorType::class)],
            'unitType' => ['required', new Enum(unitType::class)],
            'name' => ['required', 'string'],
            'size' => ['required', 'numeric', 'min:1'],
            'weight' => ['required', 'numeric', 'min:1'],
            'quantity' => ['required', 'numeric', 'min:1'],
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator,Response::Validation([],$validator->errors()));
    }
}
