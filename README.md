# Laravel make:builder Command

Generate Eloquent Builder class for enhanced query building and model scope management.

## Features

- Dynamic query methods for `where`, `whereIn`, `whereLike`, `whereNot`, `whereNotIn`, `whereNotLike`, `orWhere`, `orWhereIn`, `orWhereLike`, `orWhereNot`, `orWhereNotIn` and `orWhereNotLike`.
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

In order to use it inside your models, add `HasDynamicBuilder` trait to your model:

```php
use Bjnstnkvc\BuilderMakeCommand\Concerns\HasDynamicBuilder;

class User extends Model
{
    use HasDynamicBuilder;
}
```

Once added, dynamic where clauses for every Model column is added as an Eloquent method.

```php
User::whereId(mixed $operator = null, mixed $value = null, string $boolean = 'and');
User::whereIdNot(mixed $operator = null, mixed $value = null, string $boolean = 'and');
User::whereIdIn(array $values, string $boolean = 'and', bool $not = false);
User::whereIdNotIn(array $values, string $boolean = 'and');
User::whereIdLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false);
User::whereIdNotLike(string $value, bool $caseSensitive = false, string $boolean = 'and', bool $not = false);
User::orWhereId(mixed $operator = null, mixed $value = null);
User::orWhereIdNot(mixed $operator = null, mixed $value = null);
User::orWhereIdIn(array $values);
User::orWhereIdNotIn(array $values);
User::orWhereIdLike(string $value, bool $caseSensitive = false);
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
use App\Models\Builders\UserBuilder;

User::whereName('John')
    ->where(function (UserBuilder $query) {
        $query->whereEmail('email@example.com')
              ->orWhereTitle('Admin');
    })
    ->first();
```

In case you would like to generate the Builder method signatures as a mixin, you can use the `--mixin` flag:

```bash
php artisan make:builder UserBuilder User --mixin
```

The mixin will be created inside `.builder.mixin.php` file and automatically imported into the Builder class.