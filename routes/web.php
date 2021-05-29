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

<<<<<<< HEAD
Route::get('/', function () {
    
=======
Route::get('/home', function () {
>>>>>>> a4200979d6201eba4186a3603efc839c335b1b1a
    
    return view('home');
});

// Mobile routes
Route::post('/get-zipcodes','MobileController@get_zipcodes')->name('get-zipcodes');
Route::post('/get-barangays','MobileController@get_barangays')->name('get-barangays');
Route::post('/register-mobile','MobileController@register_user')->name('register-mobile');
Route::post('/login-mobile','MobileController@login_mobile')->name('login-mobile');
Route::post('/get-profile','MobileController@get_profile')->name('get-profile');
Route::post('/getall','MobileController@get_all')->name('getall');
Route::post('/forgot-password','MobileController@forgot_pass')->name('forgot_pass');

Route::get('/verify_email/{email}','MobileController@verify_email')->name('verify_email');

// Route::group(['middleware' => ['mobile_routes']], function () {
    
//     Route::get('/test','MobileController@test');

// });




// Route::get('/VerifyEmail', 'Email@VerifyEmail')
//     ->NAME('VerifyEmail');

// Auth::routes();


// Route::group(['middleware' => ['validateBackHistory']], function () {


// });


// Route::get('backup', function () {
//     Artisan::call('db:backup',['--database'=>'mysql']);

//     return 'Database backup success.';
// });


// Route::get('thankyou', function () { 
// 	return view('page_landing');
// })->name('thankyou');




