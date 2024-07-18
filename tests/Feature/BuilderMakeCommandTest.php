<?php

use App\Models\Builders\TestUserBuilder;
use App\Models\TestUser;
use Bjnstnkvc\BuilderMakeCommand\Tests\TestCase;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Testing\PendingCommand;

class BuilderMakeCommandTest extends TestCase
{
    public function test_that_the_command_name_argument_is_required()
    {
        $this->artisan('make:builder')
            ->expectsQuestion('What should the builder be named?', null)
            ->assertFailed();
    }

    public function test_that_the_command_name_argument_needs_to_be_a_derivative_of_model_name_if_model_argument_is_not_passed()
    {
        $this->expectException(FileNotFoundException::class);

        $this->makeBuilder('NonExistingBuilder')->execute();
    }

    public function test_that_the_command_name_argument_does_not_need_to_be_a_derivative_of_model_name_if_model_argument_is_passed()
    {
        $this->makeBuilder('NonExistingBuilder', 'TestUser')->assertSuccessful();

        $this->cleanUp('NonExistingBuilder');
    }

    public function test_that_the_command_creates_a_builder()
    {
        $this->makeBuilder('UserBuilder', 'TestUser')->assertSuccessful();

        $this->assertFileExists(app_path('Models/Builders/UserBuilder.php'), 'Builder was not created');

        $this->cleanUp('UserBuilder');
    }

    public function test_that_the_command_will_not_overwrite_an_existing_builder()
    {
        $this->makeBuilder('UserBuilder', 'TestUser')->assertSuccessful();

        $this->makeBuilder('UserBuilder', 'TestUser')->assertFailed();

        $this->cleanUp('UserBuilder');
    }

    public function test_that_the_command_will_overwrite_an_existing_builder_when_force_option_is_passed()
    {
        $this->makeBuilder('UserBuilder', 'TestUser')->assertSuccessful();

        $this->makeBuilder('UserBuilder', 'TestUser', true)->assertSuccessful();

        $this->cleanUp('UserBuilder');
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
    protected function cleanUp(string $builder): void
    {
        unlink(base_path("app/Models/Builders/$builder.php"));
    }

    /**
     * Call the make:builder command.
     *
     * @param string|null $builder
     * @param string|null $model
     * @param bool|null   $force
     * @param array       $defaults
     *
     * @return PendingCommand|int
     */
    protected function makeBuilder(?string $builder = null, ?string $model = null, ?bool $force = false, array $defaults = []): PendingCommand|int
    {
        return $this->artisan('make:builder', $defaults)
            ->expectsQuestion('What should the builder be named?', $builder)
            ->expectsQuestion('What is the model name?', $model)
            ->expectsQuestion('Force overwrite?', $force);
    }
}