<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Traits\IsDynamicWhereNotInClause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class WhereNotIn extends Clause
{
    use IsDynamicWhereNotInClause;

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'where%1$sNotIn(array $values) Add a "where not in" clause on the "%2$s" column to the query.';
}
