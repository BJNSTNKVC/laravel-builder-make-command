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
     * The parameters for the clause.
     *
     * @var array
     */
    protected array $parameters = [
        'operator' => ['type' => 'mixed', 'value' => null],
        'value'    => ['type' => 'mixed', 'value' => null],
    ];

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'orWhere%1$s(%2$s) Add an "or where" clause on the "%3$s" column to the query.';

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
