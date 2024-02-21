<?php

namespace App\Models\Builders;

use Bjnstnkvc\BuilderMakeCommand\Concerns\BuildsDynamicWhereQueries;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static whereId(?string $operator = null, ?string $value = null) Add a "where" clause on the "id" column to the query.
 * @method TestUserBuilder whereId(?string $operator = null, ?string $value = null) Add a "where" clause on the "id" column to the query.
 * @method static whereIdNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "id" column to the query.
 * @method TestUserBuilder whereIdNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "id" column to the query.
 * @method static whereIdIn(array $values) Add a "where in" clause on the "id" column to the query.
 * @method TestUserBuilder whereIdIn(array $values) Add a "where in" clause on the "id" column to the query.
 * @method static whereIdNotIn(array $values) Add a "where not in" clause on the "id" column to the query.
 * @method TestUserBuilder whereIdNotIn(array $values) Add a "where not in" clause on the "id" column to the query.
 * @method static orWhereId(?string $operator = null, ?string $value = null) Add an "or where" clause on the "id" column to the query.
 * @method TestUserBuilder orWhereId(?string $operator = null, ?string $value = null) Add an "or where" clause on the "id" column to the query.
 * @method static orWhereIdNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "id" column to the query.
 * @method TestUserBuilder orWhereIdNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "id" column to the query.
 * @method static orWhereIdIn(array $values) Add an "or where in" clause on the "id" column to the query.
 * @method TestUserBuilder orWhereIdIn(array $values) Add an "or where in" clause on the "id" column to the query.
 * @method static orWhereIdNotIn(array $values) Add a "where not in" clause on the "id" column to the query.
 * @method TestUserBuilder orWhereIdNotIn(array $values) Add a "where not in" clause on the "id" column to the query.
 * @method static whereName(?string $operator = null, ?string $value = null) Add a "where" clause on the "name" column to the query.
 * @method TestUserBuilder whereName(?string $operator = null, ?string $value = null) Add a "where" clause on the "name" column to the query.
 * @method static whereNameNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "name" column to the query.
 * @method TestUserBuilder whereNameNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "name" column to the query.
 * @method static whereNameIn(array $values) Add a "where in" clause on the "name" column to the query.
 * @method TestUserBuilder whereNameIn(array $values) Add a "where in" clause on the "name" column to the query.
 * @method static whereNameNotIn(array $values) Add a "where not in" clause on the "name" column to the query.
 * @method TestUserBuilder whereNameNotIn(array $values) Add a "where not in" clause on the "name" column to the query.
 * @method static orWhereName(?string $operator = null, ?string $value = null) Add an "or where" clause on the "name" column to the query.
 * @method TestUserBuilder orWhereName(?string $operator = null, ?string $value = null) Add an "or where" clause on the "name" column to the query.
 * @method static orWhereNameNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "name" column to the query.
 * @method TestUserBuilder orWhereNameNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "name" column to the query.
 * @method static orWhereNameIn(array $values) Add an "or where in" clause on the "name" column to the query.
 * @method TestUserBuilder orWhereNameIn(array $values) Add an "or where in" clause on the "name" column to the query.
 * @method static orWhereNameNotIn(array $values) Add a "where not in" clause on the "name" column to the query.
 * @method TestUserBuilder orWhereNameNotIn(array $values) Add a "where not in" clause on the "name" column to the query.
 * @method static whereEmail(?string $operator = null, ?string $value = null) Add a "where" clause on the "email" column to the query.
 * @method TestUserBuilder whereEmail(?string $operator = null, ?string $value = null) Add a "where" clause on the "email" column to the query.
 * @method static whereEmailNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "email" column to the query.
 * @method TestUserBuilder whereEmailNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "email" column to the query.
 * @method static whereEmailIn(array $values) Add a "where in" clause on the "email" column to the query.
 * @method TestUserBuilder whereEmailIn(array $values) Add a "where in" clause on the "email" column to the query.
 * @method static whereEmailNotIn(array $values) Add a "where not in" clause on the "email" column to the query.
 * @method TestUserBuilder whereEmailNotIn(array $values) Add a "where not in" clause on the "email" column to the query.
 * @method static orWhereEmail(?string $operator = null, ?string $value = null) Add an "or where" clause on the "email" column to the query.
 * @method TestUserBuilder orWhereEmail(?string $operator = null, ?string $value = null) Add an "or where" clause on the "email" column to the query.
 * @method static orWhereEmailNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "email" column to the query.
 * @method TestUserBuilder orWhereEmailNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "email" column to the query.
 * @method static orWhereEmailIn(array $values) Add an "or where in" clause on the "email" column to the query.
 * @method TestUserBuilder orWhereEmailIn(array $values) Add an "or where in" clause on the "email" column to the query.
 * @method static orWhereEmailNotIn(array $values) Add a "where not in" clause on the "email" column to the query.
 * @method TestUserBuilder orWhereEmailNotIn(array $values) Add a "where not in" clause on the "email" column to the query.
 * @method static whereEmailVerifiedAt(?string $operator = null, ?string $value = null) Add a "where" clause on the "email_verified_at" column to the query.
 * @method TestUserBuilder whereEmailVerifiedAt(?string $operator = null, ?string $value = null) Add a "where" clause on the "email_verified_at" column to the query.
 * @method static whereEmailVerifiedAtNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "email_verified_at" column to the query.
 * @method TestUserBuilder whereEmailVerifiedAtNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "email_verified_at" column to the query.
 * @method static whereEmailVerifiedAtIn(array $values) Add a "where in" clause on the "email_verified_at" column to the query.
 * @method TestUserBuilder whereEmailVerifiedAtIn(array $values) Add a "where in" clause on the "email_verified_at" column to the query.
 * @method static whereEmailVerifiedAtNotIn(array $values) Add a "where not in" clause on the "email_verified_at" column to the query.
 * @method TestUserBuilder whereEmailVerifiedAtNotIn(array $values) Add a "where not in" clause on the "email_verified_at" column to the query.
 * @method static orWhereEmailVerifiedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "email_verified_at" column to the query.
 * @method TestUserBuilder orWhereEmailVerifiedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "email_verified_at" column to the query.
 * @method static orWhereEmailVerifiedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "email_verified_at" column to the query.
 * @method TestUserBuilder orWhereEmailVerifiedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "email_verified_at" column to the query.
 * @method static orWhereEmailVerifiedAtIn(array $values) Add an "or where in" clause on the "email_verified_at" column to the query.
 * @method TestUserBuilder orWhereEmailVerifiedAtIn(array $values) Add an "or where in" clause on the "email_verified_at" column to the query.
 * @method static orWhereEmailVerifiedAtNotIn(array $values) Add a "where not in" clause on the "email_verified_at" column to the query.
 * @method TestUserBuilder orWhereEmailVerifiedAtNotIn(array $values) Add a "where not in" clause on the "email_verified_at" column to the query.
 * @method static wherePassword(?string $operator = null, ?string $value = null) Add a "where" clause on the "password" column to the query.
 * @method TestUserBuilder wherePassword(?string $operator = null, ?string $value = null) Add a "where" clause on the "password" column to the query.
 * @method static wherePasswordNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "password" column to the query.
 * @method TestUserBuilder wherePasswordNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "password" column to the query.
 * @method static wherePasswordIn(array $values) Add a "where in" clause on the "password" column to the query.
 * @method TestUserBuilder wherePasswordIn(array $values) Add a "where in" clause on the "password" column to the query.
 * @method static wherePasswordNotIn(array $values) Add a "where not in" clause on the "password" column to the query.
 * @method TestUserBuilder wherePasswordNotIn(array $values) Add a "where not in" clause on the "password" column to the query.
 * @method static orWherePassword(?string $operator = null, ?string $value = null) Add an "or where" clause on the "password" column to the query.
 * @method TestUserBuilder orWherePassword(?string $operator = null, ?string $value = null) Add an "or where" clause on the "password" column to the query.
 * @method static orWherePasswordNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "password" column to the query.
 * @method TestUserBuilder orWherePasswordNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "password" column to the query.
 * @method static orWherePasswordIn(array $values) Add an "or where in" clause on the "password" column to the query.
 * @method TestUserBuilder orWherePasswordIn(array $values) Add an "or where in" clause on the "password" column to the query.
 * @method static orWherePasswordNotIn(array $values) Add a "where not in" clause on the "password" column to the query.
 * @method TestUserBuilder orWherePasswordNotIn(array $values) Add a "where not in" clause on the "password" column to the query.
 * @method static whereRememberToken(?string $operator = null, ?string $value = null) Add a "where" clause on the "remember_token" column to the query.
 * @method TestUserBuilder whereRememberToken(?string $operator = null, ?string $value = null) Add a "where" clause on the "remember_token" column to the query.
 * @method static whereRememberTokenNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "remember_token" column to the query.
 * @method TestUserBuilder whereRememberTokenNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "remember_token" column to the query.
 * @method static whereRememberTokenIn(array $values) Add a "where in" clause on the "remember_token" column to the query.
 * @method TestUserBuilder whereRememberTokenIn(array $values) Add a "where in" clause on the "remember_token" column to the query.
 * @method static whereRememberTokenNotIn(array $values) Add a "where not in" clause on the "remember_token" column to the query.
 * @method TestUserBuilder whereRememberTokenNotIn(array $values) Add a "where not in" clause on the "remember_token" column to the query.
 * @method static orWhereRememberToken(?string $operator = null, ?string $value = null) Add an "or where" clause on the "remember_token" column to the query.
 * @method TestUserBuilder orWhereRememberToken(?string $operator = null, ?string $value = null) Add an "or where" clause on the "remember_token" column to the query.
 * @method static orWhereRememberTokenNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "remember_token" column to the query.
 * @method TestUserBuilder orWhereRememberTokenNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "remember_token" column to the query.
 * @method static orWhereRememberTokenIn(array $values) Add an "or where in" clause on the "remember_token" column to the query.
 * @method TestUserBuilder orWhereRememberTokenIn(array $values) Add an "or where in" clause on the "remember_token" column to the query.
 * @method static orWhereRememberTokenNotIn(array $values) Add a "where not in" clause on the "remember_token" column to the query.
 * @method TestUserBuilder orWhereRememberTokenNotIn(array $values) Add a "where not in" clause on the "remember_token" column to the query.
 * @method static whereCreatedAt(?string $operator = null, ?string $value = null) Add a "where" clause on the "created_at" column to the query.
 * @method TestUserBuilder whereCreatedAt(?string $operator = null, ?string $value = null) Add a "where" clause on the "created_at" column to the query.
 * @method static whereCreatedAtNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "created_at" column to the query.
 * @method TestUserBuilder whereCreatedAtNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "created_at" column to the query.
 * @method static whereCreatedAtIn(array $values) Add a "where in" clause on the "created_at" column to the query.
 * @method TestUserBuilder whereCreatedAtIn(array $values) Add a "where in" clause on the "created_at" column to the query.
 * @method static whereCreatedAtNotIn(array $values) Add a "where not in" clause on the "created_at" column to the query.
 * @method TestUserBuilder whereCreatedAtNotIn(array $values) Add a "where not in" clause on the "created_at" column to the query.
 * @method static orWhereCreatedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "created_at" column to the query.
 * @method TestUserBuilder orWhereCreatedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "created_at" column to the query.
 * @method static orWhereCreatedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "created_at" column to the query.
 * @method TestUserBuilder orWhereCreatedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "created_at" column to the query.
 * @method static orWhereCreatedAtIn(array $values) Add an "or where in" clause on the "created_at" column to the query.
 * @method TestUserBuilder orWhereCreatedAtIn(array $values) Add an "or where in" clause on the "created_at" column to the query.
 * @method static orWhereCreatedAtNotIn(array $values) Add a "where not in" clause on the "created_at" column to the query.
 * @method TestUserBuilder orWhereCreatedAtNotIn(array $values) Add a "where not in" clause on the "created_at" column to the query.
 * @method static whereUpdatedAt(?string $operator = null, ?string $value = null) Add a "where" clause on the "updated_at" column to the query.
 * @method TestUserBuilder whereUpdatedAt(?string $operator = null, ?string $value = null) Add a "where" clause on the "updated_at" column to the query.
 * @method static whereUpdatedAtNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "updated_at" column to the query.
 * @method TestUserBuilder whereUpdatedAtNot(?string $operator = null, ?string $value = null) Add a "where not" clause on the "updated_at" column to the query.
 * @method static whereUpdatedAtIn(array $values) Add a "where in" clause on the "updated_at" column to the query.
 * @method TestUserBuilder whereUpdatedAtIn(array $values) Add a "where in" clause on the "updated_at" column to the query.
 * @method static whereUpdatedAtNotIn(array $values) Add a "where not in" clause on the "updated_at" column to the query.
 * @method TestUserBuilder whereUpdatedAtNotIn(array $values) Add a "where not in" clause on the "updated_at" column to the query.
 * @method static orWhereUpdatedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "updated_at" column to the query.
 * @method TestUserBuilder orWhereUpdatedAt(?string $operator = null, ?string $value = null) Add an "or where" clause on the "updated_at" column to the query.
 * @method static orWhereUpdatedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "updated_at" column to the query.
 * @method TestUserBuilder orWhereUpdatedAtNot(?string $operator = null, ?string $value = null) Add an "or where not" clause on the "updated_at" column to the query.
 * @method static orWhereUpdatedAtIn(array $values) Add an "or where in" clause on the "updated_at" column to the query.
 * @method TestUserBuilder orWhereUpdatedAtIn(array $values) Add an "or where in" clause on the "updated_at" column to the query.
 * @method static orWhereUpdatedAtNotIn(array $values) Add a "where not in" clause on the "updated_at" column to the query.
 * @method TestUserBuilder orWhereUpdatedAtNotIn(array $values) Add a "where not in" clause on the "updated_at" column to the query.
 */
class TestUserBuilder extends Builder
{
    use BuildsDynamicWhereQueries;
}
