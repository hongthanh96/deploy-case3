<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomepageController@index')->name('homepage');
    Route::get('/showAlbum/{id}','HomepageController@showAlbum')->name('home.showAlbum');
    // Route::get('/home', function () {
    //     return view('users');
    // });
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.home');
    })->name('admin.home');
    Route::get('/Albums', 'AlbumController@index')->name('album.index');
    Route::get('/albumDetail', 'AlbumdetailController@index')->name('albumDetail.index');
    Route::get('/services', 'ServiceController@index')->name('service.index');
    Route::get('/packList', 'PacklistController@index')->name('packList.index');
    Route::get('/packDetail', 'PackdetailController@index')->name('packDetail.index');
    Route::get('/user', 'UserController@index')->name('user.index');
});

Route::group(['prefix' => 'services'], function () {
    Route::get('/getApi', 'ServiceController@getApi')->name('service.getApi');
    Route::post('/create', 'ServiceController@create')->name('service.create');
    Route::get('/edit/{id}', 'ServiceController@edit')->name('service.edit');
    Route::put('/update/{id}', 'ServiceController@update')->name('service.update');
    Route::delete('destroy/{id}', 'ServiceController@destroy')->name('service.destroy');

});

Route::group(['prefix' => 'albums'], function () {
    Route::get('/apiAlbum','AlbumController@getAlbums')->name('album.apiAlbum');
    Route::post('/create', 'AlbumController@create')->name('album.create');
    Route::get('/edit/{id}', 'AlbumController@edit')->name('album.edit');
    Route::put('/update/{id}', 'AlbumController@update')->name('album.update');
    Route::delete('/destroy/{id}', 'AlbumController@destroy')->name('album.destroy');
});

Route::group(['prefix' => 'albumDetail'], function () {
    Route::get('/apiDetailAlbum','AlbumdetailController@getDetailAlbum');
    Route::get('/apiDetailAlbum/{id}','AlbumdetailController@getDetailAlbumImage');

    // Route::post('/albumDetail/store', 'AlbumdetailController@store')->name('albumDetail.store');

    Route::post('/create', 'AlbumdetailController@create')->name('albumDetail.create');
    Route::get('/edit/{id}', 'AlbumdetailController@edit')->name('albumDetail.edit');
    Route::put('/update/{id}', 'AlbumdetailController@update')->name('albumDetail.update');
    Route::delete('/destroy/{id}', 'AlbumdetailController@destroy')->name('albumDetail.destroy');
});

Route::group(['prefix' => 'packLists'], function () {
    Route::get('/apiPactlist','PacklistController@getPactlists');
    Route::post('/create', 'PacklistController@create');
    Route::get('/edit/{id}', 'PacklistController@edit');
    Route::put('/update/{id}', 'PacklistController@update');
    Route::delete('/destroy/{id}', 'PacklistController@destroy');
});

Route::group(['prefix' => 'packDetails'], function () {
    Route::get('/apiPacklDetail','PackdetailController@getPackDetail');
    Route::post('/create', 'PackdetailController@create');
    Route::get('/edit/{id}', 'PackdetailController@edit');
    Route::put('/update/{id}', 'PackdetailController@update');
    Route::delete('/destroy/{id}', 'PackdetailController@destroy');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/apiUser','UserController@getUser');
    Route::get('/show/{id}','UserController@showUser');
    Route::put('/changeAdmin/{id}','UserController@changeAdmin');
    Route::put('/changeRole/{id}','UserController@changeRole');
    Route::put('/changeBlock/{id}','UserController@changeBlock');

    Route::get('/edit/{id}','UserController@edit');
    Route::post('/update','UserController@update');
});







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
