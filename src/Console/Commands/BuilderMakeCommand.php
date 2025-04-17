<?php

namespace Bjnstnkvc\BuilderMakeCommand\Console\Commands;

use Bjnstnkvc\BuilderMakeCommand\Clauses\{OrWhere, OrWhereIn, OrWhereLike, OrWhereNot, OrWhereNotIn, OrWhereNotLike, Where, WhereIn, WhereLike, WhereNot, WhereNotIn, WhereNotLike};
use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

use function Laravel\Prompts\{text};

class BuilderMakeCommand extends GeneratorCommand implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:builder {name : The name of the builder} {model : The name of the model} {--force}';

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
     * @return int
     *
     * @throws FileNotFoundException
     */
    public function handle(): int
    {
        if ($this->alreadyExists($this->argument('name')) && !$this->option('force')) {
            $force = $this->confirm('Overwrite existing file?', config('builder.overwrite'));

            $this->input->setOption('force', $force);
        }

        if (parent::handle() === false) {
            return self::FAILURE;
        }

        $this->instructions();

        return self::SUCCESS;
    }

    /**
     * Output instructions on how to use the Builder.
     *
     * @return void
     */
    protected function instructions(): void
    {
        $this->comment("Copy and paste the following method to your {$this->argument('model')} model:");

        $this->newLine();

        $this->info("/**\n* Create a new Eloquent query builder for the model\n*\n* @param \$query\n*\n* @return UserBuilder\n*/\npublic function newEloquentBuilder(\$query): UserBuilder\n{\n\treturn new UserBuilder(\$query);\n}");

        $this->newLine();

        $this->comment("You can also add the following doc comment to your {$this->argument('model')} model to enhance your editors intellisense:");

        $this->newLine();

        $this->info("/**\n* @method static UserBuilder query() Begin querying the model.\n*\n* @mixin {$this->argument('name')}\n*/");

        $this->newLine();

        $this->alert("Don't forget to import the {$this->argument('name')} to your {$this->argument('model')} model.");
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
        return config('builder.namespace');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Create the class even if the Builder already exists'],
        ];
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

        return $this
            ->replaceNamespace($stub, $name)
            ->replaceSignatures($stub)
            ->replaceClass($stub, $name);
    }

    /**
     * Replace the method signatures for the given stub.
     *
     * @param string $stub
     *
     * @return $this
     *
     * @throws FileNotFoundException
     */
    protected function replaceSignatures(string &$stub): static
    {
        $signatures = $this->getMethodSignatures();

        $stub = Str::replace('{{ signature }}', $signatures, $stub);

        return $this;
    }

    /**
     * Get the method signatures for the builder.
     *
     * @return string
     *
     * @throws FileNotFoundException
     */
    protected function getMethodSignatures(): string
    {
        $model   = $this->getModel();
        $columns = $this->getModelColumns($model);

        return collect($columns)
            ->map(fn(string $column) => $this->setMethodSignaturesForColumn($column))
            ->flatten()
            ->join(PHP_EOL);
    }

    /**
     * Get the model instance from the builder name.
     *
     * @return Model
     *
     * @throws FileNotFoundException
     */
    protected function getModel(): Model
    {
        $class     = $this->argument('model') ?? Str::replace('Builder', '', $this->argument('name'));
        $namespace = $this->laravel->getNamespace() . 'Models';
        $model     = "$namespace\\$class";

        if (!class_exists($model)) {
            throw new FileNotFoundException("The model [$model] does not exist.");
        }

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
            WhereNot::make($column)->signature(),
            WhereIn::make($column)->signature(),
            WhereNotIn::make($column)->signature(),
            WhereLike::make($column)->signature(),
            WhereNotLike::make($column)->signature(),
            OrWhere::make($column)->signature(),
            OrWhereNot::make($column)->signature(),
            OrWhereIn::make($column)->signature(),
            OrWhereNotIn::make($column)->signature(),
            OrWhereLike::make($column)->signature(),
            OrWhereNotLike::make($column)->signature(),
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
            'name'  => fn() => text(
                label      : 'What should the builder be named?',
                placeholder: 'E.g. PodcastBuilder',
                required   : true,
                validate   : fn(string $value) => empty($value) ? 'The name is required.' : null,
            ),
            'model' => fn() => text(
                label      : 'What is the model name?',
                placeholder: 'E.g. Podcast',
                default    : Str::replace('Builder', '', $this->argument('name')),
                required   : false,
            ),
        ];
    }
}
