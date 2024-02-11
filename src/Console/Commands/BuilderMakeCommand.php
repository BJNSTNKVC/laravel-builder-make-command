<?php

namespace Bjnstnkvc\BuilderMakeCommand\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BuilderMakeCommand extends GeneratorCommand implements PromptsForMissingInput
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'make:builder {name : The name of the builder} {--force}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new Eloquent builder class';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Builder';

	/**
	 * Execute the console command.
	 *
	 * @return false|void
	 *
	 * @throws FileNotFoundException
	 */
	public function handle()
	{
		if (parent::handle() === false && !$this->option('force')) {
			return false;
		}
	}

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub(): string
	{
		return $this->resolveStubPath('/stubs/builder.stub');
	}

	/**
	 * Resolve the fully qualified path to the stub.
	 *
	 * @param string $stub
	 *
	 * @return string
	 */
	protected function resolveStubPath(string $stub): string
	{
		return file_exists($customPath = $this->laravel->basePath(trim($stub, '/'))) ? $customPath : __DIR__ . $stub;
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param string $rootNamespace
	 *
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace): string
	{
		return is_dir(app_path('Models')) ? "{$rootNamespace}\Models\Builders" : $rootNamespace;
	}

	/**
	 * Build the class with the given name.
	 *
	 * @param string $name
	 *
	 * @return string
	 *
	 * @throws FileNotFoundException
	 */
	protected function buildClass($name): string
	{
		$stub = $this->files->get($this->getStub());

		return $this->replaceNamespace($stub, $name)->replaceMethodSignatures($stub)->replaceClass($stub, $name);
	}

	/**
	 * Replace the method signatures for the given stub.
	 *
	 * @param string $stub
	 *
	 * @return $this
	 */
	protected function replaceMethodSignatures(string &$stub): static
	{
		$signatures = $this->getMethodSignatures();

		$stub = str_replace('DummySignature', $signatures, $stub);

		return $this;
	}

	/**
	 * Get model instance from the builder name.
	 *
	 * @param string $name
	 *
	 * @return Model
	 */
	protected function getModelFromName(string $name): Model
	{
		$class          = Str::replace('Builder', '', $name);
		$rootNamespace  = $this->laravel->getNamespace() . 'Models';
		$modelNamespace = $rootNamespace . '\\' . $class;

		return new $modelNamespace;
	}

	/**
	 * Get the column listing for a given model.
	 *
	 * @param Model $model
	 *
	 * @return array
	 */
	public function getModelColumns(Model $model): array
	{
		return $model
			->getConnection()
			->getSchemaBuilder()
			->getColumnListing($model->getTable());
	}

	/**
	 * Get the method signatures for the builder.
	 *
	 * @return string
	 */
	protected function getMethodSignatures(): string
	{
		$model   = $this->getModelFromName($this->argument('name'));
		$columns = $this->getModelColumns($model);

		return Collection::make($columns)
			->map(function ($column) {
				$method = Str::studly($column);

				return
					'* @method DummyClass where' . $method . '(?string $operator = null, ?string $value = null) Add a "where" clause on the "' . $column . '" column to the query.' . PHP_EOL .
					'* @method DummyClass orWhere' . $method . '(?string $operator = null, ?string $value = null) Add an "or where" clause on the "' . $column . '" column to the query.' . PHP_EOL .
					'* @method DummyClass where' . $method . 'In(array $values) Add a "where in" clause on the "' . $column . '" column to the query.' . PHP_EOL .
					'* @method DummyClass orWhere' . $method . 'In(array $values) Add an "or where in" clause on the "' . $column . '" column to the query.' . PHP_EOL .
					'* @method DummyClass where' . $method . 'NotIn(array $values) Add a "where not in" clause on the "' . $column . '" column to the query.' . PHP_EOL .
					'* @method DummyClass orWhere' . $method . 'NotIn(array $values) Add a "where not in" clause on the "' . $column . '" column to the query.' . PHP_EOL .
					'*';
			})
			->implode(PHP_EOL);
	}

	/**
	 * Prompt for missing input arguments using the returned questions.
	 *
	 * @return array
	 */
	protected function promptForMissingArgumentsUsing(): array
	{
		return [
			'model' => [
				'What should the builder be named?',
				'E.g. PodcastBuilder',
			],
		];
	}
}
