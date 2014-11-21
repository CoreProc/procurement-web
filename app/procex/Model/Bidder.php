<?php
/**
 * Created by PhpStorm.
 * User: Mark Jayson
 * Date: 11/21/2014
 * Time: 4:49 PM
 */

namespace Coreproc\Procex\Model;

use Coreproc\Procex\Repository\Model as ProcurementModel;

class Bidder extends ProcurementModel {
    protected $table = '922f8c2c-8ef6-4e46-bc4e-8799c47b8ecf';

    public function organization() {
        return $this->belongsTo('Coreproc\Procex\Model\Organization', 'org_id');
    }

    public function bidLineItem() {
        return $this->belongsTo('Coreproc\Procex\Model\BidLineItem', 'item_no');
    }

    public function award() {
        return $this->belongsTo('Coreproc\Procex\Model\Award', 'award_id');
    }
} 
