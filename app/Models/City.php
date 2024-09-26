<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'country_id'];

    // Relación con el país
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
