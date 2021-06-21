<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costomer extends Model
{
    protected $guarded = [
        'id',
    ];

    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    public function proceedings()
    {
        return $this->hasMany(Proceeding::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
