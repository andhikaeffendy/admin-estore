<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Purchase extends Model
{
    protected $fillable = ['product_id', 'jumlah', 'total_harga'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
