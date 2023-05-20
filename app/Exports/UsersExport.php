<?php

namespace App\Exports;

// use App\Http\Resources\User;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromQuery, WithHeadings
{
               use Exportable;
               public function query()
               {
                              return User::query()->select('id', 'name', 'email', 'phone', 'role', 'created_at', 'updated_at', 'address', 'photo');
               }
               public function headings(): array
               {
                              return [
                                             '#',
                                             'Full Name',
                                             'Email',
                                             'Phone',
                                             'Role',
                                             'Created At',
                                             'Updated At',
                                             'Address',
                                             'Photo'
                              ];
               }
}
