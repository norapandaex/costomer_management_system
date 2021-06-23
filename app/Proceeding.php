<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceeding extends Model
{
    protected $guarded = [
        'id',
        'costomer_id',
    ];

    public function costomer()
    {
        return $this->belongsTo(Costomer::class);
    }
}
