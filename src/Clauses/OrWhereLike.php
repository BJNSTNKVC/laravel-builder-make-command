<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Traits\IsDynamicWhereLikeClause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class OrWhereLike extends Clause
{
    use IsDynamicWhereLikeClause;

    /**
     * The parameters for the clause.
     *
     * @var array
     */
    protected array $parameters = [
        'value'         => ['type' => 'string'],
        'caseSensitive' => ['type' => 'bool', 'value' => false],
    ];

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'orWhere%1$sLike(%2$s)';
}
