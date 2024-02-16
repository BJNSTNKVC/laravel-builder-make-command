<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class WhereIn extends Clause
{
    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'where%1$sIn(array $values) Add a "where in" clause on the "%2$s" column to the query.';
}
