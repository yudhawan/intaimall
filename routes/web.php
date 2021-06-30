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
// Auth::routes(['login'=>false]);
// Route::get('/', function ()
// {
// 	return view('welcome');
// });
Route::get('/dasboard', 'Admin@index');
Route::get('/data/{month?}', 'Admin@data');
Route::get('/aproduct', 'Admin@product');
Route::get('/product_out', 'Admin@product_out');
Route::get('/aorder','Admin@order');
Route::get('/add_product', 'Admin@add_product');
Route::get('/aedit_product/{id}', 'Admin@edit_product');
Route::get('/delete/{id}/{table}', 'Admin@delete');
Route::get('/acategory', 'Admin@category');
Route::get('/avoucher', 'Admin@voucher');
Route::get('/adiscount', 'Admin@discount');
Route::get('/avoucher', 'Admin@voucher');
Route::get('/ainbox', 'Admin@inbox');
Route::get('/sub/{id}', 'Admin@sub');
Route::get('proccess_order/{id}', 'Admin@proccess_order');
Route::get('coba', 'Admin@coba');

Route::post('/tambah', 'Admin@tambah');
Route::post('/update_cat', 'Admin@update_cat');
Route::post('/update_brand', 'Admin@update_brand');
Route::post('/update_pro', 'Admin@update_pro');
Route::post('/update_disc', 'Admin@update_disc');
Route::post('/add_category', 'Admin@add_category');
Route::post('/add_sub_cat', 'Admin@add_sub_cat');
Route::post('/add_voucher', 'Admin@add_voucher');
Route::post('/add_discount', 'Admin@add_discount');

Route::get('/administratorim', 'Adminauth@showlogin');
Route::post('/admnlgn', 'Adminauth@login')->name('masuk');



Route::post('masuk', 'Auth\LoginController@masuk');
//chat


//Route::get('/a', 'HomeController@index')->name('home');

Route::get('/contacts', 'Contacts@get');
Route::get('/conversation/{id}', 'Contacts@getMessagesFor');
Route::post('/conversation/send', 'Contacts@send');

//User
Route::get('/', function(){ return redirect('home'); });
Route::post('/search', 'User@search');
Route::get('/setup', 'User@setup')->middleware('userauth');
Route::post('updateuser', 'User@updateuser')->middleware('userauth');
Route::get('home', 'User@home');
Route::get('addwishlist/{id}', 'User@addwishlist')->middleware('userauth');
Route::get('wishlist_page', 'User@wishlist_page')->middleware('userauth');
Route::get('rmvw/{id}', 'User@rmvw')->middleware('userauth');
Route::get('history_page', 'User@history_page')->middleware('userauth');
Route::get('setting', 'User@setting')->middleware('userauth');
Route::get('product/{id?}', 'User@product');
Route::get('details/{id}', 'User@details');
Route::get('contacts', 'User@contacts');
Route::get('cart', 'User@cart')->middleware('userauth');
Route::get('checkout', 'User@checkout')->middleware('userauth');
// Route::get('confirm_page', 'User@confirm_page')->middleware('userauth');

Route::get('add_cart/{id}', 'Shipping@add')->middleware('userauth');
Route::get('remove_cart/{id}', 'Shipping@remove')->middleware('userauth');
Route::get('forget', 'User@forget');
Route::post('proccess', 'Shipping@proccess_checkout')->middleware('userauth');

Route::post('add_to_basket', 'Shipping@add_to_basket')->middleware('userauth');
Route::post('update_cart', 'Shipping@update')->middleware('userauth');
Route::post('update_address', 'User@update_address')->middleware('userauth');
Auth::routes();