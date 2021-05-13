<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pv extends Model
{
    protected $guarded = [
        'id',
        'site_id',
    ];
    
    public function site(){
        return $this->belongsTo(Site::class);
    }
}
