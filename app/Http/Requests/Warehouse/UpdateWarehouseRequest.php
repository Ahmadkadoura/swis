<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWarehouseRequest extends FormRequest
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
            'name'      => 'string|min:4',
            'code'      => 'string',
            // 'location'  => '',
            'branch_id' => 'integer|exists:branches,id',
            'capacity'  => 'integer|min:0',
            'parent_id' => 'integer',
            'user_id'   => 'integer|exists:users,id',

            'is_Distribution_point' => 'boolean',
        ];
    }
}
