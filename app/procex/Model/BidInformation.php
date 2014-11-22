<?php

namespace Coreproc\Procex\Model;

use Coreproc\Procex\Repository\Model as ProcurementModel;

class BidInformation extends ProcurementModel
{
    protected $table = 'baccd784-45a2-4c0c-82a6-61694cd68c9d';

    public function bidLineItems() {
        return $this->hasMany('Coreproc\Procex\Model\BidLineItem', 'ref_id');
    }

    public function awards() {
        return $this->hasMany('Coreproc\Procex\Model\Award', 'ref_id');
    }

    public function organization() {
        return $this->belongsTo('Coreproc\Procex\Model\Organization', 'org_id');
    }

    public function procuringEntity() {
        return $this->belongsTo('Coreproc\Procex\Model\Organization', 'procuring_entity_org_id');
    }

    public function clientAgency() {
        return $this->belongsTo('Coreproc\Procex\Model\Organization', 'client_agency_orgid');
    }

    public static function getTableName() {
        return with(new static)->getTable();
    }
}
