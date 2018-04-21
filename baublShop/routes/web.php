<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/design', 'HomeController@design')->name('design');
Route::get('/buy', 'HomeController@buy')->name('buy');
Route::get('/commission', 'HomeController@commission')->name('commission');
Route::post('/order', 'OrderController@ship')->name('order');


// Email related routes
use baubl\Mail\OrderShipped;
Route::get('/quote', function (Request $request) {
    Mail::to('lauryn@thecodefix.com')->send(new OrderShipped($request));
    return view('emails.mailme');
    // return 'hello';
});

// use baubl\Mail\OrderShipped;
// Route::get('/design', function (Request $request) {
//     $order = Order::findOrFail($request);
//    Mail::to('lauryn@thecodefix.com')->send(new OrderShipped($order));
//    return view('emails.mailme');
// });
 
// use baubl\Mail\OrderShipped;
// Route::get('/design', function () {
//    Mail::to('lauryn@thecodefix.com')->send(new OrderShipped);
//    return view('emails.mailme');
// });