<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'supplier',
        'kode',
        'ket',
    ];

    public function inStoks()
    {
        return $this->hasMany(IncomingStock::class, 'supplier_id');
    }
}
