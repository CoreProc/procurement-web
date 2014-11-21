<?php

namespace Coreproc\Procex\Model;

use Coreproc\Procex\Repository\Model as ProcurementModel;

class BidInformation extends ProcurementModel
{
    protected $table = '9c74991c-a5e6-4489-8413-c20a8a181d90';

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
}
