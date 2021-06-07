<?php

use Illuminate\Support\Facades\Route;

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

// Mobile routes
Route::post('/get-zipcodes','MobileController@get_zipcodes')->name('get-zipcodes');
Route::post('/get-barangays','MobileController@get_barangays')->name('get-barangays');
Route::post('/register-mobile','MobileController@register_user')->name('register-mobile');
Route::post('/login-mobile','MobileController@login_mobile')->name('login-mobile');
Route::post('/get-profile','MobileController@get_profile')->name('get-profile');
Route::post('/getall','MobileController@get_all')->name('getall');
Route::post('/forgot-password','MobileController@forgot_pass')->name('forgot_pass');
Route::post('/location-schedule','MobileController@get_location_schedule');
Route::post('/next-location','MobileController@get_next_location');
Route::get('/citizen-patrol/{pubkey}','MobileController@citizen_patrol');
Route::get('/citizen/patrol/verification/{pubkey}','MobileController@citizen_patrol_verification');
Route::post('/verification/submit','MobileController@submit_verification')->name('submit_verification');
// Filter Address
Route::post('/get-region','MobileController@get_region');
Route::post('/get-provinces','MobileController@get_provinces');
Route::post('/get-municipality','MobileController@get_municipality');
Route::post('/get-barangay','MobileController@get_barangay');

Route::post('/submit-citizen-patrol','MobileController@submit_patrol')->name('submit_patrol');
Route::get('/verify_email/{email}','MobileController@verify_email')->name('verify_email');


Route::post('/check/has/id','MobileController@check_id_ifverified');
Route::post('/waste-type','MobileController@get_waste_type');
Route::post('/update/waste-type','MobileController@update_waste_type');
Route::post('/add/waste-type','MobileController@add_waste_type');

Route::post('/get/routes','MobileController@get_routes');
Route::post('/update/routes','MobileController@update_routes');
Route::post('/add/routes','MobileController@add_routes');



// Route::group(['middleware' => ['mobile_routes']], function () {    
//     Route::get('/test','MobileController@test');
// });
