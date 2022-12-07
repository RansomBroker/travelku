<?php

namespace Database\Seeders;

use App\Lib\Darmawisata;
use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CountryCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $darmawisata = new Darmawisata();
        $countries = $darmawisata->allCountryAllCity();

        /* insert into db */
        $i = 1;
        foreach ($countries['countries'] as $country) {
            $tblCountry = new Country();
            $tblCountry->country_id = $i;
            $tblCountry->country_name = $country['Name'];
            $tblCountry->country_name_id = $country['ID'];
            $tblCountry->save();
            foreach ($country['cities'] as $city){
                $tblCity = new City();
                $tblCity->country_id = $i;
                $tblCity->city_id = $city['ID'];
                $tblCity->city_name = $city['Name'];
                $tblCity->save();
            }
            $i++;
        }
    }
}
