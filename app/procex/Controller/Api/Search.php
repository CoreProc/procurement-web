<?php
/**
 * Created by PhpStorm.
 * User: Mark Jayson
 * Date: 11/22/2014
 * Time: 1:25 PM
 */

namespace Coreproc\Procex\Controller\Api;

class Search extends \Controller {
    public function getQuery() {
        $filters = \Input::get('filters');


    }

    public function getClassification() {
        $classification_id = \Input::get('classification_id');
    }

    public function getAreas() {

    }


} 
