<?php

namespace App\Models;

use App\Models\Builders\TestUserBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static TestUserBuilder query() Begin querying the model.
 *
 * @mixin Builder
 */
class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param Builder $query
     *
     * @return TestUserBuilder
     */
    public function newEloquentBuilder($query): TestUserBuilder
    {
        return new TestUserBuilder($query);
    }
}
