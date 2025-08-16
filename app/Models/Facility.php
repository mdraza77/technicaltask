<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'business_name',
        'street_address',
        'last_update_date',
    ];
    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }
}
