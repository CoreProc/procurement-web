<?php

namespace Coreproc\Globe\Labs\Api;

use Coreproc\Globe\Labs\Api\Services\LocationService;
use Coreproc\Globe\Labs\Api\Services\SmsService;

class GlobeLabsService
{

    /**
     * @var string
     */
    private $appId;

    /**
     * @var string
     */
    private $appSecret;

    public function __construct()
    {
        // nothing here yet
    }

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * @param string $appSecret
     */
    public function setAppSecret($appSecret)
    {
        $this->appSecret = $appSecret;
    }

    /**
     * @return SmsService
     */
    public function smsService()
    {
        $smsService = new SmsService($this->appId, $this->appSecret);

        return $smsService;
    }

    /**
     * @return LocationService
     */
    public function locationService()
    {
        $locationService = new LocationService($this->appId, $this->appSecret);

        return $locationService;
    }

}