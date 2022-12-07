<?php

namespace Database\Seeders;
use App\Models\Airport;
use Illuminate\Database\Seeder;
use Storage;

class AirportSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Storage::disk('local')->get('airport.json');
        $data = json_decode($data);

        foreach($data as $item)
        {
            $airport = new Airport();
            $airport->name = $item->name;
            $airport->city = $item->city;
            $airport->country = $item->country;
            $airport->iata = $item->iata_code;
            $airport->lat = $item->_geoloc->lat;
            $airport->lng = $item->_geoloc->lng;
            $airport->save();
        }
    }
}
