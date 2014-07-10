<?php namespace Install;

use BaseController;
use Artisan;

class InstallController extends BaseController {

    public function index()
    {
        $dbPath = app_path().'/database/production.sqlite';
        file_put_contents($dbPath, '');
        Artisan::call('migrate');
    }

}