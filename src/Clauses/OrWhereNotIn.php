<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Traits\IsDynamicWhereNotInClause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class OrWhereNotIn extends Clause
{
    use IsDynamicWhereNotInClause;

    /**
     * The parameters for the clause.
     *
     * @var array
     */
    protected array $parameters = [
        'values' => ['type' => 'array'],
    ];

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'orWhere%1$sNotIn(%2$s) Add a "where not in" clause on the "%3$s" column to the query.';
}
