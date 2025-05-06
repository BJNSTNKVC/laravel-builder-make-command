<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Traits\IsDynamicWhereNotInClause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class WhereNotIn extends Clause
{
    use IsDynamicWhereNotInClause;

    /**
     * The parameters for the clause.
     *
     * @var array
     */
    protected array $parameters = [
        'values'  => ['type' => 'array'],
        'boolean' => ['type' => 'string', 'value' => 'and'],
    ];

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'where%1$sNotIn(%2$s)';
}
