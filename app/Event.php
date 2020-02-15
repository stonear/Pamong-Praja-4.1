<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'price',
    ];

    public function users()
    {
        return $this->hasMany('App\User', 'event_id', 'id');
    }
}
