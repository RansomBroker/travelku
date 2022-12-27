<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web;
use App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [Web::class, 'index']);
Route::get('login', [Web::class, 'login']);
Route::get('register', [Web::class, 'register']);
Route::get('bantuan', [Web::class, 'bantuan']);
Route::get('kontak', [Web::class, 'kontak']);
Route::get('tos', [Web::class, 'tos']);

/* API for Darmawisata */
Route::get('api/ppobtopup/get-all-product', [Api::class, 'get_all_ppobtopup']);

Route::post('api/ppobtopup/get-product-detail', [Api::class, 'get_product_detail']);

Route::post('api/bus/schedule', [Api::class, 'bus_schedule']);

Route::post('api/train/schedule', [Api::class, 'train_schedule']);

Route::post('api/flight/scheduleAllAirline', [Api::class, 'schedule_all_airline']);

Route::post('api/hotel/search', [Api::class, 'hotel_search']);

Route::get('api/train/route/{keyword}', [Api::class, 'train_route']);
Route::get('api/bus/route/{keyword}', [Api::class, 'bus_route']);
Route::get('api/hotel/city/search/{keyword}', [Api::class, 'search_city']);

Route::get('bus/search', [Web::class, 'bus_search']);
Route::get('train/search', [Web::class, 'train_search']);
Route::get('flight/search-domestic', [Web::class, 'flight_search_domestic']);
Route::get('hotel/search', [Web::class, 'hotel_search']);
/* EOL*/


/* Umroh */
Route::get('api/umroh/allUmrohProduct', [Api::class, 'all_product']);
/* EOL */

Route::get('flight/search', [Web::class, 'flight_search']);
Route::get('flight/search-sabre', [Web::class, 'flight_search_sabre']);
// Route::get('flight/search', [Web::class, 'flight_search_sabre'])->name('search_sabre');
Route::post('flight/booking', [Web::class, 'flight_booking']);
Route::get('flight/status/{id}', [Web::class, 'flight_status']);
Route::get('api/airport/{keyword}', [Api::class, 'searchAirport']);
Route::post('api/flight/search', [Api::class, 'searchFlight']);
Route::post('api/flight/sabre/search', [Api::class, 'searchFlightSabre']);
Route::post('api/flight/offer', [Api::class, 'searchOffer']);
Route::post('api/flight/snap', [Api::class, 'fetchSnap']);
Route::get('api/flight/booking/{id}', [Api::class, 'fetchBooking']);
Route::post('api/flight/pay', [Api::class, 'payFlight']);
Route::get('api/module', [Api::class, 'fetchModule']);
Route::post('api/auth/login', [Api::class, 'auth_login']);
Route::post('api/admin/auth/login', [Api::class, 'admin_login']);
Route::post('api/auth/register', [Api::class, 'auth_register']);

Route::get('admin', [Web::class, 'admin']);
Route::get('logout', [Api::class, 'logout']);

Route::group(['middleware' => 'user.auth'], function () {
    Route::get('account', [Web::class, 'account']);
    Route::post('topup/order', [Web::class, 'topup_order']);
});

Route::group(['middleware' => 'admin.auth'], function () {
    Route::get('admin/dashboard', [Web::class, 'admin_dashboard']);
    Route::get('admin/modules', [Web::class, 'admin_modules']);
    Route::get('admin/booking', [Web::class, 'admin_booking']);
    Route::get('admin/product-list', [Web::class, 'admin_product_list_view']);
    Route::get('admin/add-product', [Web::class, 'add_product_view']);
    Route::get('admin/delete/product/{id}', [Web::class, 'delete_product']);
    Route::get('admin/edit/product/{id}', [Web::class, 'edit_product_view']);
    Route::post('admin/edit/product/change', [Web::class, 'edit_product']);
    Route::post('admin/add-product/add', [Web::class, 'add_product']);
    Route::post('api/admin/modules/save', [Api::class, 'save_module']);

    // vendor section
    Route::get('admin/vendor-management', [Web::class, 'vendor_management']);

    // Category section
    Route::get('admin/type-management', [Web::class, 'type_management']);
});
