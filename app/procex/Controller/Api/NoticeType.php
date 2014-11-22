<?php

namespace Coreproc\Procex\Controller\Api;

use Coreproc\Procex\Model\BidInformation;

class NoticeType extends \Controller
{

    public function getIndex()
    {
        $results = BidInformation::groupBy('notice_type')->remember(500)->lists('notice_type');

        return \Response::json([
            'status' => 'ok',
            'data'   => $results
        ]);
    }

}
