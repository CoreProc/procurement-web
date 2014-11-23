<?php

namespace Coreproc\Globe\Labs\Api\Services;

class Service
{

    public $appId;
    public $appSecret;

    public function __construct($appId, $appSecret)
    {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
    }

} 