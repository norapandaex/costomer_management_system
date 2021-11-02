<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operecord extends Model
{
    protected $guarded = [
        'id',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function salesgraphs()
    {
        return $this->hasMany(Salesgraph::class);
    }

    public function operatings()
    {
        return $this->hasMany(Operating::class);
    }
}
