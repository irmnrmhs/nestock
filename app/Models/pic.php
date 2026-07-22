<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pic extends Model
{
    protected $fillable = [
        'nama',
    ];

    public function inStoks()
    {
        return $this->hasMany(IncomingStock::class, 'pic_id');
    }
}
