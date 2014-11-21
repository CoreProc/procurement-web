<?php

namespace Coreproc\Procurement\Database\Eloquent;

use Coreproc\Procurement\Database\Query\Builder as ProcurementEloquentBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Builder extends EloquentBuilder
{

    /**
     * Create a new Eloquent query builder instance.
     *
     * @param  \Coreproc\Procurement\Database\Query\Builder $query
     * @return \Coreproc\Procurement\Database\Eloquent\Builder
     */
    public function __construct(ProcurementEloquentBuilder $query)
    {
        $this->query = $query;
    }
}