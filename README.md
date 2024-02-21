# Laravel make:builder Command

Generate Eloquent Builder class for enhanced query building and model scope management.

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

By default, the command will try figure out the name of the model from the name of the builder (E.g. UserBuilder will attempt to look for User model).
If builder name is not provided, the command will prompt you for the name of the builder.

Additionally, you can pass a model name as a second argument. 

```bash
php artisan make:builder UserBuilder User
```

Once the command has been run, the Builder class will be created inside `app\Models\Builders` folder.

In order to use it inside your models, we'll leverage Laravel [newEloquentBuilder](https://laravel.com/api/7.x/Illuminate/Database/Eloquent/Model.html#method_newEloquentBuilder) function. Add the following code to the model you've generated a builder for:

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
User::whereName(?string $operator = null, ?string $value = null);
User::whereNameNot(?string $operator = null, ?string $value = null);
User::whereNameIn(array $values);
User::whereNameNotIn(array $values);
User::orWhereName(?string $operator = null, ?string $value = null);
User::orWhereNameNot(?string $operator = null, ?string $value = null);
User::orWhereNameIn(array $values);
User::orWhereNameNotIn(array $values);

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

In case you would like to have intellisense from your code editor of choice, you'll need to add the following doc comment to your model:

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