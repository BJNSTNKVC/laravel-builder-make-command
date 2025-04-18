<?php

namespace App\Models\Builders;

use Bjnstnkvc\BuilderMakeCommand\Concerns\BuildsDynamicWhereQueries;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method self whereId(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "id" column to the query.
 * @method static self whereId(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "id" column to the query.
 * @method self whereIdNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "id" column to the query.
 * @method static self whereIdNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "id" column to the query.
 * @method self whereIdIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "id" column to the query.
 * @method static self whereIdIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "id" column to the query.
 * @method self whereIdNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "id" column to the query.
 * @method static self whereIdNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "id" column to the query.
 * @method self whereIdLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "id" column to the query.
 * @method static self whereIdLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "id" column to the query.
 * @method self whereIdNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "id" column to the query.
 * @method static self whereIdNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "id" column to the query.
 * @method self orWhereId(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "id" column to the query.
 * @method static self orWhereId(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "id" column to the query.
 * @method self orWhereIdNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "id" column to the query.
 * @method static self orWhereIdNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "id" column to the query.
 * @method self orWhereIdIn(array $values) Add an "or where in" clause on the "id" column to the query.
 * @method static self orWhereIdIn(array $values) Add an "or where in" clause on the "id" column to the query.
 * @method self orWhereIdNotIn(array $values) Add a "where not in" clause on the "id" column to the query.
 * @method static self orWhereIdNotIn(array $values) Add a "where not in" clause on the "id" column to the query.
 * @method self orWhereIdLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "id" column to the query.
 * @method static self orWhereIdLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "id" column to the query.
 * @method self orWhereIdNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "id" column to the query.
 * @method static self orWhereIdNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "id" column to the query.
 * @method self whereName(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "name" column to the query.
 * @method static self whereName(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "name" column to the query.
 * @method self whereNameNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "name" column to the query.
 * @method static self whereNameNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "name" column to the query.
 * @method self whereNameIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "name" column to the query.
 * @method static self whereNameIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "name" column to the query.
 * @method self whereNameNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "name" column to the query.
 * @method static self whereNameNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "name" column to the query.
 * @method self whereNameLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "name" column to the query.
 * @method static self whereNameLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "name" column to the query.
 * @method self whereNameNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "name" column to the query.
 * @method static self whereNameNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "name" column to the query.
 * @method self orWhereName(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "name" column to the query.
 * @method static self orWhereName(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "name" column to the query.
 * @method self orWhereNameNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "name" column to the query.
 * @method static self orWhereNameNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "name" column to the query.
 * @method self orWhereNameIn(array $values) Add an "or where in" clause on the "name" column to the query.
 * @method static self orWhereNameIn(array $values) Add an "or where in" clause on the "name" column to the query.
 * @method self orWhereNameNotIn(array $values) Add a "where not in" clause on the "name" column to the query.
 * @method static self orWhereNameNotIn(array $values) Add a "where not in" clause on the "name" column to the query.
 * @method self orWhereNameLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "name" column to the query.
 * @method static self orWhereNameLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "name" column to the query.
 * @method self orWhereNameNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "name" column to the query.
 * @method static self orWhereNameNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "name" column to the query.
 * @method self whereEmail(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "email" column to the query.
 * @method static self whereEmail(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "email" column to the query.
 * @method self whereEmailNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "email" column to the query.
 * @method static self whereEmailNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "email" column to the query.
 * @method self whereEmailIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "email" column to the query.
 * @method static self whereEmailIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "email" column to the query.
 * @method self whereEmailNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "email" column to the query.
 * @method static self whereEmailNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "email" column to the query.
 * @method self whereEmailLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "email" column to the query.
 * @method static self whereEmailLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "email" column to the query.
 * @method self whereEmailNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "email" column to the query.
 * @method static self whereEmailNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "email" column to the query.
 * @method self orWhereEmail(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "email" column to the query.
 * @method static self orWhereEmail(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "email" column to the query.
 * @method self orWhereEmailNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "email" column to the query.
 * @method static self orWhereEmailNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "email" column to the query.
 * @method self orWhereEmailIn(array $values) Add an "or where in" clause on the "email" column to the query.
 * @method static self orWhereEmailIn(array $values) Add an "or where in" clause on the "email" column to the query.
 * @method self orWhereEmailNotIn(array $values) Add a "where not in" clause on the "email" column to the query.
 * @method static self orWhereEmailNotIn(array $values) Add a "where not in" clause on the "email" column to the query.
 * @method self orWhereEmailLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "email" column to the query.
 * @method static self orWhereEmailLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "email" column to the query.
 * @method self orWhereEmailNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "email" column to the query.
 * @method static self orWhereEmailNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "email" column to the query.
 * @method self whereEmailVerifiedAt(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "email_verified_at" column to the query.
 * @method static self whereEmailVerifiedAt(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "email_verified_at" column to the query.
 * @method self whereEmailVerifiedAtNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "email_verified_at" column to the query.
 * @method static self whereEmailVerifiedAtNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "email_verified_at" column to the query.
 * @method self whereEmailVerifiedAtIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "email_verified_at" column to the query.
 * @method static self whereEmailVerifiedAtIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "email_verified_at" column to the query.
 * @method self whereEmailVerifiedAtNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "email_verified_at" column to the query.
 * @method static self whereEmailVerifiedAtNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "email_verified_at" column to the query.
 * @method self whereEmailVerifiedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "email_verified_at" column to the query.
 * @method static self whereEmailVerifiedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "email_verified_at" column to the query.
 * @method self whereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "email_verified_at" column to the query.
 * @method static self whereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "email_verified_at" column to the query.
 * @method self orWhereEmailVerifiedAt(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "email_verified_at" column to the query.
 * @method static self orWhereEmailVerifiedAt(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "email_verified_at" column to the query.
 * @method self orWhereEmailVerifiedAtNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "email_verified_at" column to the query.
 * @method static self orWhereEmailVerifiedAtNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "email_verified_at" column to the query.
 * @method self orWhereEmailVerifiedAtIn(array $values) Add an "or where in" clause on the "email_verified_at" column to the query.
 * @method static self orWhereEmailVerifiedAtIn(array $values) Add an "or where in" clause on the "email_verified_at" column to the query.
 * @method self orWhereEmailVerifiedAtNotIn(array $values) Add a "where not in" clause on the "email_verified_at" column to the query.
 * @method static self orWhereEmailVerifiedAtNotIn(array $values) Add a "where not in" clause on the "email_verified_at" column to the query.
 * @method self orWhereEmailVerifiedAtLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "email_verified_at" column to the query.
 * @method static self orWhereEmailVerifiedAtLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "email_verified_at" column to the query.
 * @method self orWhereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "email_verified_at" column to the query.
 * @method static self orWhereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "email_verified_at" column to the query.
 * @method self wherePassword(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "password" column to the query.
 * @method static self wherePassword(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "password" column to the query.
 * @method self wherePasswordNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "password" column to the query.
 * @method static self wherePasswordNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "password" column to the query.
 * @method self wherePasswordIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "password" column to the query.
 * @method static self wherePasswordIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "password" column to the query.
 * @method self wherePasswordNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "password" column to the query.
 * @method static self wherePasswordNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "password" column to the query.
 * @method self wherePasswordLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "password" column to the query.
 * @method static self wherePasswordLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "password" column to the query.
 * @method self wherePasswordNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "password" column to the query.
 * @method static self wherePasswordNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "password" column to the query.
 * @method self orWherePassword(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "password" column to the query.
 * @method static self orWherePassword(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "password" column to the query.
 * @method self orWherePasswordNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "password" column to the query.
 * @method static self orWherePasswordNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "password" column to the query.
 * @method self orWherePasswordIn(array $values) Add an "or where in" clause on the "password" column to the query.
 * @method static self orWherePasswordIn(array $values) Add an "or where in" clause on the "password" column to the query.
 * @method self orWherePasswordNotIn(array $values) Add a "where not in" clause on the "password" column to the query.
 * @method static self orWherePasswordNotIn(array $values) Add a "where not in" clause on the "password" column to the query.
 * @method self orWherePasswordLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "password" column to the query.
 * @method static self orWherePasswordLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "password" column to the query.
 * @method self orWherePasswordNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "password" column to the query.
 * @method static self orWherePasswordNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "password" column to the query.
 * @method self whereRememberToken(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "remember_token" column to the query.
 * @method static self whereRememberToken(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "remember_token" column to the query.
 * @method self whereRememberTokenNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "remember_token" column to the query.
 * @method static self whereRememberTokenNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "remember_token" column to the query.
 * @method self whereRememberTokenIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "remember_token" column to the query.
 * @method static self whereRememberTokenIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "remember_token" column to the query.
 * @method self whereRememberTokenNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "remember_token" column to the query.
 * @method static self whereRememberTokenNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "remember_token" column to the query.
 * @method self whereRememberTokenLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "remember_token" column to the query.
 * @method static self whereRememberTokenLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "remember_token" column to the query.
 * @method self whereRememberTokenNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "remember_token" column to the query.
 * @method static self whereRememberTokenNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "remember_token" column to the query.
 * @method self orWhereRememberToken(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "remember_token" column to the query.
 * @method static self orWhereRememberToken(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "remember_token" column to the query.
 * @method self orWhereRememberTokenNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "remember_token" column to the query.
 * @method static self orWhereRememberTokenNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "remember_token" column to the query.
 * @method self orWhereRememberTokenIn(array $values) Add an "or where in" clause on the "remember_token" column to the query.
 * @method static self orWhereRememberTokenIn(array $values) Add an "or where in" clause on the "remember_token" column to the query.
 * @method self orWhereRememberTokenNotIn(array $values) Add a "where not in" clause on the "remember_token" column to the query.
 * @method static self orWhereRememberTokenNotIn(array $values) Add a "where not in" clause on the "remember_token" column to the query.
 * @method self orWhereRememberTokenLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "remember_token" column to the query.
 * @method static self orWhereRememberTokenLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "remember_token" column to the query.
 * @method self orWhereRememberTokenNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "remember_token" column to the query.
 * @method static self orWhereRememberTokenNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "remember_token" column to the query.
 * @method self whereCreatedAt(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "created_at" column to the query.
 * @method static self whereCreatedAt(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "created_at" column to the query.
 * @method self whereCreatedAtNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "created_at" column to the query.
 * @method static self whereCreatedAtNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "created_at" column to the query.
 * @method self whereCreatedAtIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "created_at" column to the query.
 * @method static self whereCreatedAtIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "created_at" column to the query.
 * @method self whereCreatedAtNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "created_at" column to the query.
 * @method static self whereCreatedAtNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "created_at" column to the query.
 * @method self whereCreatedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "created_at" column to the query.
 * @method static self whereCreatedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "created_at" column to the query.
 * @method self whereCreatedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "created_at" column to the query.
 * @method static self whereCreatedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "created_at" column to the query.
 * @method self orWhereCreatedAt(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "created_at" column to the query.
 * @method static self orWhereCreatedAt(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "created_at" column to the query.
 * @method self orWhereCreatedAtNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "created_at" column to the query.
 * @method static self orWhereCreatedAtNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "created_at" column to the query.
 * @method self orWhereCreatedAtIn(array $values) Add an "or where in" clause on the "created_at" column to the query.
 * @method static self orWhereCreatedAtIn(array $values) Add an "or where in" clause on the "created_at" column to the query.
 * @method self orWhereCreatedAtNotIn(array $values) Add a "where not in" clause on the "created_at" column to the query.
 * @method static self orWhereCreatedAtNotIn(array $values) Add a "where not in" clause on the "created_at" column to the query.
 * @method self orWhereCreatedAtLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "created_at" column to the query.
 * @method static self orWhereCreatedAtLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "created_at" column to the query.
 * @method self orWhereCreatedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "created_at" column to the query.
 * @method static self orWhereCreatedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "created_at" column to the query.
 * @method self whereUpdatedAt(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "updated_at" column to the query.
 * @method static self whereUpdatedAt(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where" clause on the "updated_at" column to the query.
 * @method self whereUpdatedAtNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "updated_at" column to the query.
 * @method static self whereUpdatedAtNot(mixed $operator = null, mixed $value = null, string $boolean = 'and') Add a "where not" clause on the "updated_at" column to the query.
 * @method self whereUpdatedAtIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "updated_at" column to the query.
 * @method static self whereUpdatedAtIn(array $values, string $boolean = 'and', bool $not = false) Add a "where in" clause on the "updated_at" column to the query.
 * @method self whereUpdatedAtNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "updated_at" column to the query.
 * @method static self whereUpdatedAtNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "updated_at" column to the query.
 * @method self whereUpdatedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "updated_at" column to the query.
 * @method static self whereUpdatedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "updated_at" column to the query.
 * @method self whereUpdatedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "updated_at" column to the query.
 * @method static self whereUpdatedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where not like" clause on the "updated_at" column to the query.
 * @method self orWhereUpdatedAt(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "updated_at" column to the query.
 * @method static self orWhereUpdatedAt(mixed $operator = null, mixed $value = null) Add an "or where" clause on the "updated_at" column to the query.
 * @method self orWhereUpdatedAtNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "updated_at" column to the query.
 * @method static self orWhereUpdatedAtNot(mixed $operator = null, mixed $value = null) Add an "or where not" clause on the "updated_at" column to the query.
 * @method self orWhereUpdatedAtIn(array $values) Add an "or where in" clause on the "updated_at" column to the query.
 * @method static self orWhereUpdatedAtIn(array $values) Add an "or where in" clause on the "updated_at" column to the query.
 * @method self orWhereUpdatedAtNotIn(array $values) Add a "where not in" clause on the "updated_at" column to the query.
 * @method static self orWhereUpdatedAtNotIn(array $values) Add a "where not in" clause on the "updated_at" column to the query.
 * @method self orWhereUpdatedAtLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "updated_at" column to the query.
 * @method static self orWhereUpdatedAtLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "updated_at" column to the query.
 * @method self orWhereUpdatedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "updated_at" column to the query.
 * @method static self orWhereUpdatedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "updated_at" column to the query.
 */
class TestUserBuilder extends Builder
{
    use BuildsDynamicWhereQueries;
}
