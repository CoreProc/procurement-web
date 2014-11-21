<?php
/**
 * Created by PhpStorm.
 * User: Mark Jayson
 * Date: 11/21/2014
 * Time: 4:59 PM
 */

namespace Coreproc\Procex\Model;

use Coreproc\Procex\Repository\Model as ProcurementModel;

class Organization extends ProcurementModel {
    protected $table = '23de10e9-197e-4294-abd1-eba0188110cd';

    public function bidInformations() {
        return $this->hasMany('Coreproc\Procex\Model\BidInformation', 'org_id');
    }
} 
