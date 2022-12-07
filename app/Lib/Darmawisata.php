<?php

namespace App\Lib;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Models\Modules;
use App\Models\Airport;

class Darmawisata
{
    private $username;
    private $password;

    public function __construct()
    {
        $module = Modules::getDarmawisataKey();
        $this->username =  $module->username;
        $this->password = $module->password;
    }

    public function getAccessToken(): object
    {
        $date = Carbon::now()->format("Y-m-d\TH:i:s");
        $data = [
            'token' => $date,
            'securityCode' => md5($date.md5($this->password)),
            'language' => 1,
            'userID' => $this->username
        ];

        // make auth to Darmawisata
        $response = Http::withoutVerifying()->accept('application/json')->post('https://61.8.74.42:7080/h2h/Session/Login', $data);

        return $response->object();
    }

    /* top up */
    public function topUpProduct()
    {
        $data = [
            'userID' =>$this->username,
            'accessToken' => $this->getAccessToken()->accessToken
        ];

        $response = Http::withoutVerifying()->accept('application/json')->post('https://61.8.74.42:7080/H2H/TopUp/ProductType', $data);

        return $response->json();

    }

    public function getProductProviderList($data)
    {
        $data = [
            'productType' => $data['product'],
            'userId' => $this->username,
            'accessToken' => $this->getAccessToken()->accessToken
        ];

        $request = Http::withoutVerifying()->accept('application/json')->post('https://61.8.74.42:7080/H2H/TopUp/Provider', $data);

        $response = $request->object();


        $dataResp = [
            'product' => $response->providers,
            'productCategory' => 'topup',
            'respTime' => $response->respTime,
            'status' => $response->status,
            'respMessage' => $response->respMessage
        ];
        return $dataResp;

    }

    public function getTopupProductList($data)
    {
        $data = [
            "provider" => $data->product,
            "userID" => $this->username,
            "accessToken" => $this->getAccessToken()->accessToken
        ];

        $response = Http::withoutVerifying()->accept('application/json')->post('https://61.8.74.42:7080/H2H/TopUp/Product', $data);

        return $response->json();


    }
    /* top up end*/

    /* PPOB */
    public function ppobProduct()
    {
            $data = [
                'userID' =>$this->username,
                'accessToken' => $this->getAccessToken()->accessToken
            ];

            $response = Http::withoutVerifying()->withHeaders([
                'Content-Type' => 'application/json',
            ])->accept('application/json')->post('https://61.8.74.42:7080/H2H/PPOB/ProductGroup', $data);

            return $response->json();
    }

    public function getPpobProductList($data)
    {
        $data = [
            'productGroup' => $data['product'],
            'userID' => $this->username,
            'accessToken' => $this->getAccessToken()->accessToken
        ];

        $request = Http::withoutVerifying()->accept('application/json')->post('https://61.8.74.42:7080/H2H/PPOB/Product', $data);

        $response = $request->object();


        $dataResp = [
            'product' => $response->productList,
            'productCategory' => 'ppob',
            'respTime' => $response->respTime,
            'status' => $response->status,
            'respMessage' => $response->respMessage
        ];

        return $dataResp;
    }
    /* EOL OF PPOB*/

    /* BUS */
    public function busSchedule($data)
    {
        $data = [
            "bus" => "All PO",
            "originTerminal" => $data['bus-origin'],
            "destinationTerminal" => $data['bus-destination'],
            "departDate" => $data['departure'],
            "paxAdult" => $data['passenger'],
            "paxChild" => 0,
            "paxInfant"=> 0,
            "userID" => $this->username,
            "accessToken" => $this->getAccessToken()->accessToken
        ];

        $request = Http::withoutVerifying()->accept('application/json')->post('https://61.8.74.42:7080/H2H/Bus/Schedule', $data);

        $response = $request->json();

        $routes = [];
        if ($response['status'] != 'FAILED') {
            foreach ($response['schedules'] as $key => $data) {
                $tmp = [];
                $tmp = array_merge_recursive($data['departLocation'], $data['arrivalLocation']);
                $routes['routes'] = $tmp;
                $response['schedules'][$key]['routes'] = $routes['routes'];
            }

        }

        $data = [
            "bus" => $response['bus'],
            "originTerminal" =>  $response['originTerminal'],
            "destinationTerminal" => $response['destinationTerminal'],
            "departDate" => $response['departDate'],
            "paxAdult" => $response['paxAdult'],
            "paxChild" => $response['paxChild'],
            "paxInfant" => $response['paxInfant'],
            "schedules" => $response['schedules'],
            "respTime" => $response['respTime'],
            "status" => $response['status'],
            "respMessage" => $response['respMessage']
        ];

        return $data;
    }

    public function busRoute()
    {
        $data = [
            "bus" => "ALL PO",
            "userID" => $this->username,
            "accessToken" => $this->getAccessToken()->accessToken
        ];

        $request = Http::withoutVerifying()->accept('application/json')->post('https://61.8.74.42:7080/H2H/Bus/Route', $data);

        $response = $request->json();

        return $response;
    }
    /* EOL */

    /* Train */
    public function trainSchedule( $data )
    {
        $data = [
            "trainID"=> "KAI",
            "paxAdult"=> $data['adult'],
            "paxChild"=> $data['children'],
            "paxInfant"=> $data['infant'],
            "departDate"=> $data['departure'],
            "origin"=> $data['train-origin'],
            "destination"=> $data['train-destination'],
            "userID"=> $this->username,
            "accessToken"=> $this->getAccessToken()->accessToken
        ];

        $request = Http::withoutVerifying()->accept('application/json')->post('https://61.8.74.42:7080/H2H/Train/Schedule', $data);

        $response = $request->json();

        return $response;
    }

    public function trainRoute()
    {
        $data = [
            "trainID" => "KAI",
            "userID" => $this->username,
            "accessToken" => $this->getAccessToken()->accessToken
        ];

        $request = Http::withoutVerifying()->accept('application/json')->post('https://61.8.74.42:7080/H2H/Train/Route', $data);

        $response = $request->json();

        return $response;
    }
    /* EOL */

    /* Airline */
    public function scheduleAllAirline($data)
    {
        $data = [
            "tripType"=> $data->tripType,
            "origin"=> $data->origin,
            "destination"=> $data->destination,
            "departDate"=> $data->departure,
            "returnDate"=> $data->return,
            "paxAdult"=> $data->adult,
            "paxChild"=> $data->child,
            "paxInfant"=> $data->infant,
            "promoCode"=> null,
            "airlineAccessCode"=> null,
            "cacheType"=> 2 ,
            "isShowEachAirline"=> false,
            "userID"=> $this->username,
            "accessToken"=> $this->getAccessToken()->accessToken
        ];

        $dataAirlineList = [
            "userID" => $this->username,
            "accessToken" => $this->getAccessToken()->accessToken
        ];

        $request = Http::withoutVerifying()->accept('application/json')->post('https://61.8.74.42:7080/H2H/Airline/ScheduleAllAirline', $data);

        $requestAirlineList = Http::withoutVerifying()->accept('application/json')->post('https://61.8.74.42:7080/h2h/Airline/List', $dataAirlineList);

        $response = $request->json();
        $responseAirlineList = $requestAirlineList->json();

        $data = [
            'flight' => isset($response['journeyDepart']) == null ? null : (isset($response['journeyReturn']) ? array_merge($response['journeyDepart'], $response['journeyReturn']) : $response['journeyDepart']),
            'respMessage' => $response['respMessage'],
            'status' => $response['status'],
            'airlines' => $responseAirlineList['airlines']
        ];



        return $data;

    }
    /* EOL */

    /* Hotel */
    public function allCountryAllCity()
    {
        $data = [
            "userID" => $this->username,
            "accessToken" => $this->getAccessToken()->accessToken
        ];

        $response = Http::withoutVerifying()->accept('application/json')->post('https://61.8.74.42:7080/H2H/Hotel/AllCountryAllCity5', $data);

        return $response->json();
    }
    /* EOL */

}
