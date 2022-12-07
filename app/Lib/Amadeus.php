<?php

namespace App\Lib;

use Illuminate\Support\Facades\Http;
use App\Models\Modules;
use App\Models\Airport;

class Amadeus
{
    private $client_key;
    private $client_secret;

    public function __construct()
    {
        $module = Modules::getAmadeusKey();
        $this->client_key = $module->ApiKey;
        $this->client_secret = $module->ApiSecret;
    }

    public function searchFlight($data)
    {
        $response = $this->createRequest('get', 'https:/test.api.amadeus.com/v2/shopping/flight-offers', [
            'originLocationCode'              => $data->origin,
            'destinationLocationCode'  => $data->destination,
            'departureDate'                         => $data->departure,
            'returnDate'                             => $data->return,
            'adults'                                     => $data->adult,
            'children'                                 => $data->children,
            'infants'                                      => $data->infant,
            'currencyCode'                         => 'IDR',
            'travelClass'                             => strtoupper($data->class)
        ]);

        $data = $response->object();
        if (isset($data->errors))
            return $this->catchError($data);

        return $data;
    }

    public function fetchOffer($data)
    {
        $offer = json_decode(base64_decode($data->offer), true);

        $post = [
            'data' => [
                'type' => 'flight-offers-pricing',
                'flightOffers' => [$offer]
            ]
        ];

        $response = $this->createRequest('post', 'https://test.api.amadeus.com/v1/shopping/flight-offers/pricing', $post);
        $data = $response->object();

        if (isset($data->errors))
            return $this->catchError($data);

        return $data;
    }

    public function payFlight($data)
    {
        $response = $this->createRequest('post', 'https://test.api.amadeus.com/v1/booking/flight-orders', (array) $data);
        $data = $response->object();

        if (isset($data->errors))
            return $this->catchError($data);

        return $data;
    }

    private function parseTime($data)
    {
        $time = (object) [
            'date' => '',
            'time' => ''
        ];

        $string = explode('T', $data);
        $time->date = str_replace('-', '/', $string[0]);
        $time->time = $string[1];

        return $time;
    }

    private function createRequest($method, $url, $data = null)
    {
        if ($method == 'post') {
            $response = Http::withHeaders(
                [
                    'Authorization' => 'Bearer ' . $this->get_access_token(),
                ]
            )->post($url, $data);
        } else {
            $response = Http::withHeaders(
                [
                    'Authorization' => 'Bearer ' . $this->get_access_token(),
                ]
            )->get($url, $data);
        }

        return $response;
    }

    private function get_access_token()
    {
        $response = Http::asForm()->post(
            'https://test.api.amadeus.com/v1/security/oauth2/token',
            [
                "grant_type" => "client_credentials",
                "client_id" => $this->client_key,
                "client_secret" => $this->client_secret,
            ]
        );

        $data = $response->object();
        return $data->access_token;
    }

    private function catchError($data)
    {
        $errors = (object)[
            'status_code' => $data->errors[0]->status,
            'errors' => []
        ];

        foreach ($data->errors as $error) {
            $e = (object)[
                'title' => ucwords($error->title),
                'message' => ucwords($error->detail)
            ];

            array_push($errors->errors, $e);
        }

        return $errors;
    }
}
