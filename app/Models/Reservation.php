<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservation';
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function room_reserved(){
        return $this->hasOne(RoomReserved::class);
    }
}
