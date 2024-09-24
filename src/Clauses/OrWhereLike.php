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
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'orWhere%1$sLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "%2$s" column to the query.';
}
