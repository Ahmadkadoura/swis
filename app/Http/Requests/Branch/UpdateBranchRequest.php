<?php

namespace App\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequest extends FormRequest
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
            'parent_id' => 'integer',
            'phone'     => 'regex:/(09)[0-9]{8}|unique:branches,phone', //might have to exclude the current phone
            'address'   => 'string',
        ];
    }
}
