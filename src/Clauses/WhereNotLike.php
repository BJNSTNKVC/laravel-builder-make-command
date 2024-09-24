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
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'where%1$sNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "%2$s" column to the query.';
}
