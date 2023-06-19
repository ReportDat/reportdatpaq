<?php

namespace App\Imports;

use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class ReportsImport implements ToModel, WithHeadingRow
{
    public function model(array $reports)
    {
        if (!empty($reports["name"]) || $reports["name"] != null) {       
            $formattedDate = Carbon::createFromFormat('Y-m-d', $reports['date_purchase']);
            return new Report([
                "date_purchase" => $formattedDate,
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
                "reason" => $reports["reason"],
                "is_trustworthy" => $reports["is_trustworthy"]
            ]);
        }
    }
}
