<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Booking extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'total_price' => $this->total_price,
            'users_id' =>   $this->users_id,
            'room_name' => $this->room_reserved->room->room_name,
            'room_id' => $this->room_reserved->room->id,
        ];
    }
}
