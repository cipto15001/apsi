<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];
    public static $statusColors = [
        'running' => "palette-Green bg",
        'finished' => "palette-Blue bg",
        'canceled' => "palette-Red bg",
        'queued' => "palette-Orange bg",
    ];
    public static $statusNames = [
        'running' => "Running",
        'finished' => "Finished",
        'canceled' => "Canceled",
        'queued' => "Queued",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function simulation()
    {
        return $this->belongsTo(Simulation::class);
    }

    public function parameters()
    {
        return $this->hasMany(JobParameter::class);
    }
}
