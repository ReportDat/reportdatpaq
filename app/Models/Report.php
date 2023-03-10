<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_purchase',
        'store',
        'document_number',
        'name',
        'phone',
        'guide_number',
        'conveyor',
        'city',
        'address',
        'debt_value',
        'product',
        'shipping_value',
        'reason',
        'is_trustworthy'
    ];
}
