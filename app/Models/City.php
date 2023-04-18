<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'city';
    protected $fillable = ['city_name', 'country_id','postal_code'];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
