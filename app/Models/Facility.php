<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'business_name',
        'street_address',
        'last_update_date',
        'user_id',
    ];
    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}
