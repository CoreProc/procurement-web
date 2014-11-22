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

Blade::setContentTags('<%', '%>'); 		// for variables and all things Blade
Blade::setEscapedContentTags('<%%', '%%>'); 	// for escaped data

Route::group(['prefix' => '/'], function() {
    Route::get('test', function() {
        return Coreproc\Procex\Model\Organization::where('org_id','=', '31639')->limit(5)->get();
    });

    Route::get('', 'Coreproc\Procex\Controller\HomeController@index');

    Route::get('explore', 'Coreproc\Procex\Controller\HomeController@explore');

});

