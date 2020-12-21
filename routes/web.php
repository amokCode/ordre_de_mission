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

Route::group(['prefix' => 'mission'], function () {
    Route::get('index', 'MissionController@index')->name('mission.index'); // Liste des missions

    Route::get('create', 'MissionController@create')->name('mission.create'); // Formulaire de création de mission
    Route::post('store', 'MissionController@store')->name('mission.store'); // Enrégistrement d'une mission

    Route::get('{id}/show', 'MissionController@show')->name('mission.show'); // Informations sur une mission

    Route::get('{id}/edit', 'MissionController@edit')->name('mission.edit'); // Formulaire pour éditer une mission
    Route::post('{id}/update', 'MissionController@update')->name('mission.update'); // Enregistrer les modifications sur une mission

    Route::post('destroy', 'MissionController@destroy')->name('mission.destroy'); // Supprimer une mission

    Route::post('destroyAll', 'MissionController@destroyAll')->name('mission.destroyAll'); // Supprimer plusieurs missions
});


/*
|--------------------------------------------------------------------------
| Eleve Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'eleve'], function () {
    Route::get('index', 'EleveController@index')->name('eleve.index'); // Liste des eleves

    Route::get('create', 'EleveController@create')->name('eleve.create'); // Formulaire de création de eleve
    Route::post('store', 'EleveController@store')->name('eleve.store'); // Enrégistrement de eleve

    Route::get('{id}/show', 'EleveController@show')->name('eleve.show'); //Informations sur eleve

    Route::get('{id}/edit', 'EleveController@edit')->name('eleve.edit'); //Formulaire d'édition de eleve
    Route::post('{id}/update', 'EleveController@update')->name('eleve.update'); // Enregistrement des modification de eleve

    Route::post('destroy', 'EleveController@destroy')->name('eleve.destroy'); // Suppression de eleve
    Route::post('destroyAll', 'EleveController@destroyAll')->name('eleve.destroyAll'); // Suppression de plusieurs eleves

});

/*
|--------------------------------------------------------------------------
| Eleve Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'eleve'], function () {
    Route::get('index', 'EleveController@index')->name('eleve.index'); // Liste des eleves

    Route::get('create', 'EleveController@create')->name('eleve.create'); // Formulaire de création de eleve
    Route::post('store', 'EleveController@store')->name('eleve.store'); // Enrégistrement de eleve

    Route::get('{id}/show', 'EleveController@show')->name('eleve.show'); //Informations sur eleve

    Route::get('{id}/edit', 'EleveController@edit')->name('eleve.edit'); //Formulaire d'édition de eleve
    Route::post('{id}/update', 'EleveController@update')->name('eleve.update'); // Enregistrement des modification de eleve

    Route::post('destroy', 'EleveController@destroy')->name('eleve.destroy'); // Suppression de eleve
    Route::post('destroyAll', 'EleveController@destroyAll')->name('eleve.destroyAll'); // Suppression de plusieurs eleves
});

/*
|--------------------------------------------------------------------------
| Eleve Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'eleve'], function () {
    Route::get('index', 'EleveController@index')->name('eleve.index'); // Liste des eleves

    Route::get('create', 'EleveController@create')->name('eleve.create'); // Formulaire de création de eleve
    Route::post('store', 'EleveController@store')->name('eleve.store'); // Enrégistrement de eleve

    Route::get('{id}/show', 'EleveController@show')->name('eleve.show'); //Informations sur eleve

    Route::get('{id}/edit', 'EleveController@edit')->name('eleve.edit'); //Formulaire d'édition de eleve
    Route::post('{id}/update', 'EleveController@update')->name('eleve.update'); // Enregistrement des modification de eleve

    Route::post('destroy', 'EleveController@destroy')->name('eleve.destroy'); // Suppression de eleve
    Route::post('destroyAll', 'EleveController@destroyAll')->name('eleve.destroyAll'); // Suppression de plusieurs eleves
});
