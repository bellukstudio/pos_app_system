<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPurchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplierId',
        'productName',
        'unitPrice',
        'qty',
        'purchaseDate'
    ];
}
