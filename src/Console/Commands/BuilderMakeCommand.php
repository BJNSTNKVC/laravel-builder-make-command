<?php

namespace Bjnstnkvc\BuilderMakeCommand\Console\Commands;

use Bjnstnkvc\BuilderMakeCommand\Clauses\{OrWhere, OrWhereIn, OrWhereNotIn, Where, WhereIn, WhereNotIn};
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
    protected $signature = 'make:builder {name : The name of the builder} {model? : The name of the model} {--force}';

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
        return "{$rootNamespace}\Models\Builders";
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
     * Get the method signatures for the builder.
     *
     * @return string
     */
    protected function getMethodSignatures(): string
    {
        $model   = $this->getModel();
        $columns = $this->getModelColumns($model);

        return Collection::make($columns)
            ->map(fn(string $column) => $this->setMethodSignaturesForColumn($column))
            ->flatten()
            ->join(PHP_EOL);
    }

    /**
     * Get the model instance from the builder name.
     *
     * @return Model
     */
    protected function getModel(): Model
    {
        $class     = Str::replace('Builder', '', $this->argument('model') ?? $this->argument('name'));
        $namespace = $this->laravel->getNamespace() . 'Models';
        $model     = "$namespace\\$class";

        return new $model;
    }

    /**
     * Get the column listing for a given model.
     *
     * @param Model $model
     *
     * @return array
     */
    protected function getModelColumns(Model $model): array
    {
        return $model
            ->getConnection()
            ->getSchemaBuilder()
            ->getColumnListing($model->getTable());
    }

    /**
     * Set the method signatures for the builder.
     *
     * @param string $column
     *
     * @return array
     */
    protected function setMethodSignaturesForColumn(string $column): array
    {
        return [
            Where::make($column)->signature(),
            WhereIn::make($column)->signature(),
            WhereNotIn::make($column)->signature(),
            OrWhere::make($column)->signature(),
            OrWhereIn::make($column)->signature(),
            OrWhereNotIn::make($column)->signature(),
        ];
    }

    /**
     * Prompt for missing input arguments using the returned questions.
     *
     * @return array
     */
    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => [
                'What should the builder be named?',
                'E.g. PodcastBuilder',
            ],
        ];
    }
}
