<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('cors')->group(function(){
    // menambahkan route untuk person
    Route::get('/person','PersonController@all');
    Route::get('/person/{id}','PersonController@show');
    Route::post('/person','PersonController@store');
    Route::put('/person/{id}','PersonController@update');
    Route::delete('/person/{id}','PersonController@delete');

    // menambahkan route untuk zakat
    Route::get('/zakat','ZakatController@all')->middleware('jwt.verify');
    Route::get('/zakat/{id}','ZakatController@show')->middleware('jwt.verify');
    Route::post('/zakat','ZakatController@store')->middleware('jwt.verify');
    Route::put('/zakat/{id}','ZakatController@update')->middleware('jwt.verify');
    Route::delete('/zakat/{id}','ZakatController@delete')->middleware('jwt.verify');
    Route::get('/zakatall','ArticleController@index');

    // add package
    Route::post('package', 'PackageController@store');
    Route::put('package/{id}', 'PackageController@update');
    Route::get('package', 'PackageController@all');
    
    // Auth
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::post('anggota', 'UserController@postAnggota');
    Route::post('regpack', 'UserController@postPackage');
    Route::get('user/{id}', 'UserController@getUser');
    Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

    // pagination
    Route::get('/pegawai','PegawaiController@index');    

});
