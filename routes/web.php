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
| Luc Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'luc'], function () {
    Route::get('index', 'LucController@index')->name('luc.index'); // Liste des lucs

    Route::get('create', 'LucController@create')->name('luc.create'); // Formulaire de création de luc
    Route::post('store', 'LucController@store')->name('luc.store'); // Enrégistrement de luc

    Route::get('{id}/show', 'LucController@show')->name('luc.show'); //Informations sur luc

    Route::get('{id}/edit', 'LucController@edit')->name('luc.edit'); //Formulaire d'édition de luc
    Route::post('{id}/update', 'LucController@update')->name('luc.update'); // Enregistrement des modification de luc

    Route::post('destroy', 'LucController@destroy')->name('luc.destroy'); // Suppression de luc
    Route::post('destroyAll', 'LucController@destroyAll')->name('luc.destroyAll'); // Suppression de plusieurs lucs

});
/*
|--------------------------------------------------------------------------
| Sac Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'sac'], function () {
    Route::get('index', 'SacController@index')->name('sac.index'); // Liste des sacs

    Route::get('create', 'SacController@create')->name('sac.create'); // Formulaire de création de sac
    Route::post('store', 'SacController@store')->name('sac.store'); // Enrégistrement de sac

    Route::get('{id}/show', 'SacController@show')->name('sac.show'); //Informations sur sac

    Route::get('{id}/edit', 'SacController@edit')->name('sac.edit'); //Formulaire d'édition de sac
    Route::post('{id}/update', 'SacController@update')->name('sac.update'); // Enregistrement des modification de sac

    Route::post('destroy', 'SacController@destroy')->name('sac.destroy'); // Suppression de sac
    Route::post('destroyAll', 'SacController@destroyAll')->name('sac.destroyAll'); // Suppression de plusieurs sacs

});


/*
|--------------------------------------------------------------------------
| Sac Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'sac'], function () {
    Route::get('index', 'SacControllerController@index')->name('sac.index'); // Liste des sacs

    Route::get('create', 'SacControllerController@create')->name('sac.create'); // Formulaire de création de sac
    Route::post('store', 'SacControllerController@store')->name('sac.store'); // Enrégistrement de sac

    Route::get('{id}/show', 'SacControllerController@show')->name('sac.show'); //Informations sur sac

    Route::get('{id}/edit', 'SacControllerController@edit')->name('sac.edit'); //Formulaire d'édition de sac
    Route::post('{id}/update', 'SacControllerController@update')->name('sac.update'); // Enregistrement des modification de sac

    Route::post('destroy', 'SacControllerController@destroy')->name('sac.destroy'); // Suppression de sac
    Route::post('destroyAll', 'SacControllerController@destroyAll')->name('sac.destroyAll'); // Suppression de plusieurs sacs

});
