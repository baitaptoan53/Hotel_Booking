<?php

namespace App\Exports;

// use App\Http\Resources\User;

use App\Models\Reservation;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class BookingExport implements FromQuery, WithHeadings, WithMapping, WithColumnWidths
{
               use Exportable;
               public function query()
               {
                              return Reservation::query()->orderBy('check_in', 'desc');
               }
               public function headings(): array
               {
                              return [
                                             'id',
                                             'check_in',
                                             'check_out',
                                             'total_price',
                                             'users_id',
                                             'room_name',
                                             'room_id',
                                             'status',

                              ];
               }
               public function map($booking): array
               {
                              if ($booking->check_out < new Date())
                              {
                                             $status ='Available'; 
                              }
                              else
                              {
                                             $status ='Booked';
                              }
                                             return [
                                                            $booking->id,
                                                            $booking->check_in,
                                                            $booking->check_out,
                                                            $booking->total_price,
                                                            $booking->users_id,
                                                            $booking->room_reserved->room->room_name,
                                                            $booking->room_reserved->room->id,
                                                            $status,
                                             ];
               }
               public function columnWidths(): array
               {
                              return [
                                             'A' => 10,
                                             'B' => 20,
                                             'C' => 20,
                                             'D' => 10,
                                             'E' => 10,
                                             'F' => 30,
                                             'G' => 10,
                                             'H' => 10,
                              ];
               }
}
