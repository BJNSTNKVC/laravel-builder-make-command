<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Traits\IsDynamicWhereInClause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class WhereIn extends Clause
{
    use IsDynamicWhereInClause;

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'where%1$sIn(array $values, string $boolean = \'and\') Add a "where in" clause on the "%2$s" column to the query.';
}
