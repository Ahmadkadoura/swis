<?php

namespace App\Http\Requests\Transaction;

use App\Enums\transactionModeType;
use App\Enums\transactionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateTransactionWarehouseRequest extends FormRequest
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
            'transaction_id' => 'exists:transactions,id',
            'warehouse_id' => 'exists:warehouses,id',
            'transaction_type' => new Enum(transactionType::class),
            'transaction_mode_type' => new Enum(transactionModeType::class),
            'quantity' => ['numeric', 'min:1'],
            'item_id'=>'integer'
        ];
    }
}
