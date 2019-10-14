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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::view('/heroes/home', 'hero.index')->name('heroes.home');

	Route::get('/classes/race/{id}', 'ClassController@classesByRace');
	Route::get('/classes/popularheroclass/', 'ClassController@popularHeroClass');
	Route::get('/weapons/class/{id}', 'WeaponController@weaponsByClass');
	Route::get('/heroes/avilableheroes/', 'HeroController@availableHeroes');
	Route::get('/races/popularherorace/', 'RaceController@popularHeroRace');

    Route::resource('heroes', 'HeroController');
	Route::resource('races', 'RaceController');
	Route::resource('modules', 'ModuleController');
});
