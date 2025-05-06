<?php

namespace Bjnstnkvc\BuilderMakeCommand\Console\Commands;

use Bjnstnkvc\BuilderMakeCommand\Clauses\{OrWhere, OrWhereIn, OrWhereLike, OrWhereNot, OrWhereNotIn, OrWhereNotLike, Where, WhereIn, WhereLike, WhereNot, WhereNotIn, WhereNotLike};
use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use ReflectionClass;
use Symfony\Component\Console\Input\InputOption;

use function Laravel\Prompts\{text};

class BuilderMakeCommand extends GeneratorCommand implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:builder {name : The name of the builder} {model : The name of the model} {--force} {--mixin}';

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
        $this->input->setOption('force', $this->option('force') ?? config('builder.force'));
        $this->input->setOption('mixin', $this->option('mixin') ?? config('builder.mixin'));

        if ($this->alreadyExists($this->argument('name')) && !$this->option('force')) {
            $force = $this->confirm('Overwrite existing file?');

            $this->input->setOption('force', $force);
        }

        if (parent::handle() === false) {
            return self::FAILURE;
        }

        $this->setDocComment();

        return self::SUCCESS;
    }

    /**
     * Set the Builder Doc comments depending on the chosen options.
     *
     * @return void
     *
     * @throws FileNotFoundException
     */
    protected function setDocComment(): void
    {
        $reflection = new ReflectionClass($this->getModel());
        $path       = $reflection->getFileName();
        $doc        = $reflection->getDocComment();
        $class      = $reflection->getShortName();
        $name       = $this->getNameInput();
        $builder    = config('builder.namespace') . '\\' . $name;
        $import     = $this->option('mixin') ? "{$name}Mixin" : $name;
        $query      = "/**\n * @method static $name query() Begin querying the model.\n";
        $content    = $this->files->get($path);

        if ($this->option('mixin')) {
            $replace = "$query *\n * @mixin {$name}Mixin\n */";
        } else {
            $replace = "$query *\n * @mixin $name\n */";
        }

        if (!$doc) {
            $content = Str::replace("class $class", "{$replace}\nclass $class", $content);
        } else {
            $content = Str::replace($doc, $replace, $content);
        }

        if (Str::doesntContain($content, "use $builder;")) {
            $content = Str::replaceFirst('use ', "use $builder;\r\nuse ", $content);
        }

        if (Str::doesntContain($content, "use $import;")) {
            $content = Str::replaceFirst('use ', "use $import;\r\nuse ", $content);
        }

        $this->files->put($path, $content);
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
        if ($this->option('mixin')) {
            $this->buildMixin($name);
        }

        $stub = $this->files->get($this->getStub());

        return $this
            ->replaceNamespace($stub, $name)
            ->replaceSignatures($stub)
            ->replaceClass($stub, $name);
    }

    /**
     * Build the mixin with the given name.
     *
     * @param string $name
     *
     * @return void
     * @throws FileNotFoundException
     */
    protected function buildMixin(string $name): void
    {
        $class      = basename($name);
        $mixin      = "{$this->getNameInput()}Mixin";
        $signatures = $this->getMethodSignatures();
        $namespace  = config('builder.namespace');
        $stub       = "<?php\n\nnamespace $namespace {\n\n/**\n$signatures\n */\nclass $mixin {}\n}\n";

        if ($this->files->exists($path = base_path('.builder.mixin.php'))) {
            require_once $path;

            $content = $this->files->get($path);

            if (class_exists("\App\Models\Builders\\$mixin")) {
                $pattern     = "/\/\*\*(?:(?!\/\*\*)[\s\S])*?\*\/\s*class\s+$mixin\s*\{[^{}]*\}/s";
                $replacement = "/**\n$signatures\n */\nclass $mixin {}";
            } else {
                $pattern     = "/\}(\s*)$/s";
                $replacement = "\n/**\n$signatures\n */\nclass $mixin {}\n}\n";
            }

            $stub = Str::replaceMatches($pattern, $replacement, $content);
        }

        $stub = Str::replaceMatches(['/^\/\*\*/m', '/^ \* ?/m', '/^ \*\/$/m', '/^class ?/m'], "    $0", $stub);
        $stub = Str::replace('self', $class, $stub);

        $this->files->put(base_path('.builder.mixin.php'), $stub);
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
        $mixin      = " * @mixin {$this->getNameInput()}Mixin";

        $stub = Str::replace('{{ signature }}', $this->option('mixin') ? $mixin : $signatures, $stub);

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
                required   : true,
            ),
        ];
    }
}
