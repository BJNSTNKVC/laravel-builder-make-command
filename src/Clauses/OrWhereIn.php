<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Traits\IsDynamicWhereInClause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class OrWhereIn extends Clause
{
    use IsDynamicWhereInClause;

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
    protected string $signature = 'orWhere%1$sIn(%2$s) Add an "or where in" clause on the "%3$s" column to the query.';
}
