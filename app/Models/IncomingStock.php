<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomingStock extends Model
{
    protected $fillable = [
        'kode',
        'supplier_id',
        'product_id',
        'pic_id',
        'tanggal',
        'kuantitas',
        'berat',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function pic()
    {
        return $this->belongsTo(pic::class, 'pic_id');
    }
}
