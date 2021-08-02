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
Auth::routes();
Route::get('/', function() {
      return redirect()->intended(route('login'));
  });
// Mobile routes
Route::get('/mobile/routes/{city}','AdminController@mobile_routes')->name('mobile_routes');

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
Route::post('/get/schedule','MobileController@get_schedule');
Route::post('/add/schedule','MobileController@add_schedule');
Route::post('/update/schedule','MobileController@update_schedule');
Route::post('/get/schedule/by/day','MobileController@get_location_by_day');


Route::post('/get/verification','MobileController@get_verification');


Route::post('/get/status','MobileController@get_status');

Route::post('/update/status','MobileController@update_status');

Route::post('/get/citizen/patrol','MobileController@get_citizen_patrol');
Route::post('/update/concern','MobileController@update_concern');

Route::post('/get/waste','MobileController@get_waste');
Route::post('/add/waste','MobileController@add_waste');

Route::post('/get/swm_location','MobileController@get_swm_location');
Route::post('/add/swm_location','MobileController@add_swm_location');
Route::post('/update/swm_location','MobileController@update_swm_location');
Route::post('/get_nearby','MobileController@get_nearby');

Route::get('/swm/facilities','AdminController@swm_facilities')->name('swm_facilities');
Route::get('collection/routes','AdminController@routes')->name('routes');

Route::get('/swm/waste/guide','AdminController@waste_guide')->name('waste_guide');

Route::get('/waste/return','AdminController@return_waste')->name('return_waste');

Route::post('/search/facilities','AdminController@search_facilities')->name('search_facilities');
Route::post('/search/waste/facilities','AdminController@search_waste_facility')->name('search_waste_facility');

Route::post('/get_swm','AdminController@get_swm')->name('get_swm');


Route::get('/waste/composition','AdminController@pv_waste_composition')->name('pv_waste_composition');
Route::get('/waste/data','AdminController@pv_waste_data')->name('pv_waste_data');

Route::post('/swm_filter','AdminController@swm_filter')->name('swm_filter');

Route::group(['middleware' => ['validateBackHistory']], function () {

	Route::group(['middleware' => ['authenticate']], function () {

		Route::group(['middleware' => ['admin']], function () {

                  Route::post('/crud_waste_composition','AdminController@crud_waste_composition')->name('crud_waste_composition');
                  Route::post('/crud_waste_data','AdminController@crud_waste_data')->name('crud_waste_data');
                  Route::get('admin/waste/composition','AdminController@get_waste_composition')->name('get_waste_composition');
                  Route::get('admin/waste/data','AdminController@get_waste_data')->name('get_waste_data');

            Route::get('/admin/dashboard','AdminController@admin_dashboard')->name('admin_dashboard');

            Route::get('/waste','AdminController@get_waste')->name('get_waste');
            Route::get('/routes','AdminController@get_routes')->name('get_routes');
            Route::get('/home','AdminController@get_analytics')->name('get_analytics');
            // crud waste
            
            Route::post('/crud/waste','AdminController@crud_waste')->name('crud_waste');
            Route::post('/import/waste','AdminController@import_waste')->name('import_waste');
            Route::post('/provinces','AdminController@provinces')->name('provinces');
            
            Route::post('/municipality','AdminController@municipality')->name('municipality');
            Route::post('/barangay','AdminController@barangay')->name('barangay');
            Route::post('/crud_routes','AdminController@crud_routes')->name('crud_routes');
            Route::post('/crud_swm','AdminController@crud_swm')->name('crud_swm');


            
            Route::get('/swm','AdminController@swm')->name('swm');
            Route::get('/guides','AdminController@guides')->name('guides');

            // Verification

            Route::get('/pending/verification','AdminController@verification')
            ->defaults('typeofview', 'pending')->name('pending');

            Route::get('/approved/verification','AdminController@verification')
            ->defaults('typeofview', 'approved')->name('approved');

            Route::get('/declined/verification','AdminController@verification')
            ->defaults('typeofview', 'declined')->name('declined');

            // Patrol

            Route::get('/pending/patrol','AdminController@citizen_patrol')
            ->defaults('typeofview', 'pending')->name('pending_p');

            Route::get('/approved/patrol','AdminController@citizen_patrol')
            ->defaults('typeofview', 'approved')->name('approved_p');

            Route::get('/declined/patrol','AdminController@citizen_patrol')
            ->defaults('typeofview', 'declined')->name('declined_p');
            
            Route::post('/verification_update','AdminController@verification_update')->name('verification_update');
            Route::post('/patrol_update','AdminController@patrol_update')->name('patrol_update');

            Route::get('/collection','AdminController@collection_calendar')->name('collection_calendar');

                        
            Route::post('/crud_collection','AdminController@crud_collection')->name('crud_collection');
            
            Route::post('/crud_guide','AdminController@crud_guide')->name('crud_guide');

            
            Route::post('/search_waste_data','AdminController@search_waste_data')->name('search_waste_data');
            
      });
	});

});
