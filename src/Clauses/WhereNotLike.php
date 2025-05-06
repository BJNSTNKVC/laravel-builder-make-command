<?php

namespace Bjnstnkvc\BuilderMakeCommand\Clauses;

use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Traits\IsDynamicWhereNotLikeClause;

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class WhereNotLike extends Clause
{
    use IsDynamicWhereNotLikeClause;

    /**
     * The parameters for the clause.
     *
     * @var array
     */
    protected array $parameters = [
        'value'         => ['type' => 'string'],
        'caseSensitive' => ['type' => 'bool', 'value' => false],
        'boolean'       => ['type' => 'string', 'value' => 'and'],
        'not'           => ['type' => 'bool', 'value' => false],
    ];

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'where%1$sNotLike(%2$s)';
}
