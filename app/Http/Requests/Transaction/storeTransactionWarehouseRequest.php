<?php

namespace App\Http\Requests\Transaction;

use App\Enums\transactionModeType;
use App\Enums\transactionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class storeTransactionWarehouseRequest extends FormRequest
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
            'transaction_id' => 'required|exists:transactions,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'transaction_type' => 'required',new Enum(transactionType::class),
            'transaction_mode_type' => 'required',new Enum(transactionModeType::class),
            'quantity' => ['required', 'numeric', 'min:1'],
            'item_id'=>'required|integer'
        ];
    }
}
