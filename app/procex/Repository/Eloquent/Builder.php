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
    public function __construct(ProcurementEloquentBuilder $query) {
        $this->query = $query;
    }

    public function getModels($columns = array('*')) {
        // First, we will simply get the raw results from the query builders which we
        // can use to populate an array with Eloquent models. We will pass columns
        // that should be selected as well, which are typically just everything.
        $results = $this->query->get($columns);

        $connection = $this->model->getConnectionName();

        $models = array();

        // Once we have the results, we can spin through them and instantiate a fresh
        // model instance for each records we retrieved from the database. We will
        // also set the proper connection name for the model after we create it.

        foreach ($results as $result) {
            $models[] = $model = $this->model->newFromBuilder($result);

            $model->setConnection($connection);
        }

        return $models;
    }
}
