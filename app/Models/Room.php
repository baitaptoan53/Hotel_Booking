<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';
    protected $fillable = ['room_name', 'description', 'hotel_id', 'room_type_id', 'current_price'];
    public function reserved()
    {
        return $this->hasOne(RoomReserved::class);
    }
}
