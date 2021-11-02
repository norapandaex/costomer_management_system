<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [
        'id',
        'costomer_id',
    ];

    public function costomer()
    {
        return $this->belongsTo(Costomer::class);
    }

    public function pvs()
    {
        return $this->hasMany(Pv::class);
    }

    public function sales()
    {
        return $this->hasMany(Sales::class);
    }

    public function salesgraphs()
    {
        return $this->hasMany(Salesgraph::class);
    }

    public function additions()
    {
        return $this->hasMany(Addition::class);
    }

    public function operatings()
    {
        return $this->hasMany(Operating::class);
    }

    public function operecords()
    {
        return $this->hasMany(Operecord::class);
    }
}
