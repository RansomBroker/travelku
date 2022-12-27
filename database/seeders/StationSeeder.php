<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Lib\Darmawisata;
use App\Models\Station;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $darmawisata = new Darmawisata();
        $route = $darmawisata->trainRoute()['routes'];
        $tmp = array_values(array_column($route, null, 'origin'));
        $newRoute = [];
        foreach ($tmp  as $data) {
            $newRoute[] = [
                "station" => trim(explode("(",  explode(",", $data['originFull'])[1])[0]),
                "city" => explode(",", $data['originFull'])[0],
                "code" => $data['origin']
            ];
        }

        foreach ($newRoute as $data) {
            $station = new Station();
            $station->station = $data['station'];
            $station->city = $data['city'];
            $station->code = $data['code'];
            $station->save();
        }        
    }
}
