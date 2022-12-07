<?php

namespace App\Lib;

use Illuminate\Support\Facades\Http;
use App\Models\Modules;
use App\Models\Airport;

class Sabre
{
    private $client_key;
    private $client_secret;

    public function __construct()
    {
        $module = Modules::getSabreKey();
        $this->client_key = $module->ApiKey;
        $this->client_secret = $module->ApiSecret;
    }

    public function searchFlight($data)
    {
        $response = $this->createRequest('post', 'https://api.cert.platform.sabre.com/v4/offers/shop', '{
            "OTA_AirLowFareSearchRQ": {
              "OriginDestinationInformation": [
                {
                  "DepartureDateTime": "' . $data->departure . 'T00:00:00",
                  "DestinationLocation": {
                    "LocationCode": "' . $data->origin . '"
                  },
                  "OriginLocation": {
                    "LocationCode": "' . $data->destination . '"
                  },
                  "RPH": "0"
                }
              ],
              "POS": {
                "Source": [
                  {
                    "PseudoCityCode": "8QG8",
                    "RequestorID": {
                      "CompanyName": {
                        "Code": "TN"
                      },
                      "ID": "1",
                      "Type": "1"
                    }
                  }
                ]
              },
              "TPA_Extensions": {
                "IntelliSellTransaction": {
                  "RequestType": {
                    "Name": "200ITINS"
                  }
                }
              },
              "TravelPreferences": {
                "TPA_Extensions": {
                  "DataSources": {
                    "ATPCO": "Enable",
                    "LCC": "Disable",
                    "NDC": "Disable"
                  },
                  "NumTrips": {}
                }
              },
              "TravelerInfoSummary": {
                "AirTravelerAvail": [
                  {
                    "PassengerTypeQuantity": [
                      {
                        "Code": "ADT",
                        "Quantity": ' . $data->adult . '
                      }
                    ]
                  }
                ],
                "SeatsRequested": [
                  1
                ]
              },
              "Version": "3"
            }
          }');

        $data = $response->object();
        if (isset($data->errors))
            return $this->catchError($data);

        // return $data;
        return $data->groupedItineraryResponse->itineraryGroups[0]->itineraries;
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
            )->withBody($data, 'application/json')->post($url);
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
        $b64ClientKey = base64_encode($this->client_key);
        $b64ClientSecret = base64_encode($this->client_secret);
        $AuthKey = base64_encode($b64ClientKey . ':' . $b64ClientSecret);
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $AuthKey
        ])->asForm()->post(
            'https://api.cert.platform.sabre.com/v2/auth/token',
            [
                "grant_type" => "client_credentials"
            ]
        );

        $data = $response->object();
        return $data->access_token;
        // return $data;
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
