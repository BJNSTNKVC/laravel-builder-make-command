<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class OrWhere extends Clause
{
    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'orWhere%1$s(?string $operator = null, ?string $value = null) Add an "or where" clause on the "%2$s" column to the query.';
}
