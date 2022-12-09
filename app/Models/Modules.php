<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    use HasFactory;
    protected $table = 'modules';

    public static function getAmadeusKey()
    {
        $key = Modules::select('data')
            ->where('name', 'amadeus')
            ->first();

        return json_decode($key->data);
    }

    public static function getSabreKey()
    {
        $key = Modules::select('data')
            ->where('name', 'sabre')
            ->first();

        return json_decode($key->data);
    }

    public static function getDarmawisataKey()
    {
        $key = Modules::select('data')
            ->where('name', 'darmawisata')
            ->first();

        return json_decode($key->data);
    }
}
