<?php
/**
 * Created by PhpStorm.
 * User: Mark Jayson
 * Date: 11/21/2014
 * Time: 4:55 PM
 */

namespace Coreproc\Procex\Model;

use Coreproc\Procex\Repository\Model as ProcurementModel;


class BidLineItem extends ProcurementModel {
    protected $table = 'daa80cd8-da5d-4b9d-bb6d-217a360ff7c1';

    public function bidders() {
        return $this->hasMany('Coreproc\Procex\Model\Bidder', 'item_no');
    }

    public function bidInformation() {
        return $this->belongsTo('Coreproc\Procex\Model\BidInformation', 'ref_id');
    }
} 
