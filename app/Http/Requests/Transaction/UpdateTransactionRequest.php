<?php

namespace App\Http\Requests\Transaction;

use App\Enums\transactionStatusType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateTransactionRequest extends FormRequest
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
            'is_convoy' => 'sometimes|boolean',
            'notes' => 'nullable|string',
            'status' => ['sometimes', new Enum(TransactionStatusType::class)],
            'date' => 'sometimes|date|after:yesterday',
            'waybill_num' => 'sometimes|integer',
            'waybill_img' => 'sometimes|image',
            'qr_code' => 'nullable|image',
            'CTN' => 'nullable|string',
            'items' => 'sometimes|array',
            'items.*.warehouse_id' => 'sometimes|exists:warehouses,id',
            'items.*.item_id' => 'sometimes|exists:items,id',
            'items.*.quantity' => 'sometimes|integer|min:1',
            'items.*.transaction_type' => 'sometimes|string',
            'items.*.type' => 'sometimes|string',
            'drivers' => 'sometimes|array',
            'drivers.*.driver_id' => 'sometimes|exists:drivers,id',
            'notes_ar' => 'nullable|string',
            'status' => new Enum(transactionStatusType::class),
            'status_ar' => new Enum(transactionStatusType::class),
            'date' => 'date',
            'waybill_num' => 'integer',
            'waybill_img' => [ 'image'],
            'qr_code' => 'image',
            'CTN' => 'string',

        ];
    }
}
