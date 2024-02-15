<?php

namespace Bjnstnkvc\BuilderMakeCommand\Enums;

enum Clause: string
{
    case WHERE           = 'where';
    case WHERE_IN        = 'whereIn';
    case WHERE_NOT_IN    = 'whereNotIn';
    case OR_WHERE        = 'orWhere';
    case OR_WHERE_IN     = 'orWhereIn';
    case OR_WHERE_NOT_IN = 'orWhereNotIn';

    /**
     * Get the method signature for the clause.
     *
     * @param string $method
     * @param string $column
     *
     * @return string
     */
    public function toMethodSignature(string $method, string $column): string
    {
        $signature = match ($this) {
            self::WHERE           => 'where%1$s(?string $operator = null, ?string $value = null) Add a "where" clause on the "%2$s" column to the query.',
            self::WHERE_IN        => 'where%1$sIn(array $values) Add a "where in" clause on the "%2$s" column to the query.',
            self::WHERE_NOT_IN    => 'where%1$sNotIn(array $values) Add a "where not in" clause on the "%2$s" column to the query.',
            self::OR_WHERE        => 'orWhere%1$s(?string $operator = null, ?string $value = null) Add an "or where" clause on the "%2$s" column to the query.',
            self::OR_WHERE_IN     => 'orWhere%1$sIn(array $values) Add an "or where in" clause on the "%2$s" column to the query.',
            self::OR_WHERE_NOT_IN => 'orWhere%1$sNotIn(array $values) Add a "where not in" clause on the "%2$s" column to the query.',
        };

        $message =
            " * @method static DummyClass " . $signature . PHP_EOL .
            " * @method DummyClass " . $signature . PHP_EOL;

        return sprintf($message, $method, $column);
    }
}
