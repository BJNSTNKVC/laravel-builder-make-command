<?php

namespace Bjnstnkvc\BuilderMakeCommand\Tests\Unit;

use App\Clauses\InvalidClause;
use App\Clauses\ValidClause;
use ArgumentCountError;
use BadMethodCallException;
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
        $column    = 'column';
        $method    = 'Column';
        $signature = ValidClause::make($column)->signature();

        $this->assertSame(
            expected: " * @method static Method: \"$method\" Column: \"$column\".\n * @method {{ class }} Method: \"$method\" Column: \"$column\".",
            actual  : $signature,
            message : 'The clause signature is not generated correctly.'
        );
    }
}
