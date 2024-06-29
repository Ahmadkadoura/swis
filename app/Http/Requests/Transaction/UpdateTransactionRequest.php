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
            'donor_id' => 'exists:donors,id',
            'warehouse_id' => 'exists:warehouses,id',
            'is_convoy' => 'boolean',
            'notes' => 'nullable|string',
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
