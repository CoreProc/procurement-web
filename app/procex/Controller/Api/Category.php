<?php


namespace Coreproc\Procex\Controller\Api;


use Coreproc\Procex\Model\BidInformation;

class Category extends \Controller {
    public function getIndex() {
        $results = BidInformation::groupBy('business_category')->remember(500)->lists('business_category');

        return \Response::json([
            'status' => 'ok',
            'data' => $results
        ]);
    }
} 
