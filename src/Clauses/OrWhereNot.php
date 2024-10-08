<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Traits\IsDynamicWhereNotClause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class OrWhereNot extends Clause
{
    use IsDynamicWhereNotClause;

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'orWhere%1$sNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "%2$s" column to the query.';
}
