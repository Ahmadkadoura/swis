<?php

namespace App\Http\Requests\Transaction;

use App\Enums\transactionStatusType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class StoreTransactionRequest extends FormRequest
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
            'is_convoy' => 'required|boolean',
            'notes' => 'nullable|string',
            'status' => ['required', new Enum(TransactionStatusType::class)],
            'notes_ar' => 'nullable|string',
            'status' => 'required',new Enum(transactionStatusType::class),
            'status_ar' => new Enum(transactionStatusType::class),
            'date' => 'required|date|after:yesterday',
            'waybill_num' => 'required|integer',
            'waybill_img' => 'required|image',
            'qr_code' => 'nullable|image',
            'CTN' => 'nullable|string',
            'items' => 'required|array',
            'items.*.warehouse_id' => 'required|exists:warehouses,id',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.transaction_type' => 'required|string',
            'items.*.type' => 'required|string',
            'drivers' => 'required|array',
            'drivers.*driver_id' => 'required|exists:drivers,id',
        ];
    }
}
