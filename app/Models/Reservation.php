<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservation';
    public function user(){
        return $this->hasMany(User::class);
    }
    public function room_reserved(){
        return $this->belongsTo(RoomReserved::class);
    }
}
