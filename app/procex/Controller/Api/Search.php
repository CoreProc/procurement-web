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
use Coreproc\Procex\Repository\Request;

class Search extends \Controller
{

    public function getQuery() {
        $filters = \Input::get('filters');

        if (!empty($filters)) {
            $filters = join(' ', $filters);

            $results = new Request($filters, false, BidInformation::getTableName());

            if (!$results->execute()) {
                return \Response::api()->errorNotFound();
            }

            $results = $results->data;
        } else {

            $results = BidInformation::paginate(\Config::get('procex.request_limit'));

            $cost = null;

            $temp = BidInformation::has('awards')->lists('ref_id');

            $cost = Award::whereIn('ref_id', $temp)->sum('budget');

            $meta = [
                'total_budget_amount'     => BidInformation::sum('approved_budget'),
                'total_spent_amount'      => $cost,
                'total_projects'          => BidInformation::all()->count(),
                'total_approved_projects' => BidInformation::whereTenderStatus('Awarded')

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

    public function getFromLocation($province) {

        $results = BidInformation::whereHas('projectLocation', function ($q) use ($province) {
            $q->whereLocation($province);
        });

        $temp = $results;

        $meta = [
            'total_budget_amount'     => $results->sum('approved_budget'),
            'total_spent_amount'      => $results,
            'total_projects'          => $results->count(),
            'total_approved_projects' => $temp->whereTenderStatus('Awarded')->count()
        ];

        return \Response::api()
            ->withPaginator($results->paginate(\Config::get('procex.request_limit')), new \Coreproc\Procex\Model\Transformer\BidInformation, 'data', $meta);
    }

}
