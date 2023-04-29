<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomReserved extends Model
{
    use HasFactory;
    protected $table = 'room_reserved';
    protected $fillable = ['room_id', 'price'];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
