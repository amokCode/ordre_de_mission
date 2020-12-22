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

/*
|--------------------------------------------------------------------------
| Mission Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'mission'], function () {
    Route::get('index', 'MissionController@index')->name('mission.index'); // Liste des missions

    Route::get('create', 'MissionController@create')->name('mission.create'); // Formulaire de création de mission
    Route::post('store', 'MissionController@store')->name('mission.store'); // Enrégistrement de mission

    Route::get('{id}/show', 'MissionController@show')->name('mission.show'); //Informations sur mission

    Route::get('{id}/edit', 'MissionController@edit')->name('mission.edit'); //Formulaire d'édition de mission
    Route::post('{id}/update', 'MissionController@update')->name('mission.update'); // Enregistrement des modification de mission

    Route::post('destroy', 'MissionController@destroy')->name('mission.destroy'); // Suppression de mission
    Route::post('destroyAll', 'MissionController@destroyAll')->name('mission.destroyAll'); // Suppression de plusieurs missions
});
