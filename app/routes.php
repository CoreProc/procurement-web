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

Blade::setContentTags('<%', '%>');        // for variables and all things Blade
Blade::setEscapedContentTags('<%%', '%%>');    // for escaped data

Route::group(['prefix' => '/'], function () {
    Route::get('test', function () {

    });

    Route::group(['prefix' => 'api', 'after' => 'cache'], function () {
        Route::controller('search', 'Coreproc\Procex\Controller\Api\Search');
        Route::controller('utility', 'Coreproc\Procex\Controller\Api\Utility');

        Route::controller('categories', 'Coreproc\Procex\Controller\Api\Category');
        Route::controller('areas', 'Coreproc\Procex\Controller\Api\Area');
        Route::controller('classifications', 'Coreproc\Procex\Controller\Api\Classification');
        Route::controller('notice-types', 'Coreproc\Procex\Controller\Api\NoticeType');
    });

    Route::get('', 'Coreproc\Procex\Controller\HomeController@index');

	Route::get('services', 'Coreproc\Procex\Controller\HomeController@services');

    Route::get('explore', 'Coreproc\Procex\Controller\HomeController@explore');

});

Route::controller('globelabs', 'Coreproc\Procex\Controller\Web\GlobeLabsController');
