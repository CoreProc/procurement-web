<?php
/**
 * Created by PhpStorm.
 * User: Mark Jayson
 * Date: 11/21/2014
 * Time: 4:49 PM
 */

namespace Coreproc\Procex\Model;

use Coreproc\Procex\Repository\Model as ProcurementModel;

class Bidder extends ProcurementModel
{
    protected $table = '6427affb-e841-45b8-b0dc-ed267498724a';

    public function organization() {
        return $this->belongsTo('Coreproc\Procex\Model\Organization', 'org_id');
    }

    public function bidLineItem() {
        return $this->belongsTo('Coreproc\Procex\Model\BidLineItem', 'item_no');
    }

    public function award() {
        return $this->belongsTo('Coreproc\Procex\Model\Award', 'award_id');
    }

    public static function getTableName() {
        return with(new static)->getTable();
    }
} 
