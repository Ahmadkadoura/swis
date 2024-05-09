<?php

namespace App\Http\Requests\Transaction;

use App\Enums\transactionStatusType;
use Illuminate\Foundation\Http\FormRequest;
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
            'donor_id' => 'required|exists:donors,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'is_convoy' => 'required|boolean',
            'notes' => 'nullable|string',
            'code' => 'required|string',
            'status' => 'required',new Enum(transactionStatusType::class),
            'date' => 'required|date',
            'waybill_num' => 'required|integer',
            'waybill_img' => 'required|string',
            'qr' => 'required|string',
        ];
    }
}
