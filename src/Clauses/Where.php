<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Traits\IsDynamicWhereClause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class Where extends Clause
{
    use IsDynamicWhereClause;

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'where%1$s(?string $operator = null, ?string $value = null) Add a "where" clause on the "%2$s" column to the query.';
}
