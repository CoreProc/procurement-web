<?php

namespace Coreproc\Procex\Repository\Eloquent;

use Coreproc\Procex\Repository\Query\Builder as ProcurementEloquentBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Builder extends EloquentBuilder
{

    /**
     * Create a new Eloquent query builder instance.
     *
     * @param  \Coreproc\Procex\Repository\Query\Builder $query
     *
     * @return \Coreproc\Procex\Repository\Eloquent\Builder
     */
    public function __construct(ProcurementEloquentBuilder $query)
    {
        $this->query = $query;
    }
}
