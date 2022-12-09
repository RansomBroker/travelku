<?php

namespace Database\Seeders;
use App\Models\Modules;
use Illuminate\Database\Seeder;

class ModulesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "amadeus",
                "type" => "flight",
                "enable" => true,
                "data" => json_encode([
                    'ApiKey' => '0BMoDFEZ1GGCjcns4fFsTo6H2AoJFarL',
                    'ApiSecret' => 'okrOskwiniVGAogG',
                    'domesticMargin' => '10%',
                    'margin' => '700.000',
                    'businessMargin' => '1.000.000'
                ])
            ]
        ];

        Modules::upsert($data, ['name', 'type'], ['enable']);
    }
}
