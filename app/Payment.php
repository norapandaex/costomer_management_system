<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [
        'id',
        'sponser_id',
    ];

    public function sponser()
    {
        return $this->belongsTo(Sponser::class);
    }

    public function salesgraphs()
    {
        return $this->hasMany(Salesgraph::class);
    }
}
