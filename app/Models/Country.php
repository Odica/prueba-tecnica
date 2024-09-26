<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];

    // Relación con las ciudades
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
