<?php

namespace Bjnstnkvc\BuilderMakeCommand\Concerns;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait BuildsDynamicWhereQueries
{
    /**
     * The methods that can be dynamically called.
     *
     * @var array
     */
    private static array $methods = [
        'dynamicWhere',
        'dynamicWhereIn',
        'dynamicWhereNotIn',
        'dynamicOrWhere',
        'dynamicOrWhereIn',
        'dynamicOrWhereNotIn',
    ];

    /**
     * Dynamically handle calls into the query instance.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $dynamicMethod = $this->getDynamicMethod($method);

        if (in_array($dynamicMethod, self::$methods)) {
            return $this->{$dynamicMethod}($method, $parameters);
        }

        return parent::__call($method, $parameters);
    }

    /**
     * Handles dynamic "or where" clauses to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicWhere(string $method, array $parameters): static
    {
        $column   = $this->getQueryColumn($method, 'Where');
        $operator = $this->getQueryOperator($parameters);
        $value    = $this->getQueryValue($parameters);

        return $this->where($column, $operator, $value);
    }

    /**
     * Handles dynamic "where in" clauses to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicWhereIn(string $method, array $parameters): static
    {
        $column = $this->getQueryColumn($method, 'Where', 'In');
        $values = Arr::flatten($parameters);

        return $this->whereIn($column, $values);
    }

    /**
     * Handles dynamic "where not in" clauses to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicWhereNotIn(string $method, array $parameters): static
    {
        $column = $this->getQueryColumn($method, 'Where', 'NotIn');
        $values = Arr::flatten($parameters);

        return $this->whereNotIn($column, $values);
    }

    /**
     * Handles dynamic "or where" clauses to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicOrWhere(string $method, array $parameters): static
    {
        $column   = $this->getQueryColumn($method, 'OrWhere');
        $operator = $this->getQueryOperator($parameters);
        $value    = $this->getQueryValue($parameters);

        return $this->orWhere($column, $operator, $value);
    }

    /**
     * Handles dynamic "or where in" clauses to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicOrWhereIn(string $method, array $parameters): static
    {
        $column = $this->getQueryColumn($method, 'OrWhere', 'In');
        $values = Arr::flatten($parameters);

        return $this->orWhereIn($column, $values);
    }

    /**
     * Handles dynamic "or where not in" clauses to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicOrWhereNotIn(string $method, array $parameters): static
    {
        $column = $this->getQueryColumn($method, 'OrWhere', 'NotIn');
        $values = Arr::flatten($parameters);

        return $this->orWhereNotIn($column, $values);
    }

    /**
     * Retrieve the dynamic method for the builder.
     *
     * @param string $method
     *
     * @return string
     */
    protected function getDynamicMethod(string $method): string
    {
        if ($method !== 'where' && Str::startsWith($method, 'where') && !Str::endsWith($method, 'In') && !Str::endsWith($method, 'NotIn')) {
            $method = 'dynamicWhere';
        }

        if ($method !== 'whereIn' && Str::startsWith($method, 'where') && Str::endsWith($method, 'In') && !Str::endsWith($method, 'NotIn')) {
            $method = 'dynamicWhereIn';
        }

        if ($method !== 'whereNotIn' && Str::startsWith($method, 'where') && Str::endsWith($method, 'NotIn')) {
            $method = 'dynamicWhereNotIn';
        }

        if ($method !== 'orWhere' && Str::startsWith($method, 'orWhere') && !Str::endsWith($method, 'In') && !Str::endsWith($method, 'NotIn')) {
            $method = 'dynamicOrWhere';
        }

        if ($method !== 'orWhereIn' && Str::startsWith($method, 'orWhere') && Str::endsWith($method, 'In') && !Str::endsWith($method, 'NotIn')) {
            $method = 'dynamicOrWhereIn';
        }

        if ($method !== 'orWhereNotIn' && Str::startsWith($method, 'orWhere') && Str::endsWith($method, 'NotIn')) {
            $method = 'dynamicOrWhereNotIn';
        }

        return $method;
    }

    /**
     * Retrieve the column from the given method call.
     *
     * @param string      $method
     * @param string      $from
     * @param string|null $to
     *
     * @return string
     */
    private function getQueryColumn(string $method, string $from, ?string $to = null): string
    {
        return Str::of($method)
            ->substr(Str::length($from))
            ->substr(0, $to ? -Str::length($to) : null)
            ->ucsplit()
            ->map(fn(string $word) => Str::lower($word))
            ->implode('_');
    }

    /**
     * Retrieve the operator from the given parameters.
     *
     * @param array $parameters
     *
     * @return string
     */
    private function getQueryOperator(array $parameters): string
    {
        return count($parameters) === 2 ? $parameters[0] : '=';
    }

    /**
     * Retrieve the value from the given parameters.
     *
     * @param array $parameters
     *
     * @return array|string
     */
    private function getQueryValue(array $parameters): array|string
    {
        return count($parameters) === 1 ? $parameters[0] : $parameters[1];
    }
}
