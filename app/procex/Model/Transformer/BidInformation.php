<?php


namespace Coreproc\Procex\Model\Transformer;


use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class BidInformation extends TransformerAbstract
{
    public function transform(\Coreproc\Procex\Model\BidInformation $bidInformation) {
        return [
            'ref_no'               => (int)$bidInformation->ref_no,
            'solicitation_no'      => (int)$bidInformation->solicitation_no,
            'name'                 => $bidInformation->tender_title,
            'description'          => $bidInformation->description,
            'special_instruction'  => $bidInformation->special_instruction,
            'notice_type'          => $bidInformation->notice_type,
            'tender_status'        => $bidInformation->tender_status,
            'classification'       => $bidInformation->classification,
            'business_category'    => $bidInformation->business_category,
            'procurement_mode'     => $bidInformation->procurement_mode,
            'funding_instrument'   => $bidInformation->funding_instrument,
            'funding_source'       => $bidInformation->funding_source,
            'approved_budget'      => (double)$bidInformation->approved_budget,
            'contract_duration'    => $bidInformation->contract_duration . ' ' . $bidInformation->calendar_type,
            'trade_agreement'      => $bidInformation->trade_agreement,
            'pre_bid_date'         => $bidInformation->pre_bid_date,
            'pre_bid_venue'        => $bidInformation->pre_bid_venue,
            'procuring_entity_org' => $bidInformation->procuringEntity,
            'publish_date'         => $bidInformation->publish_date,
            'closing_date'         => $bidInformation->closing_date,
            'contact'              => [
                'person'  => $bidInformation->contact_person,
                'address' => $bidInformation->contact_person_address
            ],
            'collection'           => [
                'contract' => $bidInformation->collection_contract,
                'point'    => $bidInformation->collection_point
            ],
            'award_details'        => $bidInformation->awards,
            'project_location'     => $bidInformation->projectLocation
        ];
    }
} 
