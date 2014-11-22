<?php


namespace Coreproc\Procex\Controller\Api;


use Coreproc\Procex\Model\BidInformation;

class Classification extends \Controller {
    public function getIndex() {
        $results = BidInformation::groupBy('classification')->remember(500)->lists('classification');

        return \Response::json([
            'status' => 'ok',
            'data' => $results
        ]);
    }
} 
