<?php

namespace App\Models\Builders;

use Bjnstnkvc\BuilderMakeCommand\Concerns\BuildsDynamicWhereQueries;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method self whereId(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereId(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereIdNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereIdNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereIdIn(array $values, string $boolean = 'and', bool $not = false)
 * @method static self whereIdIn(array $values, string $boolean = 'and', bool $not = false)
 * @method self whereIdNotIn(array $values, string $boolean = 'and')
 * @method static self whereIdNotIn(array $values, string $boolean = 'and')
 * @method self whereIdLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereIdLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self whereIdNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereIdNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self orWhereId(mixed $operator = null, mixed $value = null)
 * @method static self orWhereId(mixed $operator = null, mixed $value = null)
 * @method self orWhereIdNot(mixed $operator = null, mixed $value = null)
 * @method static self orWhereIdNot(mixed $operator = null, mixed $value = null)
 * @method self orWhereIdIn(array $values)
 * @method static self orWhereIdIn(array $values)
 * @method self orWhereIdNotIn(array $values)
 * @method static self orWhereIdNotIn(array $values)
 * @method self orWhereIdLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereIdLike(string $value, bool $caseSensitive = false)
 * @method self orWhereIdNotLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereIdNotLike(string $value, bool $caseSensitive = false)
 * @method self whereName(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereName(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereNameNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereNameNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereNameIn(array $values, string $boolean = 'and', bool $not = false)
 * @method static self whereNameIn(array $values, string $boolean = 'and', bool $not = false)
 * @method self whereNameNotIn(array $values, string $boolean = 'and')
 * @method static self whereNameNotIn(array $values, string $boolean = 'and')
 * @method self whereNameLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereNameLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self whereNameNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereNameNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self orWhereName(mixed $operator = null, mixed $value = null)
 * @method static self orWhereName(mixed $operator = null, mixed $value = null)
 * @method self orWhereNameNot(mixed $operator = null, mixed $value = null)
 * @method static self orWhereNameNot(mixed $operator = null, mixed $value = null)
 * @method self orWhereNameIn(array $values)
 * @method static self orWhereNameIn(array $values)
 * @method self orWhereNameNotIn(array $values)
 * @method static self orWhereNameNotIn(array $values)
 * @method self orWhereNameLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereNameLike(string $value, bool $caseSensitive = false)
 * @method self orWhereNameNotLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereNameNotLike(string $value, bool $caseSensitive = false)
 * @method self whereEmail(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereEmail(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereEmailNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereEmailNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereEmailIn(array $values, string $boolean = 'and', bool $not = false)
 * @method static self whereEmailIn(array $values, string $boolean = 'and', bool $not = false)
 * @method self whereEmailNotIn(array $values, string $boolean = 'and')
 * @method static self whereEmailNotIn(array $values, string $boolean = 'and')
 * @method self whereEmailLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereEmailLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self whereEmailNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereEmailNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self orWhereEmail(mixed $operator = null, mixed $value = null)
 * @method static self orWhereEmail(mixed $operator = null, mixed $value = null)
 * @method self orWhereEmailNot(mixed $operator = null, mixed $value = null)
 * @method static self orWhereEmailNot(mixed $operator = null, mixed $value = null)
 * @method self orWhereEmailIn(array $values)
 * @method static self orWhereEmailIn(array $values)
 * @method self orWhereEmailNotIn(array $values)
 * @method static self orWhereEmailNotIn(array $values)
 * @method self orWhereEmailLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereEmailLike(string $value, bool $caseSensitive = false)
 * @method self orWhereEmailNotLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereEmailNotLike(string $value, bool $caseSensitive = false)
 * @method self whereEmailVerifiedAt(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereEmailVerifiedAt(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereEmailVerifiedAtNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereEmailVerifiedAtNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereEmailVerifiedAtIn(array $values, string $boolean = 'and', bool $not = false)
 * @method static self whereEmailVerifiedAtIn(array $values, string $boolean = 'and', bool $not = false)
 * @method self whereEmailVerifiedAtNotIn(array $values, string $boolean = 'and')
 * @method static self whereEmailVerifiedAtNotIn(array $values, string $boolean = 'and')
 * @method self whereEmailVerifiedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereEmailVerifiedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self whereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self orWhereEmailVerifiedAt(mixed $operator = null, mixed $value = null)
 * @method static self orWhereEmailVerifiedAt(mixed $operator = null, mixed $value = null)
 * @method self orWhereEmailVerifiedAtNot(mixed $operator = null, mixed $value = null)
 * @method static self orWhereEmailVerifiedAtNot(mixed $operator = null, mixed $value = null)
 * @method self orWhereEmailVerifiedAtIn(array $values)
 * @method static self orWhereEmailVerifiedAtIn(array $values)
 * @method self orWhereEmailVerifiedAtNotIn(array $values)
 * @method static self orWhereEmailVerifiedAtNotIn(array $values)
 * @method self orWhereEmailVerifiedAtLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereEmailVerifiedAtLike(string $value, bool $caseSensitive = false)
 * @method self orWhereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereEmailVerifiedAtNotLike(string $value, bool $caseSensitive = false)
 * @method self wherePassword(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self wherePassword(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self wherePasswordNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self wherePasswordNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self wherePasswordIn(array $values, string $boolean = 'and', bool $not = false)
 * @method static self wherePasswordIn(array $values, string $boolean = 'and', bool $not = false)
 * @method self wherePasswordNotIn(array $values, string $boolean = 'and')
 * @method static self wherePasswordNotIn(array $values, string $boolean = 'and')
 * @method self wherePasswordLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self wherePasswordLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self wherePasswordNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self wherePasswordNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self orWherePassword(mixed $operator = null, mixed $value = null)
 * @method static self orWherePassword(mixed $operator = null, mixed $value = null)
 * @method self orWherePasswordNot(mixed $operator = null, mixed $value = null)
 * @method static self orWherePasswordNot(mixed $operator = null, mixed $value = null)
 * @method self orWherePasswordIn(array $values)
 * @method static self orWherePasswordIn(array $values)
 * @method self orWherePasswordNotIn(array $values)
 * @method static self orWherePasswordNotIn(array $values)
 * @method self orWherePasswordLike(string $value, bool $caseSensitive = false)
 * @method static self orWherePasswordLike(string $value, bool $caseSensitive = false)
 * @method self orWherePasswordNotLike(string $value, bool $caseSensitive = false)
 * @method static self orWherePasswordNotLike(string $value, bool $caseSensitive = false)
 * @method self whereRememberToken(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereRememberToken(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereRememberTokenNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereRememberTokenNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereRememberTokenIn(array $values, string $boolean = 'and', bool $not = false)
 * @method static self whereRememberTokenIn(array $values, string $boolean = 'and', bool $not = false)
 * @method self whereRememberTokenNotIn(array $values, string $boolean = 'and')
 * @method static self whereRememberTokenNotIn(array $values, string $boolean = 'and')
 * @method self whereRememberTokenLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereRememberTokenLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self whereRememberTokenNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereRememberTokenNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self orWhereRememberToken(mixed $operator = null, mixed $value = null)
 * @method static self orWhereRememberToken(mixed $operator = null, mixed $value = null)
 * @method self orWhereRememberTokenNot(mixed $operator = null, mixed $value = null)
 * @method static self orWhereRememberTokenNot(mixed $operator = null, mixed $value = null)
 * @method self orWhereRememberTokenIn(array $values)
 * @method static self orWhereRememberTokenIn(array $values)
 * @method self orWhereRememberTokenNotIn(array $values)
 * @method static self orWhereRememberTokenNotIn(array $values)
 * @method self orWhereRememberTokenLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereRememberTokenLike(string $value, bool $caseSensitive = false)
 * @method self orWhereRememberTokenNotLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereRememberTokenNotLike(string $value, bool $caseSensitive = false)
 * @method self whereCreatedAt(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereCreatedAt(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereCreatedAtNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereCreatedAtNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereCreatedAtIn(array $values, string $boolean = 'and', bool $not = false)
 * @method static self whereCreatedAtIn(array $values, string $boolean = 'and', bool $not = false)
 * @method self whereCreatedAtNotIn(array $values, string $boolean = 'and')
 * @method static self whereCreatedAtNotIn(array $values, string $boolean = 'and')
 * @method self whereCreatedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereCreatedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self whereCreatedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereCreatedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self orWhereCreatedAt(mixed $operator = null, mixed $value = null)
 * @method static self orWhereCreatedAt(mixed $operator = null, mixed $value = null)
 * @method self orWhereCreatedAtNot(mixed $operator = null, mixed $value = null)
 * @method static self orWhereCreatedAtNot(mixed $operator = null, mixed $value = null)
 * @method self orWhereCreatedAtIn(array $values)
 * @method static self orWhereCreatedAtIn(array $values)
 * @method self orWhereCreatedAtNotIn(array $values)
 * @method static self orWhereCreatedAtNotIn(array $values)
 * @method self orWhereCreatedAtLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereCreatedAtLike(string $value, bool $caseSensitive = false)
 * @method self orWhereCreatedAtNotLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereCreatedAtNotLike(string $value, bool $caseSensitive = false)
 * @method self whereUpdatedAt(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereUpdatedAt(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereUpdatedAtNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static self whereUpdatedAtNot(mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method self whereUpdatedAtIn(array $values, string $boolean = 'and', bool $not = false)
 * @method static self whereUpdatedAtIn(array $values, string $boolean = 'and', bool $not = false)
 * @method self whereUpdatedAtNotIn(array $values, string $boolean = 'and')
 * @method static self whereUpdatedAtNotIn(array $values, string $boolean = 'and')
 * @method self whereUpdatedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereUpdatedAtLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self whereUpdatedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method static self whereUpdatedAtNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false)
 * @method self orWhereUpdatedAt(mixed $operator = null, mixed $value = null)
 * @method static self orWhereUpdatedAt(mixed $operator = null, mixed $value = null)
 * @method self orWhereUpdatedAtNot(mixed $operator = null, mixed $value = null)
 * @method static self orWhereUpdatedAtNot(mixed $operator = null, mixed $value = null)
 * @method self orWhereUpdatedAtIn(array $values)
 * @method static self orWhereUpdatedAtIn(array $values)
 * @method self orWhereUpdatedAtNotIn(array $values)
 * @method static self orWhereUpdatedAtNotIn(array $values)
 * @method self orWhereUpdatedAtLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereUpdatedAtLike(string $value, bool $caseSensitive = false)
 * @method self orWhereUpdatedAtNotLike(string $value, bool $caseSensitive = false)
 * @method static self orWhereUpdatedAtNotLike(string $value, bool $caseSensitive = false)
 */
class TestUserBuilder extends Builder
{
    use BuildsDynamicWhereQueries;
}
