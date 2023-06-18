<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieMerchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryMerchant', 'type'
    ];
}
