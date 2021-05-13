<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costomer extends Model
{
    protected $guarded = [
        'id',
    ];
    
    public function sites(){
        return $this->hasMany(Site::class);
    }
}
