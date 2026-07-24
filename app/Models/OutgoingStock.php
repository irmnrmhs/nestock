<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutgoingStock extends Model
{
    protected $fillable = [
        'incoming_stock_id',
        'pic_id',
        'tanggal',
        'kuantitas',
        'berat',
    ];

    public function inStock()
    {
        return $this->belongsTo(IncomingStock::class, 'incoming_stock_id');
    }

    public function pic()
    {
        return $this->belongsTo(Pic::class, 'pic_id');
    }
}
