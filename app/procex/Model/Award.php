<?php
/**
 * Created by PhpStorm.
 * User: Mark Jayson
 * Date: 11/21/2014
 * Time: 4:37 PM
 */

namespace Coreproc\Procex\Model;

use Coreproc\Procex\Repository\Model as ProcurementModel;

class Award extends ProcurementModel {
    protected $table = '539525df-fc9a-4adf-b33d-04747e95f120';

    public function bidLineItems() {
        return $this->belongsTo('Coreproc\Procex\Model\BidLineItem', 'item_no');
    }

    public function bidders() {
        return $this->hasMany('Coreproc\Procex\Model\Bidder', 'award_id');
    }
} 
