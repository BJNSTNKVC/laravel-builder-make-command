<?php

namespace Bjnstnkvc\BuilderMakeCommand\Tests\Unit;

use ArgumentCountError;
use BadMethodCallException;
use Bjnstnkvc\BuilderMakeCommand\Abstracts\Clause;
use Bjnstnkvc\BuilderMakeCommand\Tests\TestCase;
use TypeError;

class ClauseTest extends TestCase
{
    public function test_that_the_column_property_has_to_be_set_on_the_clause(): void
    {
        $this->expectException(ArgumentCountError::class);

        InvalidClause::make();
    }

    public function test_that_the_column_property_has_to_be_a_string(): void
    {
        $this->expectException(TypeError::class);

        InvalidClause::make(null);
    }

    public function test_that_the_signature_property_has_to_be_set_on_the_clause(): void
    {
        $this->expectException(BadMethodCallException::class);

        InvalidClause::make('column')->signature();
    }

    public function test_that_the_clause_generates_a_valid_signature(): void
    {
        $column = 'column';
        $method = 'Column';

        $signature = ValidClause::make($column)->signature();

        $this->assertSame(
            expected: " * @method static Method: $method Parameters: ?string \$operator = null Column: $column.\n * @method self Method: $method Parameters: ?string \$operator = null Column: $column.",
            actual  : $signature,
            message : 'The clause signature is not generated correctly.'
        );
    }

    public function test_that_the_clause_correctly_identifies_dynamic_where_methods(): void
    {
        $this->assertTrue(ValidClause::is('valid'));
        $this->assertFalse(InvalidClause::is('valid'));
    }
}

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class ValidClause extends Clause
{
    /**
     * The parameters for the clause.
     */
    protected array $parameters = [
        'operator' => ['type' => '?string', 'value' => null],
    ];

    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature = 'Method: %1$s Parameters: %2$s Column: %3$s.';

    /**
     * Determine if the clause is the given method.
     *
     * @param string $method
     *
     * @return bool
     */
    public static function is(string $method): bool
    {
        return $method === 'valid';
    }
}

/**
 * @method static static make(string $column) Make a new clause instance.
 */
class InvalidClause extends Clause
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
        return $method === 'invalid';
    }
}
