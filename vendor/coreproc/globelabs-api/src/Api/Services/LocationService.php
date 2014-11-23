<?php

namespace Coreproc\Globe\Labs\Api\Services;

use Coreproc\Globe\Labs\Api\Classes\Location;
use Coreproc\MsisdnPh\Msisdn;
use GuzzleHttp\Client;

class LocationService extends Service
{

    private $baseUrl = 'http://devapi.globelabs.com.ph/location/v1/queries/location';

    private $accessToken;

    private $mobileNumber;

    private $accuracy;

    /**
     * @var Msisdn
     */
    private $msisdn;

    public function locate($accessToken, $mobileNumber, $accuracy)
    {

        $this->accessToken = $accessToken;
        $this->mobileNumber = $mobileNumber;
        $this->accuracy = $accuracy;

        $requiredFields = [
            'accessToken',
            'mobileNumber',
            'accuracy'
        ];

        foreach ($requiredFields as $r) {
            if (empty($this->{$r})) {
                return null;
            }
        }

        $this->msisdn = new Msisdn($mobileNumber);
        if ($this->msisdn->isValid() == false) {
            return null;
        }

        try {
            $client = new Client();

            $response = $client->get($this->buildUrl());

            if ($response->getStatusCode() == 200) {
                $json = $response->json();

                $data = $json['terminalLocationList']['terminalLocation'];

                if ($data['locationRetrievalStatus'] == 'Retrieved') {
                    $location = new Location();
                    $location->msisdn = new Msisdn(str_replace('tel:', '', $data['address']));
                    $location->latitude = $data['currentLocation']['latitude'];
                    $location->latitude = $data['currentLocation']['longitude'];
                    $location->mapUrl = $data['currentLocation']['map_url'];
                    $location->accuracy = $data['currentLocation']['accuracy'];

                    return $location;
                }

            }

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return null;
        }

    }

    private function buildUrl()
    {
        $params = [
            'access_token'      => $this->accessToken,
            'address'           => 'tel:+' . $this->msisdn->get(true),
            'requestedAccuracy' => $this->accuracy,
        ];

        $url = $this->baseUrl . '?' . http_build_query($params);

        return $url;
    }

}