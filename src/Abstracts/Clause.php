<?php

namespace Bjnstnkvc\BuilderMakeCommand\Abstracts;

use Illuminate\Support\Str;
use LogicException;

abstract class Clause
{
    /**
     * The method signature for the clause.
     *
     * @var string
     */
    protected string $signature;

    /**
     * The column for the clause.
     *
     * @var string
     */
    private string $column;

    /**
     * The method for the clause.
     *
     * @var string
     */
    private string $method;

    /**
     * Create a new clause instance.
     *
     * @param string $column
     */
    public function __construct(string $column)
    {
        $this->column = $column;
        $this->method = Str::studly($this->column);
    }

    /**
     * Make a new clause instance.
     *
     * @param string $column
     *
     * @return static
     */
    public static function make(string $column): static
    {
        return new static($column);
    }

    /**
     * Set the method signature for the clause.
     *
     * @return string
     */
    public function signature(): string
    {
        if (!isset($this->signature)) {
            throw new LogicException('The "signature" property is not set on the clause.');
        }

        $message = " * @method static $this->signature\n * @method {{ class }} $this->signature";

        return sprintf($message, $this->method, $this->column);
    }
}
