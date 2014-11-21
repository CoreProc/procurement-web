<?php

namespace Coreproc\Procurement\Database\Query;

use \Illuminate\Database\Query\Builder as EloquentBuilder;

class Builder extends EloquentBuilder
{

    /**
     * Overrides the select
     *
     * @return array
     */
    protected function runSelect()
    {
        //dd($this->getBindings());
        //dd($this->toSql());

        $statement = $this->toSql();
        $values = $this->getBindings();

        foreach ($values as $v) {
            $pos = strpos($statement, '?');
            if ($pos !== false) {
                if (is_string($v)) $v = '\'' . addslashes($v) . '\'';
                $statement = substr_replace($statement, $v, $pos, strlen(1));
            }
        }

        dd($statement);

        //return $this->connection->select($this->toSql(), $this->getBindings());
    }

    /**
     * Get a new instance of the query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function newQuery()
    {
        return new Builder($this->connection, $this->grammar, $this->processor);
    }

}