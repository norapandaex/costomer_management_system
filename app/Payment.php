<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [
        'id',
        'sponser_id',
    ];

    public function costomer()
    {
        return $this->belongsTo(Costomer::class);
    }
}
