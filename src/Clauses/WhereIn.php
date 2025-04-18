<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Traits\IsDynamicWhereInClause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class WhereIn extends Clause
{
    use IsDynamicWhereInClause;

    /**
     * The parameters for the clause.
     *
     * @var array
     */
    protected array $parameters = [
        'values'  => ['type' => 'array'],
        'boolean' => ['type' => 'string', 'value' => 'and'],
        'not'     => ['type' => 'bool', 'value' => false],
    ];

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'where%1$sIn(%2$s) Add a "where in" clause on the "%3$s" column to the query.';
}
