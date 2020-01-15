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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;


Route::get('ajax', function () {
    return view('message');
});


Route::get('/', 'IndexController@index')->name('index');
Route::get('/search', 'IndexController@search')->name('search');
//Route::get('/search/{id}', 'IndexController@searchById')->middleware('auth')->name('search.id');
Route::post('/search', 'IndexController@storeSearch')->name('store.search');
Route::post('/approve/search/{id}', 'IndexController@approveSearch')->middleware('auth')->name('approve.search');


//Ajax CRUD devices
Route::get('/ajax/devices', 'AjaxController@getAllDevices');
Route::post('/ajax/devices', 'AjaxController@addDevices');
Route::put('/ajax/devices', 'AjaxController@updateDevice');
Route::delete('/ajax/devices', 'AjaxController@deleteDevices');
//Ajax CRUD brands
Route::get('/ajax/brands', 'AjaxController@getAllBrands');
Route::post('/ajax/brands', 'AjaxController@addBrands');
Route::put('/ajax/brands', 'AjaxController@updateBrand');
Route::delete('/ajax/brands', 'AjaxController@deleteBrands');
//Ajax CRUD models
//Route::get('/ajax/models', 'AjaxController@getAllModels');
Route::get('/ajax/models', 'AjaxController@getModelsByDeviceAndBrand');
Route::post('/ajax/models', 'AjaxController@addModels');
Route::put('/ajax/models', 'AjaxController@updateModel');
Route::delete('/ajax/models', 'AjaxController@deleteModels');
//Ajax CRUD spares
Route::get('/ajax/spares', 'AjaxController@getSparesByDevice');
Route::post('/ajax/spares', 'AjaxController@addSpares');
Route::put('/ajax/spares', 'AjaxController@updateSpare');
Route::delete('/ajax/spares', 'AjaxController@deleteSpares');
//Ajax Notifications
Route::delete('/ajax/notifications', 'AjaxController@deleteNotification');
Route::put('/ajax/notifications/read', 'AjaxController@setReadNotification');


//Test
Route::get('/test/ajax/spares', 'Test\TestController@addSpares');
//Route::get('/test/ajax/spares', 'Test\TestController@deleteSpares');
//Route::get('/test/ajax/brands', 'Test\TestController@deleteBrands');
//Route::post('/test/ajax/brands/add', 'AjaxController@addBrandForDevice');
//Route::get('/test/ajax/models', 'Test\TestController@getModelsByDeviceAndBrand');
//Route::get('/test/ajax/devices', 'Test\TestController@getAllDevices');
//Route::get('/test/devices', 'Test\TestController@getDevices')->name('test.devices.index');
//Route::get('/test/{device_id}', 'Test\TestController@getBrands')->name('test.brands.index');
//Route::get('/test/{device_id}/{brand_id}', 'Test\TestController@getModels')->name('test.models.index');
//Route::get('/test/{device_id}/{brand_id}/{model_id}', 'Test\TestController@getSpares')->name('test.spares.index');
//Route::get('/test/captcha', 'Test\TestController@getTokenFromRequest');
//Route::get('/test/device/{id}/delete', 'Test\TestController@deleteDevice');

Auth::routes();
// Registration Seller Routes...
Route::get('register-seller', 'Auth\RegisterController@showRegistrationForm')->name('register.seller'); //Имя задействовано!
Route::post('register-seller', 'Auth\RegisterController@register');
// Register route for logout with method GET
Route::get('/logout', 'Auth\LoginController@logout')->name('button.logout');

//Cabinet
//Route::get('profile', 'CabinetController@showProfile')->middleware('auth')->name('show.profile');
Route::get('profile/{user_id}', 'CabinetController@showProfileById')->middleware('auth')->name('show.profile');
//Route::post('profile', 'CabinetController@saveProfile')->middleware('auth')->name('save.profile');
Route::post('profile/{user_id}', 'CabinetController@saveProfile')->middleware('auth')->name('save.profile');
//Route::get('request', 'CabinetController@showSearchesPersonal')->middleware('auth')->name('show.requests');


Route::get('/searches/{menu_search_type}', 'CabinetController@showSearches')->middleware('auth')
    ->name('show.searches');
Route::get('search/{search_id}', 'CabinetController@showSearchInfoById')->middleware('auth')
    ->name('show.search.info');
Route::get('search/{search_id}/{sort}', 'CabinetController@showSearchInfoById')->middleware('auth')
    ->name('show.search.info.sort.offer');
Route::get('search/{search_id}/accept/{offer_id}', 'CabinetController@acceptOffer')->middleware('auth')
    ->name('accept.offer');
Route::get('edit/search/{search_id}', 'CabinetController@showSearchInfoById')->middleware('auth')
    ->name('show.edit.search');
Route::put('edit/search/{search_id}', 'CabinetController@storeSearch')->middleware('auth')
    ->name('store.edit.search');
Route::delete('search/{search_id}', 'CabinetController@deleteSearch')->middleware('auth')
    ->name('delete.search');


//Route::get('search/all', 'CabinetController@showSearchesAll')->middleware('auth')->name('show.searches.all');
//Route::get('search/{id}', 'CabinetController@showSearchById')->middleware('auth')->name('show.search.id');

Route::get('users', 'CabinetController@showUsers')->middleware('auth')->name('show.users');
Route::get('message', 'CabinetController@showMessages')->middleware('auth')->name('show.messages');
Route::get('settings/catalog', 'CabinetController@showCatalog')->middleware('auth')->name('show.catalog.settings');
Route::post('offer/search/{id}', 'CabinetController@addOffer')->middleware('auth')->name('add.offer');
Route::post('offer/{id}/mention', 'CabinetController@addMention')->middleware('auth')->name('add.mention');


Route::post('message/offer/{id}', 'CabinetController@addMessageForOffer')->middleware('auth')->name('add.message');


//Cabinet->messages
Route::get('/messages/incoming', 'Cabinet\MessageController@getIncomingMessages')
    ->middleware('auth')
    ->name('show.incoming.messages');
Route::get('/messages/outgoing', 'Cabinet\MessageController@getOutgoingMessages')
    ->middleware('auth')
    ->name('show.outgoing.messages');


//Cabinet->notifications
Route::get('/notifications/users', 'Cabinet\NotificationController@getUsersNotifications')
    ->middleware('auth')
    ->name('show.users.notifications');
Route::get('/notifications/mentions', 'Cabinet\NotificationController@getMentionsNotifications')
    ->middleware('auth')
    ->name('show.mentions.notifications');
Route::get('/notifications/searches', 'Cabinet\NotificationController@getSearchesNotifications')
    ->middleware('auth')
    ->name('show.searches.notifications');
Route::get('/notifications/deals', 'Cabinet\NotificationController@getDealsNotifications')
    ->middleware('auth')
    ->name('show.deals.notifications');
Route::get('/notifications/offers', 'Cabinet\NotificationController@getOffersNotifications')
    ->middleware('auth')
    ->name('show.offers.notifications');


//Route::get('/home', 'HomeController@index')->name('home');


