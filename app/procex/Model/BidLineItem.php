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
    protected $table = '63e29a04-6b13-48f8-ab13-ba72dc9ffcdc';

    public function bidders() {
        return $this->hasMany('Coreproc\Procex\Model\Bidder', 'item_no');
    }

    public function bidInformation() {
        return $this->belongsTo('Coreproc\Procex\Model\BidInformation', 'ref_id');
    }
} 
