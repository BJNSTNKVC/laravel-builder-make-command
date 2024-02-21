<?php

use App\Models\Builders\TestUserBuilder;
use App\Models\TestUser;
use Bjnstnkvc\BuilderMakeCommand\Tests\TestCase;

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
        $this->expectExceptionMessage('Class "App\Models\NonExistingModel" not found');

        $this->artisan('make:builder')
            ->expectsQuestion('What should the builder be named?', 'NonExistingModelBuilder')
            ->assertFailed();
    }

    public function test_that_the_command_name_argument_does_not_need_to_be_a_derivative_of_model_name_if_model_argument_is_passed()
    {
        $this->artisan('make:builder', ['model' => 'TestUser'])
            ->expectsQuestion('What should the builder be named?', 'NonExistingModelBuilder')
            ->assertSuccessful();

        $this->cleanUp('NonExistingModelBuilder');
    }

    public function test_that_the_command_creates_a_builder()
    {
        $this->artisan('make:builder', ['model' => 'TestUser'])
            ->expectsQuestion('What should the builder be named?', 'UserBuilder')
            ->assertSuccessful();

        $this->assertFileExists(
            filename: app_path('Models/Builders/UserBuilder.php'),
            message : 'Builder was not created'
        );

        $this->cleanUp('UserBuilder');
    }

    public function test_that_the_command_will_not_overwrite_an_existing_builder()
    {
        $this->artisan('make:builder', ['model' => 'TestUser'])
            ->expectsQuestion('What should the builder be named?', 'UserBuilder')
            ->assertSuccessful();

        $this->artisan('make:builder', ['model' => 'TestUser'])
            ->expectsQuestion('What should the builder be named?', 'UserBuilder')
            ->assertFailed();

        $this->cleanUp('UserBuilder');
    }

    public function test_that_the_command_will_overwrite_an_existing_builder_when_force_option_is_passed()
    {
        $this->artisan('make:builder', ['model' => 'TestUser'])
            ->expectsQuestion('What should the builder be named?', 'UserBuilder')
            ->assertSuccessful();

        $this->artisan('make:builder', ['model' => 'TestUser', '--force' => true])
            ->expectsQuestion('What should the builder be named?', 'UserBuilder')
            ->assertSuccessful();

        $this->cleanUp('UserBuilder');
    }

    public function test_that_the_model_eloquent_builder_is_an_instance_of_generated_builder()
    {
        $this->assertInstanceOf(
            expected: TestUserBuilder::class,
            actual  : TestUser::query(),
            message : 'Builder is not an instance of TestUserBuilder'
        );
    }

    public function test_that_the_builder_dynamic_where_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->whereId(1)->toRawSql(),
            actual  : TestUser::query()->where('id', 1)->toRawSql()
        );
    }

    public function test_that_the_builder_dynamic_where_not_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->whereIdNot(1)->toRawSql(),
            actual  : TestUser::query()->whereNot('id', 1)->toRawSql()
        );
    }

    public function test_that_the_builder_dynamic_where_in_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->whereIdIn([1, 2])->toRawSql(),
            actual  : TestUser::query()->whereIn('id', [1, 2])->toRawSql()
        );
    }

    public function test_that_the_builder_dynamic_where_not_in_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->whereIdNotIn([1, 2])->toRawSql(),
            actual  : TestUser::query()->whereNotIn('id', [1, 2])->toRawSql()
        );
    }

    public function test_that_the_builder_dynamic_or_where_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->orWhereId(1)->toRawSql(),
            actual  : TestUser::query()->orWhere('id', 1)->toRawSql()
        );
    }

    public function test_that_the_builder_dynamic_or_where_not_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->orWhereIdNot(1)->toRawSql(),
            actual  : TestUser::query()->orWhereNot('id', 1)->toRawSql()
        );
    }

    public function test_that_the_builder_dynamic_or_where_in_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->orWhereIdIn([1, 2])->toRawSql(),
            actual  : TestUser::query()->orWhereIn('id', [1, 2])->toRawSql()
        );
    }

    public function test_that_the_builder_dynamic_or_where_not_in_method_can_be_called()
    {
        $this->assertEquals(
            expected: TestUser::query()->orWhereIdNotIn([1, 2])->toRawSql(),
            actual  : TestUser::query()->orWhereNotIn('id', [1, 2])->toRawSql()
        );
    }

    /**
     * Remove the generated Builder class.
     *
     * @param string $builder
     *
     * @return void
     */
    public function cleanUp(string $builder): void
    {
        unlink(base_path("app/Models/Builders/$builder.php"));
    }
}