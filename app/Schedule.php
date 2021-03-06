<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [
        'id',
        'user_id',
        'costomer_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function costomer()
    {
        return $this->belongsTo(Costomer::class);
    }
}
