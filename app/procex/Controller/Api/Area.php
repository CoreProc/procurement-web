<?php


namespace Coreproc\Procex\Controller\Api;

use Coreproc\Procex\Model\ProjectLocation;

class Area extends \Controller
{

    public function getIndex()
    {
        $results = ProjectLocation::groupBy('location')->remember(500)->lists('location');

        return \Response::json([
            'status' => 'ok',
            'data'   => $results
        ]);
    }

}
