<?php


namespace Coreproc\Procex\Model\Transformer;


use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class BidInformation extends TransformerAbstract
{
    public function transform(\Coreproc\Procex\Model\BidInformation $bidInformation) {
        return [
            'ref_no'               => (int) $bidInformation->ref_no,
            'notice_type'          => $bidInformation->notice_type,
            'solicitation_no'      => $bidInformation->solicitation_no,
            'classification'       => $bidInformation->classification,
            'business_category'    => $bidInformation->business_category,
            'procurement_mode'     => $bidInformation->procurement_mode,
            'funding_instrument'   => $bidInformation->funding_instrument,
            'funding_source'       => $bidInformation->funding_source,
            'approved_budget'      => $bidInformation->approved_budget,
            'award_status'         => $bidInformation->award,
            'contract_duration'    => $bidInformation->contract_duration . ' ' . $bidInformation->calendar_type,
            'trade_agreement'      => $bidInformation->trade_agreement,
            'pre_bid_date'         => $bidInformation->pre_bid_date,
            'pre_bid_venue'        => $bidInformation->pre_bid_venue,
            'procuring_entity_org' => $bidInformation->procuringEntity,
            'publish_date'         => new Carbon($bidInformation->publish_date),
            'closing_date'         => new Carbon($bidInformation->closing_date)
        ];
    }
} 
