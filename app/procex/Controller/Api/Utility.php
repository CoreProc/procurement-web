<?php


namespace Coreproc\Procex\Controller\Api;

use Geocoder\Geocoder;
use Geocoder\HttpAdapter\CurlHttpAdapter;
use Geocoder\Provider\OpenStreetMapProvider;

class Utility extends \Controller
{

    public function postLookupProvince() {
        $long = \Input::get('long');
        $lat  = \Input::get('lat');

        $adapter  = new CurlHttpAdapter();
        $provider = new OpenStreetMapProvider($adapter);

        $geocoder = new Geocoder($provider);

        $result = $geocoder->reverse($lat, $long);

        if ($result->getCountry() == 'Philippines') {
            return \Response::json([
                'status' => 'ok',
                'data'   => [
                    'province' => $result->getRegion()
                ]
            ]);
        }

        return \Response::json([
            'status' => 'error'
        ]);
    }

}
