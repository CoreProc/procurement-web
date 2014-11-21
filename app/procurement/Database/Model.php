<?php

namespace Coreproc\Procurement\Database;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Coreproc\Procurement\Database\Query\Builder as QueryBuilder;
use Coreproc\Procurement\Database\Eloquent\Builder as ProcurementBuilder;

class Model extends EloquentModel
{

    /**
     * Overrides the querybuilder
     *
     * @return \Coreproc\Procurement\Database\Query\Builder
     */
    protected function newBaseQueryBuilder()
    {
        $conn = $this->getConnection();

        $grammar = $conn->getQueryGrammar();

        return new QueryBuilder($conn, $grammar, $conn->getPostProcessor());
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  QueryBuilder $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new ProcurementBuilder($query);
    }

}