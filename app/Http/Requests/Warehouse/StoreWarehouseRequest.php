<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarehouseRequest extends FormRequest
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
            'name'      => 'required|string|min:4',
            'code'      => 'required|string',
           // 'location'  => 'required',
            'branch_id' => 'required|integer|exists:branches,id',
            'capacity'  => 'required|integer|min:0',
            'parent_id' => 'required|integer|exists:warehouses,id',
            'user_id'   => 'required|integer|exists:users,id',
            'location.latitude' => 'numeric',
            'location.longitude' => 'numeric',
            'is_Distribution_point' => 'required|boolean',
        ];
    }
}
