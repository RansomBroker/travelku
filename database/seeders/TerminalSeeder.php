<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Terminal;
use App\Lib\Darmawisata;

class TerminalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $darmawisata = new Darmawisata();
        $route = $darmawisata->busRoute()['routes'];
        $tmp = array_values(array_column($route, null, 'originTerminal'));
        $newRoute = [];
        foreach ($tmp  as $data) {
            $newRoute[] = [
                "terminal" => $data['originTerminal'],
                "province" => $data['originProvince']
            ];
        }
        /* insert data */
        foreach ($newRoute as $data) {
            $terminal = new Terminal();
            $terminal->terminal = $data['terminal'];
            $terminal->province = $data['province'];
            $terminal->save();
        }
    }
}
