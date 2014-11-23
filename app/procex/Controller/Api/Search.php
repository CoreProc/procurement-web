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

    public function getQuery()
    {
        $areas = \Input::get('areas');
        $classification = \Input::get('classification');
        $categories = \Input::get('categories');
        $year = \Input::get('year');

        if (empty($year)) {
            $year = '2009';
        }

        if ( ! empty($areas) && ! empty($classification) && ! empty($categories)) {
            $results = BidInformation::whereHas('projectLocation',
                function ($q) use ($areas) {
                    $q->whereIn('location', $areas);
                })
                ->whereIn('classification', $classification)
                ->whereIn('business_category', $categories)
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59');

            $total_spent = Award::whereIn('ref_id', BidInformation::whereTenderStatus('Awarded')->whereHas('projectLocation',
                function ($q) use ($areas) {
                    $q->whereIn('location', $areas);
                })
                ->whereIn('classification', $classification)
                ->whereIn('business_category', $categories)
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59')->lists('ref_id'))->sum('contract_amt');

        } elseif (empty($areas) && ! empty($classification) && ! empty($categories)) {
            $results = BidInformation::whereIn('classification', $classification)
                ->whereIn('business_category', $categories)
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59');

            $total_spent = Award::whereIn('ref_id', BidInformation::whereTenderStatus('Awarded')->whereIn('classification', $classification)
                ->whereIn('business_category', $categories)
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59')->lists('ref_id'))->sum('contract_amt');

        } elseif ( ! empty($areas) && empty($classification) && ! empty($categories)) {
            $results = BidInformation::whereHas('projectLocation',
                function ($q) use ($areas) {
                    $q->whereIn('location', $areas);
                })->whereIn('business_category', $categories)
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59');

            $total_spent = Award::whereIn('ref_id', BidInformation::whereTenderStatus('Awarded')->whereHas('projectLocation',
                function ($q) use ($areas) {
                    $q->whereIn('location', $areas);
                })->whereIn('business_category', $categories)
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59')->lists('ref_id'))->sum('contract_amt');

        } elseif ( ! empty($areas) && ! empty($classification) && empty($categories)) {
            $results = BidInformation::whereHas('projectLocation',
                function ($q) use ($areas) {
                    $q->whereIn('location', $areas);
                })
                ->whereIn('classification', $classification)
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59');

            $total_spent = Award::whereIn('ref_id', BidInformation::whereTenderStatus('Awarded')->whereHas('projectLocation',
                function ($q) use ($areas) {
                    $q->whereIn('location', $areas);
                })
                ->whereIn('classification', $classification)
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59')->lists('ref_id'))->sum('contract_amt');

        } elseif ( ! empty($areas) && empty($classification) && empty($categories)) {
            $results = BidInformation::whereHas('projectLocation',
                function ($q) use ($areas) {
                    $q->whereIn('location', $areas);
                })
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59');

            $total_spent = Award::whereIn('ref_id', BidInformation::whereTenderStatus('Awarded')->whereHas('projectLocation', function ($q) use ($areas) {
                $q->whereIn('location', $areas);
            })->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59')->lists('ref_id'))
                ->sum('contract_amt');

        } elseif (empty($areas) && ! empty($classification) && empty($categories)) {
            $results = BidInformation::whereIn('classification', $classification)
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59');

            $total_spent = Award::whereIn('ref_id', BidInformation::whereTenderStatus('Awarded')->whereIn('classification', $classification)
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59')->lists('ref_id'))->sum('contract_amt');

        } elseif (empty($areas) && empty($classification) && ! empty($categories)) {
            $results = BidInformation::whereIn('business_category', $categories)
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59');

            $total_spent = Award::whereIn('ref_id', BidInformation::whereTenderStatus('Awarded')->whereIn('business_category', $categories)
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59')->lists('ref_id'))->sum('contract_amt');

        } else {
            $results = new BidInformation;

            $results = $results->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59');

            $total_spent = Award::whereIn('ref_id', BidInformation::whereTenderStatus('Awarded')
                ->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59')
                ->lists('ref_id'))->sum('contract_amt');
        }

        $meta = [
            'total_budget_amount'     => $results->sum('approved_budget'),
            'total_spent_amount'      => $total_spent,
            'total_projects'          => $results->count(),
            'total_approved_projects' => $results->whereTenderStatus('Awarded')->count()
        ];

        return \Response::api()
            ->withPaginator($results->paginate(\Config::get('procex.request_limit')), new \Coreproc\Procex\Model\Transformer\BidInformation, 'data', $meta)->setTtl(3600);

    }

    public function getItem($ref_id)
    {
        $result = BidInformation::where('ref_id', '=', $ref_id)->first();

        if ( ! empty($result)) {
            return \Response::api()->withItem($result, new \Coreproc\Procex\Model\Transformer\BidInformation, 'data');
        }

        return \Response::api()->errorNotFound();
    }

    public function getFromLocation()
    {
        $province = \Input::get('province');
        $year = \Input::get('year');

        if (empty($year)) {
            $year = '2009';
        }

        $results = BidInformation::whereHas('projectLocation', function ($q) use ($province, $year) {
            $q->whereLocation($province);
        })->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59');

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

    public function postChrisMaxSpecial()
    {
        $data = \Input::json('data');
        $province = $data['province'];
        $category = ( ! empty($data['category'])) ? $data['category'] : null;
        $year = ( ! empty($data['year'])) ? $data['year'] : null;

        if (empty($year)) {
            $year = '2009';
        }

        if ( ! empty($category)) {
            $results = BidInformation::whereHas('projectLocation', function ($q) use ($province, $year) {
                $q->whereLocation($province);
            })->where('business_category', '=', $category);
        } else {
            $results = BidInformation::whereHas('projectLocation', function ($q) use ($province, $year) {
                $q->whereLocation($province)->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59');
            });
        }

        $meta = [
            'total_budget_amount'     => $results->sum('approved_budget'),
            'total_spent_amount'      => Award::whereIn('ref_id', BidInformation::whereHas('projectLocation', function ($q) use ($province, $year) {
                $q->whereLocation($province);
            })->where('publish_date', '>=', $year . '-01-01T00:00:00')->where('publish_date', '<=', $year . '-12-31T23:59:59')->lists('ref_id'))->sum('contract_amt'),
            'total_projects'          => $results->count(),
            'total_approved_projects' => $results->whereTenderStatus('Awarded')->count()
        ];

        return \Response::api()
            ->withPaginator($results->paginate(\Config::get('procex.request_limit')), new \Coreproc\Procex\Model\Transformer\BidInformation, 'data', $meta)->setTtl(3600);
    }
}
