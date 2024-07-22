<?php

use App\Models\Builders\TestUserBuilder;
use App\Models\TestUser;
use Bjnstnkvc\BuilderMakeCommand\Tests\TestCase;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class BuilderMakeCommandTest extends TestCase
{
    /**
     * Question for the Builder name.
     *
     * @var string
     */
    protected const BUILDER_QUESTION = 'What should the builder be named?';

    /**
     * Question for the Model name.
     *
     * @var string
     */
    protected const MODEL_QUESTION = 'What is the model name?';

    /**
     * Question for force overwrite.
     *
     * @var string
     */
    protected const FORCE_QUESTION = 'Overwrite existing file?';

    public function test_that_the_command_name_argument_is_required()
    {
        $this->artisan('make:builder')
            ->expectsQuestion(self::BUILDER_QUESTION, null)
            ->assertFailed();
    }

    public function test_that_the_command_name_argument_needs_to_be_a_derivative_of_model_name_if_model_argument_is_not_passed()
    {
        $this->expectException(FileNotFoundException::class);

        $this->artisan('make:builder')
            ->expectsQuestion(self::BUILDER_QUESTION, 'NonExistingBuilder')
            ->expectsQuestion(self::MODEL_QUESTION, 'NonExisting')
            ->assertSuccessful();
    }

    public function test_that_the_command_name_argument_does_not_need_to_be_a_derivative_of_model_name_if_model_argument_is_passed()
    {
        $this->artisan('make:builder')
            ->expectsQuestion(self::BUILDER_QUESTION, $builder = 'NonExistingBuilder')
            ->expectsQuestion(self::MODEL_QUESTION, 'TestUser')
            ->assertSuccessful();

        self::cleanUp($builder);
    }

    public function test_that_the_command_creates_a_builder()
    {
        $this->artisan('make:builder')
            ->expectsQuestion(self::BUILDER_QUESTION, $builder = 'UserBuilder')
            ->expectsQuestion(self::MODEL_QUESTION, 'TestUser')
            ->assertSuccessful();

        $this->assertFileExists(app_path("Models/Builders/$builder.php"), 'Builder was not created');

        self::cleanUp($builder);
    }

    public function test_that_the_command_will_not_overwrite_an_existing_builder()
    {
        $this->artisan('make:builder')
            ->expectsQuestion(self::BUILDER_QUESTION, $builder = 'UserBuilder')
            ->expectsQuestion(self::MODEL_QUESTION, $model = 'TestUser')
            ->assertSuccessful();

        $this->artisan('make:builder')
            ->expectsQuestion(self::BUILDER_QUESTION, $builder)
            ->expectsQuestion(self::MODEL_QUESTION, $model)
            ->expectsQuestion(self::FORCE_QUESTION, false)
            ->assertFailed();

        self::cleanUp($builder);
    }

    public function test_that_the_command_will_overwrite_an_existing_builder_when_force_option_is_passed()
    {
        $this->artisan('make:builder')
            ->expectsQuestion(self::BUILDER_QUESTION, $builder = 'UserBuilder')
            ->expectsQuestion(self::MODEL_QUESTION, $model = 'TestUser')
            ->assertSuccessful();

        $this->artisan('make:builder')
            ->expectsQuestion(self::BUILDER_QUESTION, $builder)
            ->expectsQuestion(self::MODEL_QUESTION, $model)
            ->expectsQuestion(self::FORCE_QUESTION, 'yes')
            ->assertSuccessful();

        self::cleanUp($builder);
    }

    public function test_that_the_command_outputs_instructions_on_how_to_use_the_builder()
    {
        $this->artisan('make:builder')
            ->expectsQuestion(self::BUILDER_QUESTION, $builder = 'UserBuilder')
            ->expectsQuestion(self::MODEL_QUESTION, $model = 'TestUser')
            ->assertSuccessful()
            ->expectsOutputToContain("Copy and paste the following method to your $model model")
            ->expectsOutputToContain(
                "/**\n* Create a new Eloquent query builder for the model\n*\n* @param \$query\n*\n* @return $builder\n*/\npublic function newEloquentBuilder(\$query): $builder\n{\n\treturn new $builder(\$query);\n}"
            )
            ->expectsOutputToContain("/**\n* @method static $builder query() Begin querying the model.\n*\n* @mixin $builder\n*/");

        self::cleanUp($builder);
    }

    public function test_that_the_model_eloquent_builder_is_an_instance_of_generated_builder()
    {
        $this->assertInstanceOf(
            expected: TestUserBuilder::class,
            actual  : TestUser::query(),
            message : 'Builder is not an instance of TestUserBuilder.'
        );
    }

    public function test_that_the_builder_dynamic_where_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->whereId(1)->toRawSql(),
            actual  : TestUser::query()->where('id', 1)->toRawSql(),
            message : 'Dynamic "where" method cannot be called.'
        );
    }

    public function test_that_the_builder_dynamic_where_not_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->whereIdNot(1)->toRawSql(),
            actual  : TestUser::query()->whereNot('id', 1)->toRawSql(),
            message : 'Dynamic "where not" method cannot be called.'
        );
    }

    public function test_that_the_builder_dynamic_where_in_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->whereIdIn([1, 2])->toRawSql(),
            actual  : TestUser::query()->whereIn('id', [1, 2])->toRawSql(),
            message : 'The dynamic "where in" cannot be called.'
        );
    }

    public function test_that_the_builder_dynamic_where_not_in_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->whereIdNotIn([1, 2])->toRawSql(),
            actual  : TestUser::query()->whereNotIn('id', [1, 2])->toRawSql(),
            message : 'The dynamic "where not in" cannot be called.'
        );
    }

    public function test_that_the_builder_dynamic_or_where_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->orWhereId(1)->toRawSql(),
            actual  : TestUser::query()->orWhere('id', 1)->toRawSql(),
            message : 'The dynamic "or where" cannot be called.'
        );
    }

    public function test_that_the_builder_dynamic_or_where_not_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->orWhereIdNot(1)->toRawSql(),
            actual  : TestUser::query()->orWhereNot('id', 1)->toRawSql(),
            message : 'The dynamic "or where not" cannot be called.'
        );
    }

    public function test_that_the_builder_dynamic_or_where_in_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->orWhereIdIn([1, 2])->toRawSql(),
            actual  : TestUser::query()->orWhereIn('id', [1, 2])->toRawSql(),
            message : 'The dynamic "or where in" cannot be called.'
        );
    }

    public function test_that_the_builder_dynamic_or_where_not_in_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->orWhereIdNotIn([1, 2])->toRawSql(),
            actual  : TestUser::query()->orWhereNotIn('id', [1, 2])->toRawSql(),
            message : 'The dynamic "or where not in" cannot be called.'
        );
    }

    /**
     * Remove the generated Builder class.
     *
     * @param string $builder
     *
     * @return void
     */
    protected static function cleanUp(string $builder): void
    {
        unlink(base_path("app/Models/Builders/$builder.php"));
    }
}