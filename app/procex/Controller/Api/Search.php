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
        } else {
            $results = BidInformation::has('bidLineItems')->paginate(10);

//            $cost = null;
//
//            $temp = BidInformation::has('awards')->lists('id');
//
//            $cost = Award::whereIn('ref_id', $temp)->sum('budget');
//
//            $meta = [
//                'total_budget_amount'     => BidInformation::sum('approved_budget'),
//                'total_spent_amount'      => $cost,
//                'total_projects'          => BidInformation::all()->count(),
//                'total_approved_projects' => BidInformation::whereTenderStatus('Awarded')
//
//            ];
        }

        return \Response::api()->withPaginator($results, new \Coreproc\Procex\Model\Transformer\BidInformation, 'data');
    }

    public function getItem($ref_no) {
        $result = BidInformation::where('ref_id', '=', $ref_no)->first();

        if (!empty($result)) {
            return \Response::api()->withItem($result, new \Coreproc\Procex\Model\Transformer\BidInformation, 'data');
        }

        return \Response::api()->errorNotFound();
    }

    public function getFromLocation($province) {

        $results = BidInformation::whereHas('projectLocation', function($q) use ($province) {
            $q->whereLocation($province);
        })->get();

        return \Response::api()->withPaginator($results, new \Coreproc\Procex\Model\Transformer\BidInformation, 'data');
    }

}
