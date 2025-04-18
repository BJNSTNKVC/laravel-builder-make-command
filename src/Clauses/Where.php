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
     * The parameters for the clause.
     *
     * @var array
     */
    protected array $parameters = [
        'operator' => ['type' => 'mixed', 'value' => null],
        'value'    => ['type' => 'mixed', 'value' => null],
        'boolean'  => ['type' => 'string', 'value' => 'and'],
    ];

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'where%1$s(%2$s) Add a "where" clause on the "%3$s" column to the query.';
}
