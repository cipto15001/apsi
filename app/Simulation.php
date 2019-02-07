<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simulation extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'simulation_histories');
    }

    public function parameters()
    {
        return $this->belongsToMany(Parameter::class, 'simulation_parameter');
    }

    public function upload()
    {
        return $this->belongsTo(Upload::class, 'image');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
	