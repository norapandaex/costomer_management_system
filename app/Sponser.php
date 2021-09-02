<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponser extends Model
{
    protected $guarded = [
        'id',
        'costomer_id',
    ];

    public function costomer()
    {
        return $this->belongsTo(Costomer::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
