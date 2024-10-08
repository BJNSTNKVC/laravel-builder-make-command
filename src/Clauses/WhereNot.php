<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Traits\IsDynamicWhereNotClause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class WhereNot extends Clause
{
    use IsDynamicWhereNotClause;

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'where%1$sNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "%2$s" column to the query.';
}
