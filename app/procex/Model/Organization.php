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
    protected $table = 'ec10e1c4-4eb3-4f29-97fe-f09ea950cdf1';

    public function bidInformations() {
        return $this->hasMany('Coreproc\Procex\Model\BidInformation', 'org_id');
    }

    public static function getTableName() {
        return with(new static)->getTable();
    }
} 
