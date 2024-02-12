<?php

namespace Bjnstnkvc\BuilderMakeCommand\Abstracts;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

abstract class Builder extends EloquentBuilder
{
	/**
	 * Create a new Eloquent query builder instance.
	 *
	 * @param QueryBuilder $query
	 *
	 * @return void
	 */
	public function __construct(QueryBuilder $query)
	{
		parent::__construct($query);
	}
}
