<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $fillable = [
        'nama',
    ];

    public function inStoks()
    {
        return $this->hasMany(IncomingStock::class, 'pic_id');
    }

    public function outStoks()
    {
        return $this->hasMany(OutgoingStock::class, 'pic_id');
    }
}
