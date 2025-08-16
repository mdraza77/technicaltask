<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }
}
