<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

if (!file_exists(app_path().'/database/production.sqlite') || !Schema::hasTable('install') || !Barrel\Entities\Install::count()) {
    Route::get('/', function()
    {
    	return View::make('hello');
    });

    Route::post('installer', [
        'as' => 'installer.action',
        'uses' => 'Barrel\Controllers\Install\InstallController@actions'
    ]);

    Route::get('installer/complete', [
        'as' => 'installer.complete',
        'uses' => 'Barrel\Controllers\Install\InstallController@completeInstall'
    ]);
}

Route::get('admin', [
    'as' => 'admin',
    'before' => 'adminAuth',
    'uses' => 'Admin\DefaultController@index'
]);

Route::get('admin/login', [
    'as' => 'admin.login',
    'uses' => 'Admin\AuthController@index'
]);

Route::get('admin/logout', [
    'as' => 'admin.logout',
    'uses' => 'Admin/AuthController'
]);
