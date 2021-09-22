<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $guarded = [
        'id',
    ];

    public function salesgraphs()
    {
        return $this->hasMany(Salesgraph::class);
    }
}
