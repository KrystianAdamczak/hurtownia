<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country',
        'voivodeship',
        'county', // powiat
        'community', // gmina
        'street',
        'house_number',
        'apartment_number',
        'city',
        'postal_code',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
