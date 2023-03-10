<?php

namespace App\Imports;

use App\Models\Report;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReportsImport implements ToModel, WithHeadingRow
{
    public function model(array $reports)
    {
        return new Report([
            "date_purchase" => date_format(date_create($reports["date_purchase"]),"Y-m-d H:i:s"),
            "store" => $reports["store"],
            "document_number" => $reports["document_number"],
            "name" => $reports["name"],
            "phone" => $reports["phone"],
            "guide_number" => $reports["guide_number"],
            "conveyor" => $reports["conveyor"],
            "city" => $reports["city"],
            "address" => $reports["address"],
            "debt_value" => $reports["debt_value"],
            "product" => $reports["product"],
            "shipping_value" => $reports["shipping_value"],
            "is_trustworthy" => $reports["is_trustworthy"],
            "reason" => $reports["reason"]
        ]);
    }
}
