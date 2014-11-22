<?php
/**
 * Created by PhpStorm.
 * User: Mark Jayson
 * Date: 11/22/2014
 * Time: 1:25 PM
 */

namespace Coreproc\Procex\Controller\Api;

use Coreproc\Procex\Model\Award;
use Coreproc\Procex\Model\BidInformation;

class Search extends \Controller
{

    public function getQuery() {
        $areas          = \Input::get('areas');
        $classification = \Input::get('classification');
        $categories     = \Input::get('categories');
        $year           = \Input::get('year');

        if (empty($year)) {
            $year = '2009';
        }

        if (!empty($areas) && !empty($classification) ) {
            $results = BidInformation::whereHas('projectLocation', function ($q) use ($areas) {
                $q->whereIn('location', $areas);
            })->paginate(\Config::get('procex.request_limit'));



        } else {
            $results = BidInformation::paginate(\Config::get('procex.request_limit'));

            $meta = [
                'total_budget_amount'     => BidInformation::where('publish_date', '>=', $year . '-01-01T00:00:00')->sum('approved_budget'),
                'total_spent_amount'      => Award::whereIn('ref_id', BidInformation::whereTenderStatus('Awarded')->where('publish_date', '>=', $year .
                                                                                                                                                '-01-01T00:00:00')
                        ->lists('ref_id'))->sum('contract_amt'),
                'total_projects'          => BidInformation::where('publish_date', '>=', $year . '-01-01T00:00:00')->count(),
                'total_approved_projects' => BidInformation::whereTenderStatus('Awarded')->where('publish_date', '>=', $year . '-01-01T00:00:00')->count()
            ];
        }

        return \Response::api()->withPaginator($results, new \Coreproc\Procex\Model\Transformer\BidInformation, 'data', $meta);
    }

    public function getItem($ref_id) {
        $result = BidInformation::where('ref_id', '=', $ref_id)->first();

        if (!empty($result)) {
            return \Response::api()->withItem($result, new \Coreproc\Procex\Model\Transformer\BidInformation, 'data');
        }

        return \Response::api()->errorNotFound();
    }

    public function getFromLocation() {
        $province = \Input::get('province');
        $year     = \Input::get('year');

        if (empty($year)) {
            $year = '2009';
        }

        $results = BidInformation::whereHas('projectLocation', function ($q) use ($province, $year) {
            $q->whereLocation($province);
        })->where('publish_date', '>=', $year . '-01-01T00:00:00');

        $meta = [
            'total_budget_amount'     => $results->sum('approved_budget'),
            'total_spent_amount'      => Award::whereIn('ref_id', BidInformation::whereHas('projectLocation', function ($q) use ($province) {
                $q->whereLocation($province);
            })->lists('ref_id'))->sum('contract_amt'),
            'total_projects'          => $results->count(),
            'total_approved_projects' => $results->whereTenderStatus('Awarded')->count()
        ];

        return \Response::api()
            ->withPaginator($results->paginate(\Config::get('procex.request_limit')), new \Coreproc\Procex\Model\Transformer\BidInformation, 'data', $meta);
    }

}
