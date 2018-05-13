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
    return Redirect::route('user.signin');
});

Route::prefix('user')->group(function () {
    Route::group(['middleware' => ['guest']], function () {
        Route::get('/signin', 'UserController@showSignin')->name('user.signin');

        Route::post('/signin', 'UserController@signin')->name('user.signin');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/profile', 'UserController@profile')->name('user.profile');

        Route::get('/logout', 'UserController@logout')->name('user.logout');
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/list', 'UserController@list')->name('user.list');
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('/store', 'UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::put('/update/{id}', 'UserController@update')->name('user.update');
    });

    Route::group(['middleware' => ['role:admin|owner']], function () {
        Route::prefix('project')->group(function () {
            Route::get('/list', 'ProjectController@index')->name('project.list');
            Route::get('/create', 'ProjectController@create')->name('project.create');
            Route::post('/store', 'ProjectController@store')->name('project.store');

            Route::get('/{projectId}/{langId}/{versionId}/create/localization', 'LocalizationController@create')->name('project.localization3');
            Route::get('/{projectId}/{langId}/create/localization', 'LocalizationController@create')->name('project.localization2');
            Route::get('/{projectId}/create/localization', 'LocalizationController@create')->name('project.localization');

            Route::post('/store/localization', 'LocalizationController@store')->name('project.localization.store');

            Route::get('/{versionId}/vocabulary', 'LocalizationController@showVocabulary')->name('project.vocabulary.list');
        });
    });

});