<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;
    protected $table = 'airport';

    public function searchAirport($keyword)
    {
        return Airport::where('iata', 'like', "%%$keyword%%")
                        ->orWhere('city', 'like', "%%$keyword%%")
                        ->orWhere('name', 'like', "%%$keyword%%")
                        ->orWhere('country', 'like', "%%$keyword%%")
                        ->limit(5)->get();
    }

    public function airportName($iata)
    {
        $airport = Airport::where('iata', $iata)->first();
        return $airport->name ?? 'undefined';
    }

    public function airportCountry($iata)
    {
        $airport = Airport::where('iata', $iata)->first();
        return $airport->country ?? 'undefined';
    }
}
