<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DefaultResource extends Command
{
    use ResourceTrait;

    protected $signature = 'resource:default
                            {resourceName : Resource name}
                            {unitName : Unit name}
                            {fields : Table fields (name:type:validation)}
                            {--c|categories : Categories}
                            {--t|tags : Tags}
                            {--p|paginate= : Paginate}
                            {--s|sortable : Sortable}
                            {--g|gallery : Gallery}
                            {--slug= : Slug field}
                            {--force : Force confirmation}';

    protected $description = 'Generate default resource';

    public $resourceName;
    public $unitName;
    public $table;
    public $model;
    public $fields;
    public $paginate;
    public $sortable;

    public $namespace = 'Painel';
    public $templatesDir = 'resource.default';

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
        $this->unitName     = $this->argument('unitName');
        $this->fields       = $this->argument('fields');

        $this->table = strtolower(str_slug($this->resourceName, '_'));
        $this->model = str_replace(' ', '', mb_convert_case(str_slug($this->unitName, ' '), MB_CASE_TITLE, 'UTF-8'));

        $this->categories = $this->option('categories');
        $this->tags       = $this->option('tags');
        $this->paginate   = $this->option('paginate');
        $this->sortable   = $this->option('sortable');
        $this->gallery    = $this->option('gallery');
        $this->slug       = $this->option('slug');

        if ($this->paginate && $this->sortable) {
            throw new \Exception('A resource can\'t be paginated and sorted.');
        }
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

        if ($this->slug) {
            $checkSlug = false;

            foreach ($fields as $field) {
                if ($field['name'] == $this->slug) { $checkSlug = true; }
            }

            if (!$checkSlug) {
                throw new \Exception("The slug field name <comment>{$this->slug}</comment> doesn't exist.");
            }
        }
    }

    protected function displayFields()
    {
        $paginate   = ($this->paginate ? ', paginated ('. $this->paginate .')' : '');
        $sortable   = ($this->sortable ? ', sortable' : '');
        $categories = ($this->categories ? ', with categories' : '');
        $tags       = ($this->tags ? ', with tags' : '');
        $gallery    = ($this->gallery ? ', with gallery' : '');

        $this->output->writeln('Generate <comment>default'.$paginate.$sortable.$categories.$tags.$gallery.'</comment> resource for model <info>'.$this->model.'</info> on table <info>'.$this->table.'</info>:'."\n");
        $this->table(['Alias', 'Name', 'Type', 'Validation'], $this->fields);
    }

    public function generate()
    {
        $this->generateMigration();
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

        if ($this->categories) {
            $modelFile = app_path('Models') . '/' . $this->model . 'Categoria.php';

            if ($this->confirmOverwrite($modelFile)) {
                $content = view($this->templatesDir . '.model-categoria', [
                    'gen'   => $this,
                    'route' => $this->routeName()
                ]);
                $this->createPhpFile($modelFile, $content);
                $this->info('Model class <comment>'.$this->model.'Categoria</comment> generated successfully.');
            }
        }

        if ($this->tags) {
            $modelFile = app_path('Models') . '/' . $this->model . 'Tag.php';

            if ($this->confirmOverwrite($modelFile)) {
                $content = view($this->templatesDir . '.model-tag', [
                    'gen'   => $this,
                    'route' => $this->routeName()
                ]);
                $this->createPhpFile($modelFile, $content);
                $this->info('Model class <comment>'.$this->model.'Tag</comment> generated successfully.');
            }
        }

        if ($this->gallery) {
            $modelFile = app_path('Models') . '/' . $this->model . 'Imagem.php';

            if ($this->confirmOverwrite($modelFile)) {
                $content = view($this->templatesDir . '.model-imagem', [
                    'gen'   => $this,
                    'route' => $this->routeName()
                ]);
                $this->createPhpFile($modelFile, $content);
                $this->info('Model class <comment>'.$this->model.'Imagem</comment> generated successfully.');
            }
        }
    }

    protected function generateRoute()
    {
        $route = "Route::resource('{$this->routeName()}', '{$this->tableTitleCase()}Controller');";
        $routesFile = app_path('Http/routes.php');
        $routesFileContent = file_get_contents($routesFile);

        if ($this->categories) {
            $route = "Route::resource('{$this->routeName()}/categorias', '{$this->tableTitleCase()}CategoriasController', ['parameters' => ['categorias' => 'categorias_{$this->routeName()}']]);\n\t\t" . $route;
        }

        if ($this->tags) {
            $route = "Route::resource('{$this->routeName()}/tags', '{$this->tableTitleCase()}TagsController', ['parameters' => ['tags' => 'tags_{$this->routeName()}']]);\n\t\t" . $route;
        }

        if ($this->gallery) {
            $route = $route . "\n\t\tRoute::get('{$this->routeName()}/{{$this->routeName()}}/imagens/clear', [\n\t\t\t'as'   => 'painel.{$this->routeName()}.imagens.clear',\n\t\t\t'uses' => '{$this->tableTitleCase()}ImagensController@clear'\n\t\t]);\n\t\tRoute::resource('{$this->routeName()}.imagens', '{$this->tableTitleCase()}ImagensController', ['parameters' => ['imagens' => 'imagens_{$this->routeName()}']]);";
        }

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

        if ($this->categories) {
            $requestName = $this->tableTitleCase() . 'CategoriasRequest';
            $requestFile = app_path('Http/Requests') . '/' . $requestName . '.php';

            if ($this->confirmOverwrite($requestFile)) {
                $content = view($this->templatesDir . '.request-categoria', [
                    'request' => $requestName,
                    'gen'     => $this
                ]);
                $this->createPhpFile($requestFile, $content);
                $this->info('<comment>'.$requestName.'</comment> generated successfully.');
            }
        }

        if ($this->tags) {
            $requestName = $this->tableTitleCase() . 'TagsRequest';
            $requestFile = app_path('Http/Requests') . '/' . $requestName . '.php';

            if ($this->confirmOverwrite($requestFile)) {
                $content = view($this->templatesDir . '.request-tag', [
                    'request' => $requestName,
                    'gen'     => $this
                ]);
                $this->createPhpFile($requestFile, $content);
                $this->info('<comment>'.$requestName.'</comment> generated successfully.');
            }
        }

        if ($this->gallery) {
            $requestName = $this->tableTitleCase() . 'ImagensRequest';
            $requestFile = app_path('Http/Requests') . '/' . $requestName . '.php';

            if ($this->confirmOverwrite($requestFile)) {
                $content = view($this->templatesDir . '.request-imagem', [
                    'request' => $requestName,
                    'gen'     => $this
                ]);
                $this->createPhpFile($requestFile, $content);
                $this->info('<comment>'.$requestName.'</comment> generated successfully.');
            }
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

        if ($this->categories) {
            $binding = $binding . "\n\t\t\$router->model('categorias_{$this->routeName()}', 'App\\Models\\{$this->model}Categoria');";
        }

        if ($this->tags) {
            $binding = $binding . "\n\t\t\$router->model('tags_{$this->routeName()}', 'App\\Models\\{$this->model}Tag');";
        }

        if ($this->gallery) {
            $binding = $binding . "\n\t\t\$router->model('imagens_{$this->routeName()}', 'App\\Models\\{$this->model}Imagem');";
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

        if ($this->paginate) {
            $indexMethod = 'paginate('.(int)$this->paginate.')';
        } elseif ($this->sortable) {
            $indexMethod = "ordenados()->get()";
        } else {
            $indexMethod = 'orderBy(\'id\', \'DESC\')->get()';
        }

        if ( ! file_exists(app_path('Http/Controllers/'.$this->namespace))) mkdir(app_path('Http/Controllers/'.$this->namespace), 0777, true);
        $controllerFile = app_path('Http/Controllers') . '/' . $this->namespace . '/' . $controllerName . '.php';

        if ($this->confirmOverwrite($controllerFile)) {
            $content = view($this->templatesDir . '.controller', [
                'gen'            => $this,
                'controllerName' => $controllerName,
                'requestName'    => $requestName,
                'namespace'      => $namespace,
                'route'          => $this->routeName(),
                'indexMethod'    => $indexMethod
            ]);
            $this->createPhpFile($controllerFile, $content);
            $this->info('Controller <comment>' . $this->tableTitleCase() .'Controller</comment> generated successfully');
        }

        if ($this->categories) {
            $controllerName = $this->tableTitleCase() . 'CategoriasController';
            $requestName    = $this->tableTitleCase() . 'CategoriasRequest';
            $controllerFile = app_path('Http/Controllers') . '/' . $this->namespace . '/' . $controllerName . '.php';

            if ($this->confirmOverwrite($controllerFile)) {
                $content = view($this->templatesDir . '.controller-categorias', [
                    'gen'            => $this,
                    'controllerName' => $controllerName,
                    'requestName'    => $requestName,
                    'namespace'      => $namespace,
                    'route'          => $this->routeName(),
                ]);
                $this->createPhpFile($controllerFile, $content);
                $this->info('Controller <comment>' . $this->tableTitleCase() .'CategoriasController</comment> generated successfully');
            }
        }

        if ($this->tags) {
            $controllerName = $this->tableTitleCase() . 'TagsController';
            $requestName    = $this->tableTitleCase() . 'TagsRequest';
            $controllerFile = app_path('Http/Controllers') . '/' . $this->namespace . '/' . $controllerName . '.php';

            if ($this->confirmOverwrite($controllerFile)) {
                $content = view($this->templatesDir . '.controller-tags', [
                    'gen'            => $this,
                    'controllerName' => $controllerName,
                    'requestName'    => $requestName,
                    'namespace'      => $namespace,
                    'route'          => $this->routeName(),
                ]);
                $this->createPhpFile($controllerFile, $content);
                $this->info('Controller <comment>' . $this->tableTitleCase() .'TagsController</comment> generated successfully');
            }
        }

        if ($this->gallery) {
            $controllerName = $this->tableTitleCase() . 'ImagensController';
            $requestName    = $this->tableTitleCase() . 'ImagensRequest';
            $controllerFile = app_path('Http/Controllers') . '/' . $this->namespace . '/' . $controllerName . '.php';

            if ($this->confirmOverwrite($controllerFile)) {
                $content = view($this->templatesDir . '.controller-imagens', [
                    'gen'            => $this,
                    'controllerName' => $controllerName,
                    'requestName'    => $requestName,
                    'namespace'      => $namespace,
                    'route'          => $this->routeName(),
                ]);
                $this->createPhpFile($controllerFile, $content);
                $this->info('Controller <comment>' . $this->tableTitleCase() .'ImagensController</comment> generated successfully');
            }
        }
    }

    protected function generateViews()
    {
        $namespace = strtolower($this->namespace);
        $viewsDir  = base_path('resources/views/' . $namespace . '/' . $this->routeName());
        if ( ! file_exists($viewsDir)) mkdir($viewsDir, 0777, true);

        foreach (['index', 'create', 'edit', 'form'] as $view) {
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

        if ($this->categories) {
            $viewsDir  = base_path('resources/views/' . $namespace . '/' . $this->routeName() . '/categorias');
            if ( ! file_exists($viewsDir)) mkdir($viewsDir, 0777, true);

            foreach (['index', 'create', 'edit', 'form'] as $view) {
                $viewFile = $viewsDir . '/' . $view . '.blade.php';
                if ($this->confirmOverwrite($viewFile)) {
                    $content = view($this->templatesDir . '.categorias.' . $view, [
                        'gen'       => $this,
                        'namespace' => $namespace,
                        'route'     => $this->routeName()
                    ]);
                    $this->createViewFile($viewFile, $content);
                    $this->info('<comment>Categorias/'.ucfirst($view).'</comment> view generated successfully.');
                }
            }
        }

        if ($this->tags) {
            $viewsDir  = base_path('resources/views/' . $namespace . '/' . $this->routeName() . '/tags');
            if ( ! file_exists($viewsDir)) mkdir($viewsDir, 0777, true);

            foreach (['index', 'create', 'edit', 'form'] as $view) {
                $viewFile = $viewsDir . '/' . $view . '.blade.php';
                if ($this->confirmOverwrite($viewFile)) {
                    $content = view($this->templatesDir . '.tags.' . $view, [
                        'gen'       => $this,
                        'namespace' => $namespace,
                        'route'     => $this->routeName()
                    ]);
                    $this->createViewFile($viewFile, $content);
                    $this->info('<comment>Tags/'.ucfirst($view).'</comment> view generated successfully.');
                }
            }
        }

        if ($this->gallery) {
            $viewsDir  = base_path('resources/views/' . $namespace . '/' . $this->routeName() . '/imagens');
            if ( ! file_exists($viewsDir)) mkdir($viewsDir, 0777, true);

            foreach (['index', 'imagem'] as $view) {
                $viewFile = $viewsDir . '/' . $view . '.blade.php';
                if ($this->confirmOverwrite($viewFile)) {
                    $content = view($this->templatesDir . '.imagens.' . $view, [
                        'gen'       => $this,
                        'namespace' => $namespace,
                        'route'     => $this->routeName()
                    ]);
                    $this->createViewFile($viewFile, $content);
                    $this->info('<comment>Imagens/'.ucfirst($view).'</comment> view generated successfully.');
                }
            }
        }
    }
}
