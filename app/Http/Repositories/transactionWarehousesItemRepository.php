<?php

namespace App\Http\Repositories;

use App\Enums\transactionType;
use App\Models\transactionWarehouseItem;

class transactionWarehousesItemRepository extends baseRepository
{
    public function __construct(transactionWarehouseItem $model)
    {
        parent::__construct($model);
    }

    public function index(): array
    {

        $data = transactionWarehouseItem::with('warehouse', 'item')->paginate(10);
        if ($data->isEmpty()) {
            $message = "There are no transaction in this warehouse at the moment";
        } else {
            $message = "Transaction warehouse indexed successfully";
        }
        return ['message' => $message, "TransactionWarehouseItem" => $data];
    }


}
