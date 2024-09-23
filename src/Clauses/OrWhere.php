<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Traits\IsDynamicWhereClause;
use Illuminate\Support\Str;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class OrWhere extends Clause
{
    use IsDynamicWhereClause;

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'orWhere%1$s(?string $operator = null, ?string $value = null) Add an "or where" clause on the "%2$s" column to the query.';

    /**
     * Determine if the clause is the given method.
     *
     * @param string $method
     *
     * @return bool
     */
    public static function is(string $method): bool
    {
        return !Str::endsWith($method, ['Not', 'In', 'NotIn', 'Like']);
    }
}
