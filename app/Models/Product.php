<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'grade',
        'kode',
        'ket',
    ];

    public function inStoks()
    {
        return $this->hasMany(IncomingStock::class, 'product_id');
    }
}
