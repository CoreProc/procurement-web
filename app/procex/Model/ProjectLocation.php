<?php
/**
 * Created by PhpStorm.
 * User: Mark Jayson
 * Date: 11/21/2014
 * Time: 8:18 PM
 */

namespace Coreproc\Procex\Model;

use Coreproc\Procex\Repository\Model as ProcurementModel;

class ProjectLocation extends ProcurementModel
{

    protected $table = '116b0812-23b4-4a92-afcc-1030a0433108';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }

}
