<?php

namespace Coreproc\Globe\Labs;

use Coreproc\Globe\Labs\Api\GlobeLabsService;

class GlobeLabs
{

    public static function service($appId, $appSecret)
    {
        $globeLabsService = new GlobeLabsService();

        $globeLabsService->setAppId($appId);
        $globeLabsService->setAppSecret($appSecret);

        return $globeLabsService;
    }

} 