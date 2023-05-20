<?php

namespace App\Exports;

// use App\Http\Resources\User;

use App\Models\Room;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class RoomExport implements FromQuery, WithHeadings, WithMapping, WithColumnWidths
{
               use Exportable;
               public function query()
               {
                              return Room::query()->orderBy('created_at', 'desc');
               }
               public function headings(): array
               {
                              return [
                                             'id',
                                             'Room Name',
                                             'Description',
                                             'Address',
                                             'Price',
                                             'Rate',
                                             'Photo',
                                             'Created At',
                                             'Updated At',
                              ];
               }
               public function map($room): array
               {
                              return [
                                             $room->id,
                                             $room->room_name,
                                             $room->description,
                                             $room->hotel->company->company_address,
                                             $room->reserved->price,
                                             $room->rate,
                                             $room->photo,
                                             $room->created_at,
                                             $room->updated_at,
                              ];
               }
               public function columnWidths(): array
               {
                              return [
                                             'A' => 5,
                                             'B' => 20,
                                             'C' => 50,
                                             'D' => 50,
                                             'E' => 10,
                                             'F' => 10,
                                             'G' => 10,
                                             'H' => 10,
                                             'I' => 10,
                              ];
               }
}
