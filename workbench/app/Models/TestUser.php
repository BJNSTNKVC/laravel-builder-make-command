<?php

namespace App\Models;

use App\Models\Builders\TestUserBuilder;
use Bjnstnkvc\BuilderMakeCommand\Concerns\HasDynamicBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static TestUserBuilder query() Begin querying the model.
 *
 * @mixin TestUserBuilder
 */
class TestUser extends Model
{
    use HasFactory;
    use HasDynamicBuilder;
}
