<?php

namespace Bjnstnkvc\BuilderMakeCommand\Concerns;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ReflectionClass;

trait BuildsDynamicWhereQueries
{
    /**
     * The methods that can be dynamically called.
     *
     * @var array
     */
    private static array $methods = [
        'dynamicWhere',
        'dynamicWhereNot',
        'dynamicWhereIn',
        'dynamicWhereNotIn',
        'dynamicOrWhere',
        'dynamicOrWhereNot',
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
        $call = $this->getDynamicMethod($method);

        if ($this->isDynamicMethod($call) && !$this->isNativeMethod($call)) {
            return $this->{$call}($method, $parameters);
        }

        return parent::__call($method, $parameters);
    }

    /**
     * Retrieve the dynamic method for the builder.
     *
     * @param string $method
     *
     * @return string
     */
    private function getDynamicMethod(string $method): string
    {
        if (Str::startsWith($method, 'where')) {
            return $this->handleWhereMethods($method);
        }

        if (Str::startsWith($method, 'orWhere')) {
            return $this->handleOrWhereMethods($method);
        }

        return $method;
    }

    /**
     * Determine which dynamic "where" method should be used.
     *
     * @param string $method
     *
     * @return string
     */
    private function handleWhereMethods(string $method): string
    {
        if (!Str::endsWith($method, ['Not', 'In', 'NotIn'])) {
            $method = 'dynamicWhere';
        }

        if (Str::endsWith($method, 'Not')) {
            $method = 'dynamicWhereNot';
        }

        if (Str::endsWith($method, 'In') && !Str::endsWith($method, 'NotIn') && !$this->isNativeMethod($method)) {
            $method = 'dynamicWhereIn';
        }

        if (Str::endsWith($method, 'NotIn') && !$this->isNativeMethod($method)) {
            $method = 'dynamicWhereNotIn';
        }

        return $method;
    }

    /**
     * Determine which dynamic "or where" method should be used.
     *
     * @param string $method
     *
     * @return string
     */
    private function handleOrWhereMethods(string $method): string
    {
        if (!Str::endsWith($method, ['Not', 'In', 'NotIn'])) {
            $method = 'dynamicOrWhere';
        }

        if (Str::endsWith($method, 'Not')) {
            $method = 'dynamicOrWhereNot';
        }

        if (Str::endsWith($method, 'In') && !Str::endsWith($method, 'NotIn') && !$this->isNativeMethod($method)) {
            $method = 'dynamicOrWhereIn';
        }

        if (Str::endsWith($method, 'NotIn') && !$this->isNativeMethod($method)) {
            $method = 'dynamicOrWhereNotIn';
        }

        return $method;
    }

    /**
     * Determine if the method can b called dynamically.
     *
     * @param string $method
     *
     * @return bool
     */
    private function isDynamicMethod(string $method): bool
    {
        return in_array($method, self::$methods);
    }

    /**
     * Determine if the method is a native Eloquent or Query builder method.
     *
     * @param string $method
     *
     * @return bool
     */
    private function isNativeMethod(string $method): bool
    {
        return in_array($method, $this->getBuilderMethods());
    }

    /**
     * Retrieve the methods from the Eloquent and Query builder.
     *
     * @return array
     */
    private function getBuilderMethods(): array
    {
        $eloquent = new ReflectionClass(EloquentBuilder::class);
        $query    = new ReflectionClass(QueryBuilder::class);
        $methods  = [...$eloquent->getMethods(), ...$query->getMethods()];

        return Collection::make($methods)
            ->pluck('name')
            ->unique()
            ->reject(fn(string $value) => $value === 'dynamicWhere')
            ->toArray();
    }

    /**
     * Add dynamic "where" clause to the query.
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
     * Add dynamic "where not" clause to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicWhereNot(string $method, array $parameters): static
    {
        $column   = $this->getQueryColumn($method, 'Where', 'Not');
        $operator = $this->getQueryOperator($parameters);
        $value    = $this->getQueryValue($parameters);

        return $this->whereNot($column, $operator, $value);
    }

    /**
     * Add dynamic "where in" clause to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicWhereIn(string $method, array $parameters): static
    {
        $column = $this->getQueryColumn($method, 'Where', 'In');
        $values = $this->getQueryValue($parameters);

        return $this->whereIn($column, $values);
    }

    /**
     * Add dynamic "where not in" clause to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicWhereNotIn(string $method, array $parameters): static
    {
        $column = $this->getQueryColumn($method, 'Where', 'NotIn');
        $values = $this->getQueryValue($parameters);

        return $this->whereNotIn($column, $values);
    }

    /**
     * Add dynamic "or where" clause to the query.
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
     * Add dynamic "or where not" clause to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicOrWhereNot(string $method, array $parameters): static
    {
        $column   = $this->getQueryColumn($method, 'OrWhere', 'Not');
        $operator = $this->getQueryOperator($parameters);
        $value    = $this->getQueryValue($parameters);

        return $this->orWhereNot($column, $operator, $value);
    }

    /**
     * Add dynamic "or where in" clause to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicOrWhereIn(string $method, array $parameters): static
    {
        $column = $this->getQueryColumn($method, 'OrWhere', 'In');
        $values = $this->getQueryValue($parameters);

        return $this->orWhereIn($column, $values);
    }

    /**
     * Add dynamic "or where not in" clause to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicOrWhereNotIn(string $method, array $parameters): static
    {
        $column = $this->getQueryColumn($method, 'OrWhere', 'NotIn');
        $values = $this->getQueryValue($parameters);

        return $this->orWhereNotIn($column, $values);
    }

    /**
     * Retrieve the column from the given method call.
     *
     * @param string  $method
     * @param string  $from
     * @param ?string $to
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
     * @return array|float|int|string
     */
    private function getQueryValue(array $parameters): array|float|int|string
    {
        return count($parameters) === 1 ? $parameters[0] : $parameters[1];
    }
}
