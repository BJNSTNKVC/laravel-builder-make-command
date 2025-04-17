<?php

namespace App\Models\Builders;

use Bjnstnkvc\BuilderMakeCommand\Concerns\BuildsDynamicWhereQueries;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static whereId(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "id" column to the query.\n
 * @method self whereId(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "id" column to the query.\r\n
 * @method static whereIdNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "id" column to the query.\n
 * @method self whereIdNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "id" column to the query.\r\n
 * @method static whereIdIn(array $values, string $boolean = 'and') Add a "where in" clause on the "id" column to the query.\n
 * @method self whereIdIn(array $values, string $boolean = 'and') Add a "where in" clause on the "id" column to the query.\r\n
 * @method static whereIdNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "id" column to the query.\n
 * @method self whereIdNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "id" column to the query.\r\n
 * @method static whereIdLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "id" column to the query.\n
 * @method self whereIdLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "id" column to the query.\r\n
 * @method static whereIdNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "id" column to the query.\n
 * @method self whereIdNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "id" column to the query.\r\n
 * @method static orWhereId(?string $operator = null, ?string $value = null) Add an "or where" clause on the "id" column to the query.\n
 * @method self orWhereId(?string $operator = null, ?string $value = null) Add an "or where" clause on the "id" column to the query.\r\n
 * @method static orWhereIdNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "id" column to the query.\n
 * @method self orWhereIdNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "id" column to the query.\r\n
 * @method static orWhereIdIn(array $values) Add an "or where in" clause on the "id" column to the query.\n
 * @method self orWhereIdIn(array $values) Add an "or where in" clause on the "id" column to the query.\r\n
 * @method static orWhereIdNotIn(array $values) Add a "where not in" clause on the "id" column to the query.\n
 * @method self orWhereIdNotIn(array $values) Add a "where not in" clause on the "id" column to the query.\r\n
 * @method static orWhereIdLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "id" column to the query.\n
 * @method self orWhereIdLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "id" column to the query.\r\n
 * @method static orWhereIdNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "id" column to the query.\n
 * @method self orWhereIdNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "id" column to the query.\r\n
 * @method static whereName(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "name" column to the query.\n
 * @method self whereName(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "name" column to the query.\r\n
 * @method static whereNameNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "name" column to the query.\n
 * @method self whereNameNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "name" column to the query.\r\n
 * @method static whereNameIn(array $values, string $boolean = 'and') Add a "where in" clause on the "name" column to the query.\n
 * @method self whereNameIn(array $values, string $boolean = 'and') Add a "where in" clause on the "name" column to the query.\r\n
 * @method static whereNameNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "name" column to the query.\n
 * @method self whereNameNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "name" column to the query.\r\n
 * @method static whereNameLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "name" column to the query.\n
 * @method self whereNameLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "name" column to the query.\r\n
 * @method static whereNameNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "name" column to the query.\n
 * @method self whereNameNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "name" column to the query.\r\n
 * @method static orWhereName(?string $operator = null, ?string $value = null) Add an "or where" clause on the "name" column to the query.\n
 * @method self orWhereName(?string $operator = null, ?string $value = null) Add an "or where" clause on the "name" column to the query.\r\n
 * @method static orWhereNameNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "name" column to the query.\n
 * @method self orWhereNameNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "name" column to the query.\r\n
 * @method static orWhereNameIn(array $values) Add an "or where in" clause on the "name" column to the query.\n
 * @method self orWhereNameIn(array $values) Add an "or where in" clause on the "name" column to the query.\r\n
 * @method static orWhereNameNotIn(array $values) Add a "where not in" clause on the "name" column to the query.\n
 * @method self orWhereNameNotIn(array $values) Add a "where not in" clause on the "name" column to the query.\r\n
 * @method static orWhereNameLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "name" column to the query.\n
 * @method self orWhereNameLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "name" column to the query.\r\n
 * @method static orWhereNameNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "name" column to the query.\n
 * @method self orWhereNameNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "name" column to the query.\r\n
 * @method static whereEmail(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "email" column to the query.\n
 * @method self whereEmail(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "email" column to the query.\r\n
 * @method static whereEmailNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "email" column to the query.\n
 * @method self whereEmailNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "email" column to the query.\r\n
 * @method static whereEmailIn(array $values, string $boolean = 'and') Add a "where in" clause on the "email" column to the query.\n
 * @method self whereEmailIn(array $values, string $boolean = 'and') Add a "where in" clause on the "email" column to the query.\r\n
 * @method static whereEmailNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "email" column to the query.\n
 * @method self whereEmailNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "email" column to the query.\r\n
 * @method static whereEmailLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "email" column to the query.\n
 * @method self whereEmailLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "email" column to the query.\r\n
 * @method static whereEmailNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "email" column to the query.\n
 * @method self whereEmailNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "email" column to the query.\r\n
 * @method static orWhereEmail(?string $operator = null, ?string $value = null) Add an "or where" clause on the "email" column to the query.\n
 * @method self orWhereEmail(?string $operator = null, ?string $value = null) Add an "or where" clause on the "email" column to the query.\r\n
 * @method static orWhereEmailNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "email" column to the query.\n
 * @method self orWhereEmailNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "email" column to the query.\r\n
 * @method static orWhereEmailIn(array $values) Add an "or where in" clause on the "email" column to the query.\n
 * @method self orWhereEmailIn(array $values) Add an "or where in" clause on the "email" column to the query.\r\n
 * @method static orWhereEmailNotIn(array $values) Add a "where not in" clause on the "email" column to the query.\n
 * @method self orWhereEmailNotIn(array $values) Add a "where not in" clause on the "email" column to the query.\r\n
 * @method static orWhereEmailLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "email" column to the query.\n
 * @method self orWhereEmailLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "email" column to the query.\r\n
 * @method static orWhereEmailNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "email" column to the query.\n
 * @method self orWhereEmailNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "email" column to the query.\r\n
 * @method static whereEmailVerifiedAt(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "email_verified_at" column to the query.\n
 * @method self whereEmailVerifiedAt(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "email_verified_at" column to the query.\r\n
 * @method static whereEmailVerifiedAtNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "email_verified_at" column to the query.\n
 * @method self whereEmailVerifiedAtNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "email_verified_at" column to the query.\r\n
 * @method static whereEmailVerifiedAtIn(array $values, string $boolean = 'and') Add a "where in" clause on the "email_verified_at" column to the query.\n
 * @method self whereEmailVerifiedAtIn(array $values, string $boolean = 'and') Add a "where in" clause on the "email_verified_at" column to the query.\r\n
 * @method static whereEmailVerifiedAtNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "email_verified_at" column to the query.\n
 * @method self whereEmailVerifiedAtNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "email_verified_at" column to the query.\r\n
 * @method static whereEmailVerifiedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "email_verified_at" column to the query.\n
 * @method self whereEmailVerifiedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "email_verified_at" column to the query.\r\n
 * @method static whereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "email_verified_at" column to the query.\n
 * @method self whereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "email_verified_at" column to the query.\r\n
 * @method static orWhereEmailVerifiedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "email_verified_at" column to the query.\n
 * @method self orWhereEmailVerifiedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "email_verified_at" column to the query.\r\n
 * @method static orWhereEmailVerifiedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "email_verified_at" column to the query.\n
 * @method self orWhereEmailVerifiedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "email_verified_at" column to the query.\r\n
 * @method static orWhereEmailVerifiedAtIn(array $values) Add an "or where in" clause on the "email_verified_at" column to the query.\n
 * @method self orWhereEmailVerifiedAtIn(array $values) Add an "or where in" clause on the "email_verified_at" column to the query.\r\n
 * @method static orWhereEmailVerifiedAtNotIn(array $values) Add a "where not in" clause on the "email_verified_at" column to the query.\n
 * @method self orWhereEmailVerifiedAtNotIn(array $values) Add a "where not in" clause on the "email_verified_at" column to the query.\r\n
 * @method static orWhereEmailVerifiedAtLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "email_verified_at" column to the query.\n
 * @method self orWhereEmailVerifiedAtLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "email_verified_at" column to the query.\r\n
 * @method static orWhereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "email_verified_at" column to the query.\n
 * @method self orWhereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "email_verified_at" column to the query.\r\n
 * @method static wherePassword(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "password" column to the query.\n
 * @method self wherePassword(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "password" column to the query.\r\n
 * @method static wherePasswordNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "password" column to the query.\n
 * @method self wherePasswordNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "password" column to the query.\r\n
 * @method static wherePasswordIn(array $values, string $boolean = 'and') Add a "where in" clause on the "password" column to the query.\n
 * @method self wherePasswordIn(array $values, string $boolean = 'and') Add a "where in" clause on the "password" column to the query.\r\n
 * @method static wherePasswordNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "password" column to the query.\n
 * @method self wherePasswordNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "password" column to the query.\r\n
 * @method static wherePasswordLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "password" column to the query.\n
 * @method self wherePasswordLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "password" column to the query.\r\n
 * @method static wherePasswordNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "password" column to the query.\n
 * @method self wherePasswordNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "password" column to the query.\r\n
 * @method static orWherePassword(?string $operator = null, ?string $value = null) Add an "or where" clause on the "password" column to the query.\n
 * @method self orWherePassword(?string $operator = null, ?string $value = null) Add an "or where" clause on the "password" column to the query.\r\n
 * @method static orWherePasswordNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "password" column to the query.\n
 * @method self orWherePasswordNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "password" column to the query.\r\n
 * @method static orWherePasswordIn(array $values) Add an "or where in" clause on the "password" column to the query.\n
 * @method self orWherePasswordIn(array $values) Add an "or where in" clause on the "password" column to the query.\r\n
 * @method static orWherePasswordNotIn(array $values) Add a "where not in" clause on the "password" column to the query.\n
 * @method self orWherePasswordNotIn(array $values) Add a "where not in" clause on the "password" column to the query.\r\n
 * @method static orWherePasswordLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "password" column to the query.\n
 * @method self orWherePasswordLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "password" column to the query.\r\n
 * @method static orWherePasswordNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "password" column to the query.\n
 * @method self orWherePasswordNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "password" column to the query.\r\n
 * @method static whereRememberToken(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "remember_token" column to the query.\n
 * @method self whereRememberToken(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "remember_token" column to the query.\r\n
 * @method static whereRememberTokenNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "remember_token" column to the query.\n
 * @method self whereRememberTokenNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "remember_token" column to the query.\r\n
 * @method static whereRememberTokenIn(array $values, string $boolean = 'and') Add a "where in" clause on the "remember_token" column to the query.\n
 * @method self whereRememberTokenIn(array $values, string $boolean = 'and') Add a "where in" clause on the "remember_token" column to the query.\r\n
 * @method static whereRememberTokenNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "remember_token" column to the query.\n
 * @method self whereRememberTokenNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "remember_token" column to the query.\r\n
 * @method static whereRememberTokenLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "remember_token" column to the query.\n
 * @method self whereRememberTokenLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "remember_token" column to the query.\r\n
 * @method static whereRememberTokenNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "remember_token" column to the query.\n
 * @method self whereRememberTokenNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "remember_token" column to the query.\r\n
 * @method static orWhereRememberToken(?string $operator = null, ?string $value = null) Add an "or where" clause on the "remember_token" column to the query.\n
 * @method self orWhereRememberToken(?string $operator = null, ?string $value = null) Add an "or where" clause on the "remember_token" column to the query.\r\n
 * @method static orWhereRememberTokenNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "remember_token" column to the query.\n
 * @method self orWhereRememberTokenNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "remember_token" column to the query.\r\n
 * @method static orWhereRememberTokenIn(array $values) Add an "or where in" clause on the "remember_token" column to the query.\n
 * @method self orWhereRememberTokenIn(array $values) Add an "or where in" clause on the "remember_token" column to the query.\r\n
 * @method static orWhereRememberTokenNotIn(array $values) Add a "where not in" clause on the "remember_token" column to the query.\n
 * @method self orWhereRememberTokenNotIn(array $values) Add a "where not in" clause on the "remember_token" column to the query.\r\n
 * @method static orWhereRememberTokenLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "remember_token" column to the query.\n
 * @method self orWhereRememberTokenLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "remember_token" column to the query.\r\n
 * @method static orWhereRememberTokenNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "remember_token" column to the query.\n
 * @method self orWhereRememberTokenNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "remember_token" column to the query.\r\n
 * @method static whereCreatedAt(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "created_at" column to the query.\n
 * @method self whereCreatedAt(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "created_at" column to the query.\r\n
 * @method static whereCreatedAtNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "created_at" column to the query.\n
 * @method self whereCreatedAtNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "created_at" column to the query.\r\n
 * @method static whereCreatedAtIn(array $values, string $boolean = 'and') Add a "where in" clause on the "created_at" column to the query.\n
 * @method self whereCreatedAtIn(array $values, string $boolean = 'and') Add a "where in" clause on the "created_at" column to the query.\r\n
 * @method static whereCreatedAtNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "created_at" column to the query.\n
 * @method self whereCreatedAtNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "created_at" column to the query.\r\n
 * @method static whereCreatedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "created_at" column to the query.\n
 * @method self whereCreatedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "created_at" column to the query.\r\n
 * @method static whereCreatedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "created_at" column to the query.\n
 * @method self whereCreatedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "created_at" column to the query.\r\n
 * @method static orWhereCreatedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "created_at" column to the query.\n
 * @method self orWhereCreatedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "created_at" column to the query.\r\n
 * @method static orWhereCreatedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "created_at" column to the query.\n
 * @method self orWhereCreatedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "created_at" column to the query.\r\n
 * @method static orWhereCreatedAtIn(array $values) Add an "or where in" clause on the "created_at" column to the query.\n
 * @method self orWhereCreatedAtIn(array $values) Add an "or where in" clause on the "created_at" column to the query.\r\n
 * @method static orWhereCreatedAtNotIn(array $values) Add a "where not in" clause on the "created_at" column to the query.\n
 * @method self orWhereCreatedAtNotIn(array $values) Add a "where not in" clause on the "created_at" column to the query.\r\n
 * @method static orWhereCreatedAtLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "created_at" column to the query.\n
 * @method self orWhereCreatedAtLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "created_at" column to the query.\r\n
 * @method static orWhereCreatedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "created_at" column to the query.\n
 * @method self orWhereCreatedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "created_at" column to the query.\r\n
 * @method static whereUpdatedAt(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "updated_at" column to the query.\n
 * @method self whereUpdatedAt(?string $operator = null, ?string $value = null, string $boolean = 'and') Add a "where" clause on the "updated_at" column to the query.\r\n
 * @method static whereUpdatedAtNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "updated_at" column to the query.\n
 * @method self whereUpdatedAtNot(?string $operator = null, ?string $value = null, $boolean = 'and') Add a "where not" clause on the "updated_at" column to the query.\r\n
 * @method static whereUpdatedAtIn(array $values, string $boolean = 'and') Add a "where in" clause on the "updated_at" column to the query.\n
 * @method self whereUpdatedAtIn(array $values, string $boolean = 'and') Add a "where in" clause on the "updated_at" column to the query.\r\n
 * @method static whereUpdatedAtNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "updated_at" column to the query.\n
 * @method self whereUpdatedAtNotIn(array $values, string $boolean = 'and') Add a "where not in" clause on the "updated_at" column to the query.\r\n
 * @method static whereUpdatedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "updated_at" column to the query.\n
 * @method self whereUpdatedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false) Add a "where like" clause on the "updated_at" column to the query.\r\n
 * @method static whereUpdatedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "updated_at" column to the query.\n
 * @method self whereUpdatedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and') Add a "where not like" clause on the "updated_at" column to the query.\r\n
 * @method static orWhereUpdatedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "updated_at" column to the query.\n
 * @method self orWhereUpdatedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "updated_at" column to the query.\r\n
 * @method static orWhereUpdatedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "updated_at" column to the query.\n
 * @method self orWhereUpdatedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "updated_at" column to the query.\r\n
 * @method static orWhereUpdatedAtIn(array $values) Add an "or where in" clause on the "updated_at" column to the query.\n
 * @method self orWhereUpdatedAtIn(array $values) Add an "or where in" clause on the "updated_at" column to the query.\r\n
 * @method static orWhereUpdatedAtNotIn(array $values) Add a "where not in" clause on the "updated_at" column to the query.\n
 * @method self orWhereUpdatedAtNotIn(array $values) Add a "where not in" clause on the "updated_at" column to the query.\r\n
 * @method static orWhereUpdatedAtLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "updated_at" column to the query.\n
 * @method self orWhereUpdatedAtLike(string $value, bool $caseSensitive = false) Add an "or where like" clause on the "updated_at" column to the query.\r\n
 * @method static orWhereUpdatedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "updated_at" column to the query.\n
 * @method self orWhereUpdatedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "updated_at" column to the query.
 */
class TestUserBuilder extends Builder
{
    use BuildsDynamicWhereQueries;
}
