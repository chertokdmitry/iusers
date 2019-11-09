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

Route::get('/', 'IndexController@index');

Route::resources([
    'users' => 'UsersController'
]);

Route::get('ajax',function(){
    return view('message');
});
Route::post('/getdata','AjaxController@index');
Route::post('/addrole','AjaxController@addRole');
Route::post('/removerole','AjaxController@removeRole');

Route::get('/search',['uses' => 'SearchController@getSearch','as' => 'search']);
Route::get('/searchdate',['uses' => 'SearchController@getSearchDate','as' => 'searchdate']);


