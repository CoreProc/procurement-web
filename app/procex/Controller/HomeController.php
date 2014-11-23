<?php namespace Coreproc\Procex\Controller;

use Coreproc\Procex\Model\Organization;
use Coreproc\Procex\Repository\Test;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function index()
    {
        $this->layout = \View::make('index');
    }

	public function services()
	{
		$this->layout = \View::make('services');
	}
    
    public function explore()
    {
		$this->layout = \View::make('procex.explore');
    }

	public function landing()
	{
		$this->layout = \View::make('landing');
	}

    public function test()
    {
        echo Lang::get('procex.smsMessages.help');
    }

}
