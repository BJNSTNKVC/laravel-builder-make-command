<?php

namespace App\Models\Builders;

use Bjnstnkvc\BuilderMakeCommand\Concerns\BuildsDynamicWhereQueries;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static whereId(?string $operator = null, ?string $value = null) Add a "where" clause on the "id" column to the query.
 * @method self whereId(?string $operator = null, ?string $value = null) Add a "where" clause on the "id" column to the query.
 * @method static whereIdNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "id" column to the query.
 * @method self whereIdNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "id" column to the query.
 * @method static whereIdIn(array $values) Add a "where in" clause on the "id" column to the query.
 * @method self whereIdIn(array $values) Add a "where in" clause on the "id" column to the query.
 * @method static whereIdNotIn(array $values) Add a "where not in" clause on the "id" column to the query.
 * @method self whereIdNotIn(array $values) Add a "where not in" clause on the "id" column to the query.
 * @method static whereIdLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "id" column to the query.
 * @method self whereIdLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "id" column to the query.
 * @method static whereIdNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "id" column to the query.
 * @method self whereIdNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "id" column to the query.
 * @method static orWhereId(?string $operator = null, ?string $value = null) Add an "or where" clause on the "id" column to the query.
 * @method self orWhereId(?string $operator = null, ?string $value = null) Add an "or where" clause on the "id" column to the query.
 * @method static orWhereIdNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "id" column to the query.
 * @method self orWhereIdNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "id" column to the query.
 * @method static orWhereIdIn(array $values) Add an "or where in" clause on the "id" column to the query.
 * @method self orWhereIdIn(array $values) Add an "or where in" clause on the "id" column to the query.
 * @method static orWhereIdNotIn(array $values) Add a "where not in" clause on the "id" column to the query.
 * @method self orWhereIdNotIn(array $values) Add a "where not in" clause on the "id" column to the query.
 * @method static orWhereIdLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "id" column to the query.
 * @method self orWhereIdLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "id" column to the query.
 * @method static orWhereIdNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "id" column to the query.
 * @method self orWhereIdNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "id" column to the query.
 * @method static whereName(?string $operator = null, ?string $value = null) Add a "where" clause on the "name" column to the query.
 * @method self whereName(?string $operator = null, ?string $value = null) Add a "where" clause on the "name" column to the query.
 * @method static whereNameNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "name" column to the query.
 * @method self whereNameNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "name" column to the query.
 * @method static whereNameIn(array $values) Add a "where in" clause on the "name" column to the query.
 * @method self whereNameIn(array $values) Add a "where in" clause on the "name" column to the query.
 * @method static whereNameNotIn(array $values) Add a "where not in" clause on the "name" column to the query.
 * @method self whereNameNotIn(array $values) Add a "where not in" clause on the "name" column to the query.
 * @method static whereNameLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "name" column to the query.
 * @method self whereNameLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "name" column to the query.
 * @method static whereNameNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "name" column to the query.
 * @method self whereNameNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "name" column to the query.
 * @method static orWhereName(?string $operator = null, ?string $value = null) Add an "or where" clause on the "name" column to the query.
 * @method self orWhereName(?string $operator = null, ?string $value = null) Add an "or where" clause on the "name" column to the query.
 * @method static orWhereNameNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "name" column to the query.
 * @method self orWhereNameNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "name" column to the query.
 * @method static orWhereNameIn(array $values) Add an "or where in" clause on the "name" column to the query.
 * @method self orWhereNameIn(array $values) Add an "or where in" clause on the "name" column to the query.
 * @method static orWhereNameNotIn(array $values) Add a "where not in" clause on the "name" column to the query.
 * @method self orWhereNameNotIn(array $values) Add a "where not in" clause on the "name" column to the query.
 * @method static orWhereNameLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "name" column to the query.
 * @method self orWhereNameLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "name" column to the query.
 * @method static orWhereNameNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "name" column to the query.
 * @method self orWhereNameNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "name" column to the query.
 * @method static whereEmail(?string $operator = null, ?string $value = null) Add a "where" clause on the "email" column to the query.
 * @method self whereEmail(?string $operator = null, ?string $value = null) Add a "where" clause on the "email" column to the query.
 * @method static whereEmailNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "email" column to the query.
 * @method self whereEmailNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "email" column to the query.
 * @method static whereEmailIn(array $values) Add a "where in" clause on the "email" column to the query.
 * @method self whereEmailIn(array $values) Add a "where in" clause on the "email" column to the query.
 * @method static whereEmailNotIn(array $values) Add a "where not in" clause on the "email" column to the query.
 * @method self whereEmailNotIn(array $values) Add a "where not in" clause on the "email" column to the query.
 * @method static whereEmailLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "email" column to the query.
 * @method self whereEmailLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "email" column to the query.
 * @method static whereEmailNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "email" column to the query.
 * @method self whereEmailNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "email" column to the query.
 * @method static orWhereEmail(?string $operator = null, ?string $value = null) Add an "or where" clause on the "email" column to the query.
 * @method self orWhereEmail(?string $operator = null, ?string $value = null) Add an "or where" clause on the "email" column to the query.
 * @method static orWhereEmailNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "email" column to the query.
 * @method self orWhereEmailNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "email" column to the query.
 * @method static orWhereEmailIn(array $values) Add an "or where in" clause on the "email" column to the query.
 * @method self orWhereEmailIn(array $values) Add an "or where in" clause on the "email" column to the query.
 * @method static orWhereEmailNotIn(array $values) Add a "where not in" clause on the "email" column to the query.
 * @method self orWhereEmailNotIn(array $values) Add a "where not in" clause on the "email" column to the query.
 * @method static orWhereEmailLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "email" column to the query.
 * @method self orWhereEmailLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "email" column to the query.
 * @method static orWhereEmailNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "email" column to the query.
 * @method self orWhereEmailNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "email" column to the query.
 * @method static whereEmailVerifiedAt(?string $operator = null, ?string $value = null) Add a "where" clause on the "email_verified_at" column to the query.
 * @method self whereEmailVerifiedAt(?string $operator = null, ?string $value = null) Add a "where" clause on the "email_verified_at" column to the query.
 * @method static whereEmailVerifiedAtNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "email_verified_at" column to the query.
 * @method self whereEmailVerifiedAtNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "email_verified_at" column to the query.
 * @method static whereEmailVerifiedAtIn(array $values) Add a "where in" clause on the "email_verified_at" column to the query.
 * @method self whereEmailVerifiedAtIn(array $values) Add a "where in" clause on the "email_verified_at" column to the query.
 * @method static whereEmailVerifiedAtNotIn(array $values) Add a "where not in" clause on the "email_verified_at" column to the query.
 * @method self whereEmailVerifiedAtNotIn(array $values) Add a "where not in" clause on the "email_verified_at" column to the query.
 * @method static whereEmailVerifiedAtLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "email_verified_at" column to the query.
 * @method self whereEmailVerifiedAtLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "email_verified_at" column to the query.
 * @method static whereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "email_verified_at" column to the query.
 * @method self whereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "email_verified_at" column to the query.
 * @method static orWhereEmailVerifiedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "email_verified_at" column to the query.
 * @method self orWhereEmailVerifiedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "email_verified_at" column to the query.
 * @method static orWhereEmailVerifiedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "email_verified_at" column to the query.
 * @method self orWhereEmailVerifiedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "email_verified_at" column to the query.
 * @method static orWhereEmailVerifiedAtIn(array $values) Add an "or where in" clause on the "email_verified_at" column to the query.
 * @method self orWhereEmailVerifiedAtIn(array $values) Add an "or where in" clause on the "email_verified_at" column to the query.
 * @method static orWhereEmailVerifiedAtNotIn(array $values) Add a "where not in" clause on the "email_verified_at" column to the query.
 * @method self orWhereEmailVerifiedAtNotIn(array $values) Add a "where not in" clause on the "email_verified_at" column to the query.
 * @method static orWhereEmailVerifiedAtLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "email_verified_at" column to the query.
 * @method self orWhereEmailVerifiedAtLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "email_verified_at" column to the query.
 * @method static orWhereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "email_verified_at" column to the query.
 * @method self orWhereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "email_verified_at" column to the query.
 * @method static wherePassword(?string $operator = null, ?string $value = null) Add a "where" clause on the "password" column to the query.
 * @method self wherePassword(?string $operator = null, ?string $value = null) Add a "where" clause on the "password" column to the query.
 * @method static wherePasswordNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "password" column to the query.
 * @method self wherePasswordNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "password" column to the query.
 * @method static wherePasswordIn(array $values) Add a "where in" clause on the "password" column to the query.
 * @method self wherePasswordIn(array $values) Add a "where in" clause on the "password" column to the query.
 * @method static wherePasswordNotIn(array $values) Add a "where not in" clause on the "password" column to the query.
 * @method self wherePasswordNotIn(array $values) Add a "where not in" clause on the "password" column to the query.
 * @method static wherePasswordLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "password" column to the query.
 * @method self wherePasswordLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "password" column to the query.
 * @method static wherePasswordNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "password" column to the query.
 * @method self wherePasswordNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "password" column to the query.
 * @method static orWherePassword(?string $operator = null, ?string $value = null) Add an "or where" clause on the "password" column to the query.
 * @method self orWherePassword(?string $operator = null, ?string $value = null) Add an "or where" clause on the "password" column to the query.
 * @method static orWherePasswordNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "password" column to the query.
 * @method self orWherePasswordNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "password" column to the query.
 * @method static orWherePasswordIn(array $values) Add an "or where in" clause on the "password" column to the query.
 * @method self orWherePasswordIn(array $values) Add an "or where in" clause on the "password" column to the query.
 * @method static orWherePasswordNotIn(array $values) Add a "where not in" clause on the "password" column to the query.
 * @method self orWherePasswordNotIn(array $values) Add a "where not in" clause on the "password" column to the query.
 * @method static orWherePasswordLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "password" column to the query.
 * @method self orWherePasswordLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "password" column to the query.
 * @method static orWherePasswordNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "password" column to the query.
 * @method self orWherePasswordNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "password" column to the query.
 * @method static whereRememberToken(?string $operator = null, ?string $value = null) Add a "where" clause on the "remember_token" column to the query.
 * @method self whereRememberToken(?string $operator = null, ?string $value = null) Add a "where" clause on the "remember_token" column to the query.
 * @method static whereRememberTokenNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "remember_token" column to the query.
 * @method self whereRememberTokenNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "remember_token" column to the query.
 * @method static whereRememberTokenIn(array $values) Add a "where in" clause on the "remember_token" column to the query.
 * @method self whereRememberTokenIn(array $values) Add a "where in" clause on the "remember_token" column to the query.
 * @method static whereRememberTokenNotIn(array $values) Add a "where not in" clause on the "remember_token" column to the query.
 * @method self whereRememberTokenNotIn(array $values) Add a "where not in" clause on the "remember_token" column to the query.
 * @method static whereRememberTokenLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "remember_token" column to the query.
 * @method self whereRememberTokenLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "remember_token" column to the query.
 * @method static whereRememberTokenNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "remember_token" column to the query.
 * @method self whereRememberTokenNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "remember_token" column to the query.
 * @method static orWhereRememberToken(?string $operator = null, ?string $value = null) Add an "or where" clause on the "remember_token" column to the query.
 * @method self orWhereRememberToken(?string $operator = null, ?string $value = null) Add an "or where" clause on the "remember_token" column to the query.
 * @method static orWhereRememberTokenNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "remember_token" column to the query.
 * @method self orWhereRememberTokenNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "remember_token" column to the query.
 * @method static orWhereRememberTokenIn(array $values) Add an "or where in" clause on the "remember_token" column to the query.
 * @method self orWhereRememberTokenIn(array $values) Add an "or where in" clause on the "remember_token" column to the query.
 * @method static orWhereRememberTokenNotIn(array $values) Add a "where not in" clause on the "remember_token" column to the query.
 * @method self orWhereRememberTokenNotIn(array $values) Add a "where not in" clause on the "remember_token" column to the query.
 * @method static orWhereRememberTokenLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "remember_token" column to the query.
 * @method self orWhereRememberTokenLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "remember_token" column to the query.
 * @method static orWhereRememberTokenNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "remember_token" column to the query.
 * @method self orWhereRememberTokenNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "remember_token" column to the query.
 * @method static whereCreatedAt(?string $operator = null, ?string $value = null) Add a "where" clause on the "created_at" column to the query.
 * @method self whereCreatedAt(?string $operator = null, ?string $value = null) Add a "where" clause on the "created_at" column to the query.
 * @method static whereCreatedAtNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "created_at" column to the query.
 * @method self whereCreatedAtNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "created_at" column to the query.
 * @method static whereCreatedAtIn(array $values) Add a "where in" clause on the "created_at" column to the query.
 * @method self whereCreatedAtIn(array $values) Add a "where in" clause on the "created_at" column to the query.
 * @method static whereCreatedAtNotIn(array $values) Add a "where not in" clause on the "created_at" column to the query.
 * @method self whereCreatedAtNotIn(array $values) Add a "where not in" clause on the "created_at" column to the query.
 * @method static whereCreatedAtLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "created_at" column to the query.
 * @method self whereCreatedAtLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "created_at" column to the query.
 * @method static whereCreatedAtNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "created_at" column to the query.
 * @method self whereCreatedAtNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "created_at" column to the query.
 * @method static orWhereCreatedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "created_at" column to the query.
 * @method self orWhereCreatedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "created_at" column to the query.
 * @method static orWhereCreatedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "created_at" column to the query.
 * @method self orWhereCreatedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "created_at" column to the query.
 * @method static orWhereCreatedAtIn(array $values) Add an "or where in" clause on the "created_at" column to the query.
 * @method self orWhereCreatedAtIn(array $values) Add an "or where in" clause on the "created_at" column to the query.
 * @method static orWhereCreatedAtNotIn(array $values) Add a "where not in" clause on the "created_at" column to the query.
 * @method self orWhereCreatedAtNotIn(array $values) Add a "where not in" clause on the "created_at" column to the query.
 * @method static orWhereCreatedAtLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "created_at" column to the query.
 * @method self orWhereCreatedAtLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "created_at" column to the query.
 * @method static orWhereCreatedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "created_at" column to the query.
 * @method self orWhereCreatedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "created_at" column to the query.
 * @method static whereUpdatedAt(?string $operator = null, ?string $value = null) Add a "where" clause on the "updated_at" column to the query.
 * @method self whereUpdatedAt(?string $operator = null, ?string $value = null) Add a "where" clause on the "updated_at" column to the query.
 * @method static whereUpdatedAtNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "updated_at" column to the query.
 * @method self whereUpdatedAtNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "updated_at" column to the query.
 * @method static whereUpdatedAtIn(array $values) Add a "where in" clause on the "updated_at" column to the query.
 * @method self whereUpdatedAtIn(array $values) Add a "where in" clause on the "updated_at" column to the query.
 * @method static whereUpdatedAtNotIn(array $values) Add a "where not in" clause on the "updated_at" column to the query.
 * @method self whereUpdatedAtNotIn(array $values) Add a "where not in" clause on the "updated_at" column to the query.
 * @method static whereUpdatedAtLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "updated_at" column to the query.
 * @method self whereUpdatedAtLike(string $value, bool $caseSensitive = false) Add a "where like" clause on the "updated_at" column to the query.
 * @method static whereUpdatedAtNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "updated_at" column to the query.
 * @method self whereUpdatedAtNotLike(string $value, bool $caseSensitive = false) Add a "where not like" clause on the "updated_at" column to the query.
 * @method static orWhereUpdatedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "updated_at" column to the query.
 * @method self orWhereUpdatedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "updated_at" column to the query.
 * @method static orWhereUpdatedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "updated_at" column to the query.
 * @method self orWhereUpdatedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "updated_at" column to the query.
 * @method static orWhereUpdatedAtIn(array $values) Add an "or where in" clause on the "updated_at" column to the query.
 * @method self orWhereUpdatedAtIn(array $values) Add an "or where in" clause on the "updated_at" column to the query.
 * @method static orWhereUpdatedAtNotIn(array $values) Add a "where not in" clause on the "updated_at" column to the query.
 * @method self orWhereUpdatedAtNotIn(array $values) Add a "where not in" clause on the "updated_at" column to the query.
 * @method static orWhereUpdatedAtLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "updated_at" column to the query.
 * @method self orWhereUpdatedAtLike(?string $operator = null, ?string $value = null) Add an "or where like" clause on the "updated_at" column to the query.
 * @method static orWhereUpdatedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "updated_at" column to the query.
 * @method self orWhereUpdatedAtNotLike(string $value, bool $caseSensitive = false) Add an "or where not like" clause on the "updated_at" column to the query.
 */
class TestUserBuilder extends Builder
{
    use BuildsDynamicWhereQueries;
}
