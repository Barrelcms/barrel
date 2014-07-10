<?php

use Composer\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

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

Route::get('/', function()
{
	return View::make('hello');
});

Route::post('install', [
    'as' => 'install',
    'before' => 'install',
    'uses' => 'Install\InstallController@index'
]);

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
