<?php

namespace Bjnstnkvc\BuilderMakeCommand\Concerns;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait BuildsDynamicWhereQueries
{
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
		if ($this->getDynamicMethod($method) === 'dynamicWhere') {
			return $this->dynamicWhere($method, $parameters);
		}

		if ($this->getDynamicMethod($method) === 'dynamicWhereIn') {
			return $this->dynamicWhereIn($method, $parameters);
		}

		if ($this->getDynamicMethod($method) === 'dynamicWhereNotIn') {
			return $this->dynamicWhereNotIn($method, $parameters);
		}

		if ($this->getDynamicMethod($method) === 'dynamicOrWhere') {
			return $this->dynamicOrWhere($method, $parameters);
		}

		if ($this->getDynamicMethod($method) === 'dynamicOrWhereIn') {
			return $this->dynamicOrWhereIn($method, $parameters);
		}

		if ($this->getDynamicMethod($method) === 'dynamicOrWhereNotIn') {
			return $this->dynamicOrWhereNotIn($method, $parameters);
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
			return 'dynamicWhere';
		}

		if ($method !== 'whereIn' && Str::startsWith($method, 'where') && Str::endsWith($method, 'In') && !Str::endsWith($method, 'NotIn')) {
			return 'dynamicWhereIn';
		}

		if ($method !== 'whereNotIn' && Str::startsWith($method, 'where') && Str::endsWith($method, 'NotIn')) {
			return 'dynamicWhereNotIn';
		}

		if ($method !== 'orWhere' && Str::startsWith($method, 'orWhere') && !Str::endsWith($method, 'In') && !Str::endsWith($method, 'NotIn')) {
			return 'dynamicOrWhere';
		}

		if ($method !== 'orWhereIn' && Str::startsWith($method, 'orWhere') && Str::endsWith($method, 'In') && !Str::endsWith($method, 'NotIn')) {
			return 'dynamicOrWhereIn';
		}

		if ($method !== 'orWhereNotIn' && Str::startsWith($method, 'orWhere') && Str::endsWith($method, 'NotIn')) {
			return 'dynamicOrWhereNotIn';
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
	protected function getQueryColumn(string $method, string $from, ?string $to = null): string
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
	protected function getQueryOperator(array $parameters): string
	{
		return count($parameters) === 2 ? reset($parameters) : '=';
	}

	/**
	 * Retrieve the value from the given parameters.
	 *
	 * @param array $parameters
	 *
	 * @return array|string
	 */
	protected function getQueryValue(array $parameters): array|string
	{
		return count($parameters) === 1 ? reset($parameters) : end($parameters);
	}
}
