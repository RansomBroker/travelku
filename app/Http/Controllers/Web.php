<?php

namespace App\Http\Controllers;

use App\Lib\Darmawisata;
use App\Models\Terminal;
use Illuminate\Http\Request;
use App\Lib\Amadeus;
use App\Lib\Sabre;
use App\Models\Booking;
use App\Models\Modules;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class Web extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function flight_search()
    {
        if (!isset($_GET['origin'])) {
            return redirect()->to('/');
        }

        return view('flight/search');
    }

    public function flight_search_sabre(Request $req)
    {
        if (!isset($_GET['origin'])) {
            return redirect()->to('/');
        }
        return view('flight/search-sabre');
    }

    public function flight_search_domestic()
    {
        return view('flight/search-domestic');
    }

    public function flight_booking()
    {
        if (!isset($_POST['offer'])) {
            return redirect()->to('/');
        }

        return view('flight/booking');
    }

    public function flight_status($id)
    {
        $data['id'] = $id;
        return view('flight/status', $data);
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function account()
    {
        $bookings = Booking::where('user_id', Auth::user()->id)->get();

        $data['booking'] = [];

        foreach ($bookings as $number => $book) {
            $book->data = json_decode(base64_decode($book->data));
            array_push($data['booking'], $book);
        }

        return view('account', $data);
    }

    public function admin()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect()->to('admin/dashboard');
            }
        } else {
            return view('admin/login');
        }
    }

    public function admin_dashboard()
    {
        $bookings = Booking::all();

        $data['booking'] = [];

        foreach ($bookings as $number => $book) {
            $book->data = json_decode(base64_decode($book->data));
            array_push($data['booking'], $book);
        }

        $sales = 0;

        foreach ($data['booking'] as $item) {
            $sales += $item->data->data->flightOffers[0]->total;
        }

        $data['sales'] = number_format($sales, 0, ',', '.');
        $data['users'] = User::where('role', 'users')->get();

        return view('admin/dashboard', $data);
    }

    public function admin_modules()
    {
        $modules = Modules::where('type', 'flight')->where('name', 'amadeus')->first();
        $modulessabre = Modules::where('type', 'flight')->where('name', 'sabre')->first();
        $modules->data = json_decode($modules->data);
        $modulessabre->data = json_decode($modulessabre->data);
        $data['modules'] = $modules;
        $data['sabre'] = $modulessabre;
        return view('admin/modules', $data);
    }

    public function admin_booking()
    {
        $data['booking'] = Booking::all();
        return view('admin/booking', $data);
    }

    public function bantuan()
    {
        return view('bantuan');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function tos()
    {
        return view('tos');
    }

    /* ppob top up section */
    public function topup_order(Request $request)
    {
        $darmawisata = new Darmawisata();
        /* param $request->product and $request->category*/
        $response = $darmawisata->getTopupProductList($request);
        $data['products'] = $response['products'];
        return view('content_ppob_tabs/topup_order', $data);
    }
    /* EOL */

    /*Bus*/
    public function bus_search()
    {
        return view('bus/search');
    }

    public function get_bus_route()
    {
        $darmawisata = new Darmawisata();
        $route = $darmawisata->busRoute()['routes'];
        $tmp = array_values(array_column($route, null, 'originTerminal'));
        $newRoute = [];
        foreach ($tmp as $data) {
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

        echo "done";
    }
    /*EOL*/

    /* Train */
    public function train_search()
    {
        return view('train/search');
    }
    /* EOL */

    /* Hotel */
    public function hotel_search()
    {
        return view('hotel/search');
    }
    /* EOL */
}
