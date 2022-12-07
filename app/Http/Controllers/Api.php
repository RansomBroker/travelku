<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use Illuminate\Support\Facades\DB;
use App\Models\Airport;
use App\Models\Province;
use App\Models\Station;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;
use App\Lib\Amadeus;
use App\Lib\Sabre;
use App\Lib\Darmawisata;
use App\Models\Modules;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
use Hash;
use App\Models\User;

class Api extends Controller
{
    public function searchAirport($keyword)
    {
        $data = Airport::where('name', 'like', "%%$keyword%%")
            ->orWhere('city', 'like', "%%$keyword%%")
            ->orWhere('country', 'like', "%%$keyword%%")
            ->orWhere('iata', 'like', "%%$keyword%%")
            ->limit(5)->get();
        return response()->json($data);
    }

    public function fetchBooking($id)
    {
        $booking = Booking::where('order_id', $id)->first();
        return response()->json($booking);
    }

    public function searchFlight(Request $req)
    {
        $data = (object) [
            'origin'        => $req->origin,
            'destination'   => $req->destination,
            'departure'     => $req->departure,
            'return'        => $req->return,
            'adult'         => $req->adult,
            'children'      => $req->children,
            'infant'        => $req->infant,
            'currencyCode'  => 'IDR',
            'class'         => $req->class
        ];

        $lib = new Amadeus();
        $data = $lib->searchFlight($data);
        return response()->json($data);
    }
    public function searchFlightSabre(Request $req)
    {
        $data = (object) [
            'origin'        => $req->origin,
            'destination'   => $req->destination,
            'departure'     => $req->departure,
            'return'        => $req->return,
            'adult'         => $req->adult,
            'children'      => $req->children,
            'infant'        => $req->infant,
            'currencyCode'  => 'IDR',
            'class'         => $req->class
        ];

        $lib = new Sabre();
        $data = $lib->searchFlight($data);
        return response()->json($data);
    }

    public function searchOffer(Request $req)
    {
        $lib = new Amadeus();
        $data = $lib->fetchOffer($req);
        return response()->json($data);
    }

    public function fetchModule()
    {
        $modules = Modules::where('name', 'amadeus')->where('type', 'flight')->first();
        return response()->json(json_decode($modules->data));
    }

    public function fetchSnap(Request $req)
    {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-J3aOwJFzpsje7E--Y3uzumkp';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $id = time();
        $params = array(
            'transaction_details' => array(
                'order_id' => $id,
                'gross_amount' => $req->total,
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $offer = json_decode(base64_decode($req->offer));

        $data = (object) [
            'data' => (object) [
                'type'          => "flight-order",
                'flightOffers'  => [$offer],
                'remarks'       => (object) [
                    'general'   => [
                        (object) [
                            "subType"   => "GENERAL_MISCELLANEOUS",
                            "text"      => "ONLINE BOOKING FROM INCREIBLE VIAJES"
                        ]
                    ]
                ],
                "ticketingAgreement"    => (object) [
                    "option"  => "DELAY_TO_CANCEL",
                    "delay"   => "6D"
                ],
                "contacts"      => [
                    (object) [
                        "addresseeName" => (object) [
                            "firstName"   => "PRYANTO",
                            "lastName"    => "SUBAGIO"
                        ],
                        "companyName"   => "TRAVELKU.ID",
                        "purpose"       => "STANDARD",
                        "phones"        => [
                            (object) [
                                "deviceType"            => "MOBILE",
                                "countryCallingCode"    => "62",
                                "number"                => "85732596471"
                            ]
                        ],
                        "emailAddress"  => "pryanto.subagio@gmail.com",
                        "address"       => (object) [
                            "lines"     => [
                                "Jalan Poinmas Raya No. 56"
                            ],
                            "postalCode"    => "60231",
                            "cityName"      => "Depok",
                            "countryCode"   => "ID"
                        ]
                    ]
                ],
                "travelers"     => []
            ]
        ];


        foreach ($offer->travelerPricings as $traveler) {
            $o = (object) [
                'id'            => $traveler->travelerId,
                'dateOfBirth'   => $req->{'db_' . $traveler->travelerId},
                'name'          => (object) [
                    'firstName' => $req->{'fn_' . $traveler->travelerId},
                    'lastName'  => $req->{'ln_' . $traveler->travelerId}
                ],
                'gender'        => $req->{'gn_' . $traveler->travelerId},
                'contact'       => (object) [
                    'emailAddress'  => $req->email,
                    'phones'        => [
                        (object) [
                            'deviceType'            => 'MOBILE',
                            'countryCallingCode'    => str_replace('+', '', substr($req->phone, 1, 2)),
                            'number'                => substr($req->phone, 3),
                        ]
                    ]
                ]
            ];

            if (isset($req->{'pn_' . $traveler->travelerId}) && $req->{'pn_' . $traveler->travelerId} != '') {
                $o->documents   = [
                    (object) [
                        "documentType"      => "PASSPORT",
                        "birthPlace"        => $req->{'ct_' . $traveler->travelerId},
                        "issuanceLocation"  => $req->{'ct_' . $traveler->travelerId},
                        "issuanceDate"      => date('Y-m-d'),
                        "number"            => $req->{'pn_' . $traveler->travelerId},
                        "expiryDate"        => $req->{'ex_' . $traveler->travelerId},
                        "issuanceCountry"   => $req->{'cc_' . $traveler->travelerId},
                        "validityCountry"   => $req->{'cc_' . $traveler->travelerId},
                        "nationality"       => $req->{'cc_' . $traveler->travelerId},
                        "holder"            => true
                    ]
                ];
            }

            array_push($data->data->travelers, $o);
        }

        $booking = new Booking();
        $booking->order_id = $id;
        $booking->snap_token = $snapToken;
        $booking->data = base64_encode(json_encode($data));

        if (Auth::check()) {
            $booking->user_id = Auth::user()->id;
        }

        $booking->save();
        return $booking;
    }

    public function payFlight(Request $req)
    {
        $booking = Booking::where('order_id', $req->order_id)->first();
        $payload = json_decode(base64_decode($booking->data), true);
        $amadeus = new Amadeus();
        $data = [];
        unset($payload['data']['flightOffers'][0]['dictionaries']);
        unset($payload['data']['flightOffers'][0]['total']);

        if ($req->transaction_status == 'settlement' || $req->transaction_status == 'capture') {
            $response = $amadeus->payFlight($payload);
            if (isset($response->errors)) {
                $params = array(
                    'refund_key' => 'refund-' . $req->order_id,
                    'amount' => ceil($req->gross_amount),
                    'reason' => $response->errors[0]->message
                );

                $refund = \Midtrans\Transaction::refund($orderId, $params);

                $data = [
                    'message' => $response->errors[0]->message,
                    'status' => 'cancel'
                ];
            } else {
                $data = [
                    'status'         => 'success',
                    'payment_method' => ucwords(strtolower(str_replace('_', '', $req->payment_type))),
                    'pnr'            => $response->data->associatedRecords[0]->reference.'|'.$response->data->queuingOfficeId
                ];
            }
        } else if ($req->transaction_status == 'pending') {
            $data = [
                'status' => 'pending',
                'payment_method' => ucwords(strtolower(str_replace('_', '', $req->payment_type))),
            ];
        } else {
            $data = [
                'status' => 'cancel'
            ];
        }

        Booking::where('order_id', $req->order_id)->update($data);
    }

    public function auth_login(Request $req)
    {
        $cek = Auth::attempt([
            'email' => $req->email,
            'password' => $req->password
        ], $req->remember);

        if (Auth::check()) {
            if (Auth::user()->role == 'users') {
                return redirect()->to('/');
            } else {
                Auth::logout();
                Session::flash('error', 'Wrong email / password');
                return redirect()->back();
            }
        } else {
            Session::flash('error', 'Wrong email / password');
            return redirect()->back();
        }
    }

    public function admin_login(Request $req)
    {
        $cek = Auth::attempt([
            'email' => $req->email,
            'password' => $req->password
        ], $req->remember);

        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect()->to('admin/dashboard');
            } else {
                Auth::logout();
                Session::flash('error', 'Wrong email / password');
                return redirect()->back();
            }
        } else {
            Session::flash('error', 'Wrong email / password');
            return redirect()->back();
        }
    }

    public function auth_register(Request $req)
    {
        $rules = [
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|string|confirmed'
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            $data = $validator->messages()->toArray();
            $output = "";

            foreach ($data as $k => $v) {
                $output = str_replace(['[', ']'], ['', ''], $v[0]);
                break;
            }
            Session::flash('error', $output);
            return redirect()->back();
        }

        $user = new User;
        $user->name = ucwords(strtolower($req->name));
        $user->email = strtolower($req->email);
        $user->password = Hash::make($req->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->role = 'users';
        $user->phone = $req->phone;
        $simpan = $user->save();
        Session::flash('success', 'Thank you for your registration');
        return redirect()->to('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    public function save_module(Request $req)
    {
        $data = [
            'ApiKey' => $req->apikey,
            'ApiSecret' => $req->apisecret,
            'ApiSecret' => $req->apisecret,
            'domesticMargin' => $req->domesticmargin,
            'businessMargin' => $req->businessmargin,
            'margin' => $req->margin,
        ];

        Modules::where('id', $req->id)->update([
            'data' => json_encode($data)
        ]);

        Session::flash('success', 'Data has been saved');
        return redirect()->back();
    }

    /* API Controller for darmawisata */

    public function get_all_ppobtopup()
    {
        // check if access token not expired
        $darmawisata = new Darmawisata();
        $responseTopUpProduct = $darmawisata->topUpProduct();
        $responsePpobProduct = $darmawisata->ppobProduct();

        // create new array asoc for view
        $data = [];
        foreach ($responseTopUpProduct['productTypes'] as $value){
            $tmp = [];
            $tmp['name'] = $value;
            $tmp['product'] = "topup";
            $data[] = $tmp;
        }

        foreach ($responsePpobProduct['productGroups'] as $value) {
            $tmp = [];
            $tmp['name'] = $value;
            $tmp['product'] = "ppob";
            $data[] = $tmp;
        }

        return $data;
    }

    public function get_product_detail(Request $request)
    {
        $darmawisata = new Darmawisata();

        $data = [
            'category' => $request['category'],
            'product' => $request['product']
        ];

        if ($request['category'] == 'topup') {
            return $darmawisata->getProductProviderList($data);
        }

        if ($request['category'] == 'ppob') {
            return $darmawisata->getPpobProductList($data);
        }
    }

    /* EOL*/

    /*Bus*/
    public function bus_schedule(Request $request)
    {
        $darmawisata = new Darmawisata();
        return $darmawisata->busSchedule($request);
    }

    public function bus_route($keyword)
    {
        $route = Terminal::where("terminal", 'like', "%%$keyword%%")
            ->orWhere('province', 'like', "%%$keyword%%")
            ->limit(5)
            ->get();

        return response()->json($route);
    }


    /*EOL*/

    /* Train */
    public function train_schedule(Request  $request)
    {
        $darmawisata = new Darmawisata();
        return $darmawisata->trainSchedule($request);
    }

    public function train_route($keyword)
    {
        $data = Station::where('station', 'like', "%%$keyword%%")
            ->orWhere('city', 'like', "%%$keyword%%")
            ->orWhere('code', 'like', "%%$keyword%%")
            ->limit(5)->get();
        return response()->json($data);
    }
    /* EOL */

    /* Airline */
    public function schedule_all_airline(Request $request)
    {
        $darmawisata = new Darmawisata();
        return $darmawisata->scheduleAllAirline($request);
    }
    /* EOL */

}
