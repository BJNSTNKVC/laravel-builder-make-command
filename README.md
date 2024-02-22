# Laravel make:builder Command

Generate Eloquent Builder class for enhanced query building and model scope management.

## Features

- Dynamic query methods for `where`, `whereNot`, `whereIn`, `whereNotIn`, `orWhere`, `orWhereNot`, `orWhereIn`,
  and `orWhereNotIn`.
- Simplifies the construction of complex queries with readable method chains.
- Automatically handles method calls that are not natively supported by Laravel's Query Builder by transforming them
  into appropriate query conditions.

## Installation & setup

You can install the package via composer:

```bash
composer require bjnstnkvc/builder-make-command
```

The package will automatically register its service provider.

## Usage

Once the package has been installed, you can run it via CLI the same way you would for any of the other CLI commands.

```bash
php artisan make:builder UserBuilder
```

By default, the command will try figure out the name of the model from the name of the builder (E.g. `UserBuilder` will
attempt to look for `User` model).

Additionally, you can pass a model name as a second argument.

```bash
php artisan make:builder UserBuilder User
```

Once the command has been run, the Builder class will be created inside `app\Models\Builders` folder.

In order to use it inside your models, we'll leverage
Laravel [newEloquentBuilder](https://laravel.com/api/7.x/Illuminate/Database/Eloquent/Model.html#method_newEloquentBuilder)
method by adding the following to the model you've generated a builder for:

```php
use App\Models\Builders\UserBuilder;

/**
 * Create a new Eloquent query builder for the model
 *
 * @param $query
 *
 * @return UserBuilder
 */
public function newEloquentBuilder($query): UserBuilder
{
    return new UserBuilder($query);
}
```

Once added, dynamic where clauses for every Model column is added as an Eloquent method.

```php
User::whereId(?string $operator = null, ?string $value = null);
User::whereIdNot(?string $operator = null, ?string $value = null);
User::whereIdIn(array $values);
User::whereIdNotIn(array $values);
User::orWhereId(?string $operator = null, ?string $value = null);
User::orWhereIdNot(?string $operator = null, ?string $value = null);
User::orWhereIdIn(array $values);
User::orWhereIdNotIn(array $values);

// Methods for other database columns.
```

Naturally, these methods can be chained on:

```php
User::whereId(1)
    ->orWhereNameNot('John')
    ->first();
    
User::whereId('>', 1)
    ->orWhereEmail('email@example.com')
    ->first();
```

In case you would like to have intellisense from your code editor of choice, you'll need to add the following doc
comment to your model:

```php
use App\Models\Builders\UserBuilder;

/**
 * @method static UserBuilder query() Begin querying the model.
 *
 * @mixin UserBuilder
 */
class User extends Authenticatable
{
    //
}
```
![image](https://raw.githubusercontent.com/BJNSTNKVC/laravel-builder-make-command/fc220686ab2f7dd60934ed91472cc36793f4e62e/docs/images/Intellisense%201.png?token=AY3EPM666QS6F6PPR3YGLATF2ZWTK)
![image](https://raw.githubusercontent.com/BJNSTNKVC/laravel-builder-make-command/fc220686ab2f7dd60934ed91472cc36793f4e62e/docs/images/Intellisense%202.png?token=GHSAT0AAAAAACOJZNJZ6XM2M6UIC5L37BMAZOWNRTA)