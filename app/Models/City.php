<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'city';
    protected $fillable = ['city_name', 'country_id', 'postal_code'];
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
    public function rooms()
    {
        return $this->hasManyThrough(Hotel::class, Room::class);
    }
}
