<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotel';
    // public function rooms()
    // {
    //     return $this->hasMany(Room::class);
    // }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
