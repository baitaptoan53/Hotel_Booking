<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    public function hotel(){
        return $this->hasMany(Hotel::class);
    }
    public function room_company()
    {
        return $this->hasManyThrough(Hotel::class, Room::class);
    }
}
