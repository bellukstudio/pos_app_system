<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMerchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameMerchant',
        'address',
        'categoryMerchantId',
        'founder'
    ];

    public function categoryMerchant()
    {
        return $this->belongsTo(CategorieMerchant::class, 'categoryMerchantId');
    }
}
