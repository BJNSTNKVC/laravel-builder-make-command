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
		if ($this->getDynamicMethod($method) === 'where') {
			return $this->dynamicWhere($method, $parameters);
		}

		if ($this->getDynamicMethod($method) === 'whereIn') {
			return $this->dynamicWhereIn($method, $parameters);
		}

		if ($this->getDynamicMethod($method) === 'whereNotIn') {
			return $this->dynamicWhereNotIn($method, $parameters);
		}

		if ($this->getDynamicMethod($method) === 'orWhere') {
			return $this->dynamicOrWhere($method, $parameters);
		}

		if ($this->getDynamicMethod($method) === 'orWhereIn') {
			return $this->dynamicOrWhereIn($method, $parameters);
		}

		if ($this->getDynamicMethod($method) === 'orWhereNotIn') {
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
		$column = Str::of($method)
			->substr(5)
			->ucsplit()
			->map(fn(string $word) => strtolower($word))
			->implode('_');

		$operator = count($parameters) === 2 ? reset($parameters) : '=';
		$value    = count($parameters) === 1 ? reset($parameters) : end($parameters);

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
		$column = Str::of($method)
			->substr(5)
			->substr(0, -2)
			->ucsplit()
			->map(fn(string $word) => strtolower($word))
			->implode('_');

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
		$column = Str::of($method)
			->substr(5)
			->substr(0, -5)
			->ucsplit()
			->map(fn(string $word) => strtolower($word))
			->implode('_');

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
		$column = Str::of($method)
			->substr(7)
			->ucsplit()
			->map(fn(string $word) => strtolower($word))
			->implode('_');

		$operator = count($parameters) === 2 ? reset($parameters) : '=';
		$value    = count($parameters) === 1 ? reset($parameters) : end($parameters);

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
		$column = Str::of($method)
			->substr(7)
			->substr(0, -2)
			->ucsplit()
			->map(fn(string $word) => strtolower($word))
			->implode('_');

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
		$column = Str::of($method)
			->substr(7)
			->substr(0, -5)
			->ucsplit()
			->map(fn(string $word) => strtolower($word))
			->implode('_');

		$values = Arr::flatten($parameters);

		return $this->orWhereNotIn($column, $values);
	}

	/**
	 * Retrieve the dynamic method for the builder, return false otherwise.
	 *
	 * @param string $method
	 *
	 * @return string|bool
	 */
	protected function getDynamicMethod(string $method): string|bool
	{
		if ($method !== 'where' && str_starts_with($method, 'where') && !str_ends_with($method, 'In') && !str_ends_with($method, 'NotIn')) {
			return 'where';
		}

		if ($method !== 'whereIn' && str_starts_with($method, 'where') && str_ends_with($method, 'In') && !str_ends_with($method, 'NotIn')) {
			return 'whereIn';
		}

		if ($method !== 'whereNotIn' && str_starts_with($method, 'where') && str_ends_with($method, 'NotIn')) {
			return 'whereNotIn';
		}

		if ($method !== 'orWhere' && str_starts_with($method, 'orWhere') && !str_ends_with($method, 'In') && !str_ends_with($method, 'NotIn')) {
			return 'orWhere';
		}

		if ($method !== 'orWhereIn' && str_starts_with($method, 'orWhere') && str_ends_with($method, 'In') && !str_ends_with($method, 'NotIn')) {
			return 'orWhereIn';
		}

		if ($method !== 'orWhereNotIn' && str_starts_with($method, 'orWhere') && str_ends_with($method, 'NotIn')) {
			return 'orWhereNotIn';
		}

		return false;
	}
}
