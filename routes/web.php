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

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::group(['prefix' => 'element'], function () {
//     Route::get('index', 'ElementController@index')->name('element.index'); // Liste des elements

//     Route::get('create', 'ElementController@create')->name('element.create'); // Formulaire de création d'un element
//     Route::post('store', 'ElementController@store')->name('element.store'); // Enrégistrement d'un element

//     Route::get('{id}/show', 'ElementController@show')->name('element.show'); // Informations sur un element

//     Route::get('{id}/edit', 'ElementController@edit')->name('element.edit'); // Formulaire pour éditer un element
//     Route::post('{id}/update', 'ElementController@update')->name('element.update'); // Enregistrer les modifications sur un element

//     Route::post('destroy', 'ElementController@destroy')->name('element.destroy'); // Supprimer un element

//     Route::post('destroyAll', 'ElementController@destroyAll')->name('element.destroyAll'); // Supprimer plusieurs elements
// });

Route::group(['prefix' => 'car'], function () {
    Route::get('index', 'CarController@index')->name('car.index'); // Liste des cars

    Route::get('create', 'CarController@create')->name('car.create'); // Formulaire de création de car
    Route::post('store', 'CarController@store')->name('car.store'); // Enrégistrement d'une car

    Route::get('{id}/show', 'CarController@show')->name('car.show'); // Informations sur une car

    Route::get('{id}/edit', 'CarController@edit')->name('car.edit'); // Formulaire pour éditer une car
    Route::post('{id}/update', 'CarController@update')->name('car.update'); // Enregistrer les modifications sur une car

    Route::post('destroy', 'CarController@destroy')->name('car.destroy'); // Supprimer une car

    Route::post('destroyAll', 'CarController@destroyAll')->name('car.destroyAll'); // Supprimer plusieurs cars
});
