<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'identification',
        'address',
        'phone',
        'country_id',
        'city_id',
    ];

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'employee_position');
    }
}
