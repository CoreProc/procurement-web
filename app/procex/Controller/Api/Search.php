<?php
/**
 * Created by PhpStorm.
 * User: Mark Jayson
 * Date: 11/22/2014
 * Time: 1:25 PM
 */

namespace Coreproc\Procex\Controller\Api;

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
            $results = BidInformation::paginate(15);
        }

        $meta = [
            ''
        ];

        return \Response::api()->withPaginator($results, new \Coreproc\Procex\Model\Transformer\BidInformation, 'data', $meta);
    }

    public function getClassification($classification = null) {

    }

    public function getAreas($area = null) {

    }

    public function getCategories($category = null) {

    }

    public function getFromLocation($long, $lat) {
        $long = \Input::get('long');
        $lat = \Input::get('lat');


    }


} 
