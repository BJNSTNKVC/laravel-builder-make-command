<?php

namespace Bjnstnkvc\BuilderMakeCommand\Concerns;

use Bjnstnkvc\BuilderMakeCommand\Clauses\{Where, WhereIn, WhereLike, WhereNot, WhereNotIn, WhereNotLike};
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
        'dynamicWhereLike',
        'dynamicWhereNotLike',
        'dynamicOrWhere',
        'dynamicOrWhereNot',
        'dynamicOrWhereIn',
        'dynamicOrWhereNotIn',
        'dynamicOrWhereLike',
        'dynamicOrWhereNotLike',
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

        if ($this->isDynamicMethod($call)) {
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
        if (!$this->isNativeMethod($method) && Str::startsWith($method, ['where', 'orWhere'])) {
            return $this->resolveMethodName($method);
        }

        return $method;
    }

    /**
     * Determine which dynamic "where" method should be called.
     *
     * @param string $method
     *
     * @return string
     */
    private function resolveMethodName(string $method): string
    {
        return match (true) {
            Where::is($method)        => Where::clause($method),
            WhereNot::is($method)     => WhereNot::clause($method),
            WhereIn::is($method)      => WhereIn::clause($method),
            WhereNotIn::is($method)   => WhereNotIn::clause($method),
            WhereLike::is($method)    => WhereLike::clause($method),
            WhereNotLike::is($method) => WhereNotLike::clause($method),
            default                   => $method,
        };
    }

    /**
     * Determine if the method can be called dynamically.
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
        $column = $this->getQueryColumn($method, 'Where');

        return $this->where($column, ...$parameters);
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
        $column = $this->getQueryColumn($method, 'Where', 'Not');

        return $this->whereNot($column, ...$parameters);
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

        return $this->whereIn($column, ...$parameters);
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

        return $this->whereNotIn($column, ...$parameters);
    }

    /**
     * Add dynamic "where like" clause to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicWhereLike(string $method, array $parameters): static
    {
        $column = $this->getQueryColumn($method, 'Where', 'Like');

        return $this->whereLike($column, ...$parameters);
    }

    /**
     * Add dynamic "where not like" clause to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicWhereNotLike(string $method, array $parameters): static
    {
        $column = $this->getQueryColumn($method, 'Where', 'NotLike');

        return $this->whereNotLike($column, ...$parameters);
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
        $column = $this->getQueryColumn($method, 'OrWhere');

        return $this->orWhere($column, ...$parameters);
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
        $column = $this->getQueryColumn($method, 'OrWhere', 'Not');

        return $this->orWhereNot($column, ...$parameters);
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

        return $this->orWhereIn($column, ...$parameters);
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

        return $this->orWhereNotIn($column, ...$parameters);
    }

    /**
     * Add dynamic "or where" clause to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicOrWhereLike(string $method, array $parameters): static
    {
        $column = $this->getQueryColumn($method, 'OrWhere', 'Like');

        return $this->orWhereLike($column, ...$parameters);
    }

    /**
     * Add dynamic "or where not" clause to the query.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return static
     */
    protected function dynamicOrWhereNotLike(string $method, array $parameters): static
    {
        $column = $this->getQueryColumn($method, 'OrWhere', 'NotLike');

        return $this->orWhereNotLike($column, ...$parameters);
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
}
