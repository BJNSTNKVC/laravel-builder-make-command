<?php

namespace Bjnstnkvc\BuilderMakeCommand\Traits;

use Illuminate\Support\Str;

trait IsDynamicWhereClause
{
    /**
     * Determine if the clause is the given method.
     *
     * @param string $method
     *
     * @return bool
     */
    public static function is(string $method): bool
    {
        return !Str::endsWith($method, ['Not', 'In', 'NotIn', 'Like']);
    }
}