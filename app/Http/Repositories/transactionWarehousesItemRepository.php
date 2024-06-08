<?php

namespace App\Http\Repositories;

use App\Enums\transactionType;
use App\Models\transactionWarehouseItems;

class transactionWarehousesItemRepository extends baseRepository
{
    public function __construct(transactionWarehouseItems $model)
    {
        parent::__construct($model);
    }

    public function index(): array
    {

        $data = transactionWarehouseItems::with('warehouse', 'item')->paginate(10);
        if ($data->isEmpty()) {
            $message = "There are no transaction in this warehouse at the moment";
        } else {
            $message = "Transaction warehouse indexed successfully";
        }
        return ['message' => $message, "TransactionWarehouse" => $data];
    }


}
