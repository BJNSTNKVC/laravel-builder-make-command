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
    protected string $signature = 'orWhere%1$sNot(%2$s)';
}
