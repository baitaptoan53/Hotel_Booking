<?php

namespace App\Imports;

use App\Models\Room;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RoomImport implements ToModel,WithHeadingRow
{
    public function model(array $row)
    {
        return new Room([
            'room_name' => $row['room_name'],
            'description' => $row['description'],
            'rate' => $row['rate'],
            'hotel_id' => $row['hotel_id'],
            'room_type_id' => $row['room_type_id'],
            'current_price' => $row['current_price'],
            'photo' => $row['photo'],
        ]);
    }
}
