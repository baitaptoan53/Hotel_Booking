<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\BooleanFilter;

class RoomTypeFilter extends BooleanFilter
{
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param Array $value Associative array with the boolean value for each of the options
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value): Builder
    {
        if($value['VIP'])
        {
            $query->orWhere('room_type_id', 1);
        }
        if($value['BIG'])
        {
            $query->orWhere('room_type_id', 2);
        }
        if($value['Apartment'])
        {
            $query->orWhere('room_type_id', 3);
        }
        if($value['Ground floor'])
        {
            $query->orWhere('room_type_id', 4);
        }
        return $query;
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): array
    {
        return [
            'VIP' => 'VIP',
            'BIG' => 'BIG',
            'Apartment' => 'Apartment',
            'Ground floor' => 'Ground floor',
        ];
    }
}
