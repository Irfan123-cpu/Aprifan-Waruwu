<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Destinations extends Model
{
  // protected $table = 'destinations';
    protected $fillable = [
        'name',
        'description',
        'location',
        'working_days',
        'working_hours',
        'ticket_price',
        'image',
    ];


    public function attractions()
    {
      return $this->hasMany(Attraction::class);
    }

 }

