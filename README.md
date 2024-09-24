# Laravel make:builder Command

Generate Eloquent Builder class for enhanced query building and model scope management.

## Features

- Dynamic query methods for `where`, `whereNot`, `whereIn`, `whereNotIn`, `orWhere`, `orWhereNot`, `orWhereIn`,
  and `orWhereNotIn`.
- Simplifies the construction of complex queries with readable method chains.
- Automatically handles method calls that are not natively supported by Laravel Query Builder by transforming them
  into appropriate query conditions.

## Installation & setup

You can install the package via composer:

```bash
composer require bjnstnkvc/builder-make-command
```

The package will automatically register its service provider.

In case you would like to change the package defaults, you can do so by publishing the config:

```bash
php artisan vendor:publish --provider="Bjnstnkvc\BuilderMakeCommand\BuilderMakeCommandServiceProvider" --tag=make-builder-config
```

or stubs

```bash
php artisan vendor:publish --provider="Bjnstnkvc\BuilderMakeCommand\BuilderMakeCommandServiceProvider" --tag=make-builder-stubs
```

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

In case the Builder already exists, you can pass an optional `--force` argument which will overwrite the existing class.

```bash
php artisan make:builder UserBuilder User --force
```

> **Note**: By forcing the Builder command, all custom methods you've added to the Builder will be overwritten so be
> cautious.

If you simply call the command, without any arguments, Laravel will prompt you for input.

```bash
php artisan make:builder
```

```bash
What should the builder be named?
> UserBuilder
```

```bash
What is the model name? [User]
> 
```

```bash
Overwrite existing file? (yes/no) [no]
> 
```

> The name of the Model has been derived from the Builder name and set as a default. Confirm by pressing ENTER or enter
> the name of the Model.
> 
>In case the file already exists, you will be prompted whether you would like to overwrite the existing file.

Once the command has been run, the Builder class will be created inside `app\Models\Builders` folder.

In order to use it inside your models, we'll leverage
Laravel [newEloquentBuilder](https://laravel.com/api/11.x/Illuminate/Database/Eloquent/Model.html#method_newEloquentBuilder)
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
User::whereIdLike(string $value, bool $caseSensitive = false);
User::whereIdLike(string $value, bool $caseSensitive = false);
User::whereIdNotLike(string $value, bool $caseSensitive = false);
User::whereIdNotLike(string $value, bool $caseSensitive = false);
User::orWhereId(?string $operator = null, ?string $value = null);
User::orWhereIdNot(?string $operator = null, ?string $value = null);
User::orWhereIdIn(array $values);
User::orWhereIdNotIn(array $values);
User::orWhereIdLike(string $value, bool $caseSensitive = false);
User::orWhereIdLike(string $value, bool $caseSensitive = false);
User::orWhereIdNotLike(string $value, bool $caseSensitive = false);
User::orWhereIdNotLike(string $value, bool $caseSensitive = false);

// Methods for other database columns.
```

Naturally, these methods can be chained on:

```php
User::whereId(1)
    ->orWhereNameNot('John')
    ->first();
```

```php
User::whereId('>', 1)
    ->orWhereEmail('email@example.com')
    ->first();
```

In case you need to group several "where" clauses within parentheses in order to achieve your query's desired Logical
Grouping, you can do the following:

```php
User::whereName('John')
    ->where(function (UserBuilder $query) {
        $query->whereEmail('email@example.com')
              ->orWhereTitle('Admin');
    })
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