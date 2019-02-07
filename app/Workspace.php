<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
