<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SimpleResource extends Command
{
    use ResourceTrait;

    protected $signature = 'resource:simple
                            {resourceName : Resource name}
                            {fields : Table fields (name:type:validation)}
                            {--force : Force confirmation}';

    protected $description = 'Generate simple resource';

    public $resourceName;
    public $unitName;
    public $table;
    public $model;
    public $fields;
    public $paginate;
    public $sortable;

    public $namespace = 'Painel';
    public $templatesDir = 'resource.simple';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->fetchArguments();
        $this->handleFields($this->fields);

        if (!$this->option('force')) {
            $this->displayFields();
        }

        if ($this->option('force')) {
            $this->generate();
        } elseif($this->confirm('Confirm?')) {
            $this->generate();
        }
    }

    protected function fetchArguments()
    {
        $this->resourceName = $this->argument('resourceName');
        $this->fields       = $this->argument('fields');

        $this->table = strtolower(str_slug($this->resourceName, '_'));
        $this->model = str_replace(' ', '', mb_convert_case(str_slug($this->resourceName, ' '), MB_CASE_TITLE, 'UTF-8'));
    }

    protected function handleFields($fields)
    {
        $fields = explode(',', $fields);

        foreach($fields as $key => $f) {
            $params = explode(':', $f);

            $fields[$key] = [
                'alias'      => (array_key_exists(0, $params) ? $params[0] : ''),
                'name'       => (array_key_exists(0, $params) ? str_slug($params[0], '_') : ''),
                'type'       => (array_key_exists(1, $params) ? $params[1] : ''),
                'validation' => (array_key_exists(2, $params) ? $params[2] : '')
            ];
        }

        $this->fields = $fields;
    }

    protected function displayFields()
    {
        $this->output->writeln('Generate <comment>simple</comment> resource for model <info>'.$this->model.'</info> on table <info>'.$this->table.'</info>:'."\n");
        $this->table(['Alias', 'Name', 'Type', 'Validation'], $this->fields);
    }

    public function generate()
    {
        $this->generateMigration();
        $this->generateSeeder();
        $this->generateDatabaseSeeder();
        $this->generateModel();
        $this->generateRoute();
        $this->generateRequest();
        $this->generateBinding();
        $this->generateController();
        $this->generateViews();
        $this->generateNav();
    }

    protected function generateMigration()
    {
        $migrationName  = date("Y_m_d_His") . '_create_' . $this->table . '_table';
        $migrationClass = 'Create' . $this->tableTitleCase() . 'Table';
        $migrationFile  = base_path('database/migrations')  . '/' . $migrationName . '.php';

        $content = view($this->templatesDir . '.migration', [
            'gen'            => $this,
            'migrationClass' => $migrationClass,
        ]);

        $this->createPhpFile($migrationFile, $content);
        $this->info("Migration file <comment>".$migrationName."</comment> generated successfully.");
    }

    protected function generateSeeder()
    {
        $seederName = $this->model . 'Seeder';
        $seederFile = base_path('database/seeds')  . '/' . $seederName . '.php';

        if ($this->confirmOverwrite($seederFile)) {
            $content = view($this->templatesDir . '.seed', [
                'gen' => $this,
            ]);
            $this->createPhpFile($seederFile, $content);
            $this->info("Seeder file <comment>".$seederName."</comment> generated successfully.");
        }
    }

    protected function generateDatabaseSeeder()
    {
        $seed = "\$this->call({$this->model}Seeder::class);";

        $databaseSeederFile = base_path('database/seeds/DatabaseSeeder.php');
        $databaseSeederFileContents = file_get_contents($databaseSeederFile);
        if (strpos($databaseSeederFileContents, $seed)) {
            $this->info('Seeder already exists.');
            return false;
        }

        $databaseSeederHandle = '/(\$this->call\(UserTableSeeder::class\);)/';

        if (preg_match($databaseSeederHandle, $databaseSeederFileContents)) {
            $data = preg_replace($databaseSeederHandle, "$1\n\t\t{$seed}", $databaseSeederFileContents);
            file_put_contents($databaseSeederFile, $data);
            $this->info('Database seeder for <comment>'.$this->model .'</comment> added successfully.');
        } else {
            $this->error('Database seeder could not be added.');
        }
    }

    protected function generateModel()
    {
        if ( ! file_exists(app_path('Models'))) mkdir(app_path('Models'), 0777, true);
        $modelFile = app_path('Models') . '/' . $this->model . '.php';

        if ($this->confirmOverwrite($modelFile)) {
            $content = view($this->templatesDir . '.model', [
                'gen'   => $this,
                'route' => $this->routeName()
            ]);
            $this->createPhpFile($modelFile, $content);
            $this->info('Model class <comment>'.$this->model.'</comment> generated successfully.');
        }
    }

    protected function generateRoute()
    {
        $route = "Route::resource('{$this->routeName()}', '{$this->tableTitleCase()}Controller', ['only' => ['index', 'update']]);";
        $routesFile = app_path('Http/routes.php');
        $routesFileContent = file_get_contents($routesFile);

        if (strpos($routesFileContent, $route)) {
            $this->info('Route already exists.');
            return false;
        }

        $commentHandle = $this->routesCommentHandle();
        if (strpos($routesFileContent, $commentHandle)) {
            $data = str_replace($commentHandle, "{$commentHandle}\n\t\t{$route}", $routesFileContent);
        } else {
            $this->info('Route comment handle not found.');
            return false;
        }

        file_put_contents($routesFile, $data);
        $this->info('Route <comment>'.$this->routeName().'</comment> added successfully.');
    }

    protected function generateRequest()
    {
        $requestName = $this->tableTitleCase() . 'Request';
        $requestFile = app_path('Http/Requests') . '/' . $requestName . '.php';

        if ($this->confirmOverwrite($requestFile)) {
            $content = view($this->templatesDir . '.request', [
                'request' => $requestName,
                'gen'     => $this
            ]);
            $this->createPhpFile($requestFile, $content);
            $this->info('<comment>'.$requestName.'</comment> generated successfully.');
        }
    }

    protected function generateBinding()
    {
        $binding = "\$router->model('{$this->routeName()}', 'App\\Models\\{$this->model}');";
        $providerFile = app_path('Providers/RouteServiceProvider.php');
        $providerFileContents = file_get_contents($providerFile);

        if (strpos($providerFileContents, $binding)) {
            $this->info('Binding already exists.');
            return false;
        }

        $bindingHandle = '/(public function boot\(Router \$router\)\s*\{)/';
        if (preg_match($bindingHandle, $providerFileContents)) {
            $data = preg_replace($bindingHandle, "$1\n\t\t{$binding}", $providerFileContents);
            file_put_contents($providerFile, $data);
            $this->info('Route binding for <comment>'.$this->routeName().'</comment> added successfully.');
        } else {
            $this->error('Route binding could not be added.');
        }
    }

    protected function generateController()
    {
        $controllerName = $this->tableTitleCase() . 'Controller';
        $requestName    = $this->tableTitleCase() . 'Request';
        $namespace      = strtolower($this->namespace);

        if ( ! file_exists(app_path('Http/Controllers/'.$this->namespace))) mkdir(app_path('Http/Controllers/'.$this->namespace), 0777, true);
        $controllerFile = app_path('Http/Controllers') . '/' . $this->namespace . '/' . $controllerName . '.php';

        if ($this->confirmOverwrite($controllerFile)) {
            $content = view($this->templatesDir . '.controller', [
                'gen'            => $this,
                'controllerName' => $controllerName,
                'requestName'    => $requestName,
                'namespace'      => $namespace,
                'route'          => $this->routeName()
            ]);
            $this->createPhpFile($controllerFile, $content);
            $this->info('Controller <comment>'.$this->tableTitleCase().'Controller</comment> generated successfully');
        }
    }

    protected function generateViews()
    {
        $namespace = strtolower($this->namespace);
        $viewsDir  = base_path('resources/views/' . $namespace . '/' . $this->routeName());
        if ( ! file_exists($viewsDir)) mkdir($viewsDir, 0777, true);

        foreach (['edit', 'form'] as $view) {
            $viewFile = $viewsDir . '/' . $view . '.blade.php';
            if ($this->confirmOverwrite($viewFile)) {
                $content = view($this->templatesDir . '.' . $view, [
                    'gen'       => $this,
                    'namespace' => $namespace,
                    'route'     => $this->routeName()
                ]);
                $this->createViewFile($viewFile, $content);
                $this->info('<comment>'.ucfirst($view).'</comment> view generated successfully.');
            }
        }
    }
}
