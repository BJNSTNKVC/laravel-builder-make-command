<?php

namespace App\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class ValidClause extends Clause
{
    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'Method: "%1$s" Column: "%2$s".';

    /**
     * Determine if the clause is the given method.
     *
     * @param string $method
     *
     * @return bool
     */
    public static function is(string $method): bool
    {
        return $method === 'valid';
    }
}
