<?php

namespace App\Console\Commands;

use App\Model\Mission;
use Illuminate\Console\Command;
use File;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Schema;

class MakeCrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud
        {name}
        {--custom : Choix au user de mettre les differetes options des inputs, de choisir les dispositions et de choisir les champs visibles du index.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create crud view, update route, model, controller from existing migration';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Met à jour le model ou le créé si il n'existe pas
        // $this->appendModel($this->argument('name'));

        // Met à jour le controller ou le créé si il n'existe pas
        // $this->appendController($this->argument('name'));

        // // Créé les vues et les met à jour
        $this->createViews($this->argument('name'));

        // $this->appendForm($this->argument('name'));

        // // Met à jour les routes
        // $this->appendRoutes($this->argument('name'));

        // $this->getFieldMigration($this->argument('name'));

        // // Si option cutom choisi
        // if ($this->option('custom')) {
        //     // User édite les propriétés et la disposition des inputs
        //     $this->customForm($this->argument('name'));

        //     // User choisit les champs du table dans index
        //     $this->customIndex($this->argument('name'));
        // }
    }

    public function appendModel($name)
    {
        $modelName = ucfirst($name);

        $modelContent = '{'.PHP_EOL."\t".'protected $guarded = [];';

        $modelPath = '';

        $paths = scandir('app');

        $modelPath = $this->findFilePath($paths, "$modelName.php");

        $newModelContent = $this->files->get($modelPath);

        $newModelContent = str_replace('{', $modelContent, $newModelContent);

        // Efface le contenu du fichier
        $this->files->replace($modelPath, '');

        $this->files->append($modelPath, $newModelContent);

        $this->info("Model $modelName a été bien mis à jour.");
    }

    public function appendView($name, $viewName)
    {
        $modelName = ucfirst($name);

        $modelVariable = strtolower($name);

        $newViewContent = $this->files->get('stubs/'.$viewName.'.view.stub');

        $newViewContent = str_replace('{{ modelVariable }}', $modelVariable, $newViewContent);

        $newViewContent = str_replace('{{ modelName }}', $modelName, $newViewContent);

        // Efface le contenu du fichier
        $this->files->replace(
            app_path('../resources/views/'.$modelName.'/'.$viewName.'.blade.php'), ''
        );

        $this->files->append(
            app_path('../resources/views/'.$modelName.'/'.$viewName.'.blade.php'),
            $newViewContent
        );

        $this->info('La vue ' .$modelName. '/'.$viewName.'.blade.php a été bien mis à jour');
    }

    /**
     * Vérifie et retourne le chemin d'un fichier
     *
     * @param array $files
     * @param string $fileName
     *
     * @return string
     */
    public function findFilePath(array $files, string $fileName)
    {
        foreach($files as $file) {
            // Vérifie le model
            if ($file == $fileName) {
                return app_path($fileName);
            }
        }
    }

    public function appendController(string $name)
    {
        $controllerName = ucfirst($name).'Controller';

        $modelName = ucfirst($name);

        $modelVariable = lcfirst($name);

        $controllerStub = 'stubs/controller.model.stub';

        $controllerPath = $this->findFilePath(scandir('app/Http/Controllers'), "$controllerName.php");

        $newControllerContent = $this->files->get($controllerStub);

        $newControllerContent = str_replace('{{ namespace }}', 'App\Http\Controllers', $newControllerContent);

        $newControllerContent = str_replace('{{ namespacedModel }}', 'App\\'.$modelName, $newControllerContent);

        $newControllerContent = str_replace('{{ class }}', $controllerName, $newControllerContent);

        $newControllerContent = str_replace('{{ modelVariable }}', $modelVariable, $newControllerContent);

        $newControllerContent = str_replace('{{ model }}', $modelName, $newControllerContent);

        // Efface le contenu du fichier
        $this->files->replace($controllerPath, '');

        $this->files->append($controllerPath, $newControllerContent);

        $this->info("Controller $controllerName a été bien mis à jour.");
    }

    public function createViews(string $name)
    {
        // Transforme le nom du dossier en Maj.
        $folder = ucfirst($name);

        // Contenue des differentes vues qui seront créées
        $views = [
            "create",
            "delete_modal",
            "deleteAll_modal",
            "edit",
            "form",
            "index",
            "show",
        ];


        foreach ($views as $view) {
            // Stocke dans path le chemin de chaque vue
            $path = $this->viewPath($folder.'.'.$view);

            // Créés le dossier
            $this->createDir($path);

            // Si la vue existait deja, donne un message d'erreur
            if ($this->files->exists($path))
            {
                $this->error("File {$path} already exists!");
            }

            // Créés les vues avec un message de succès
            $this->files->put($path, '');

            $this->info("File {$path} created.");

            $this->appendView($folder, $view);
        }
    }

    /**
     * Ajoute l'extension .blade.php à la vue et retourne le chemin.
     *
     * @param string $view
     *
     * @return string
     */
    public function viewPath($view)
    {
        $view = str_replace('.', '/', $view) . '.blade.php';

        $path = "resources/views/{$view}";

        return $path;
    }

    /**
     * Créés le chemin si il n'existe pas
     *
     * @param $path
     */
    public function createDir($path)
    {
        $dir = dirname($path);

        if (!file_exists($dir))
        {
            mkdir($dir, 0777, true);
        }
    }

    public function appendRoutes($name)
    {
        $modelName = ucfirst($name);

        $modelVariable = strtolower($name);

        $controllerName = $modelName.'Controller';

        $newRoutesContent = $this->files->get('stubs/routes.stub');

        $newRoutesContent = str_replace('{{ modelName }}', $modelName, $newRoutesContent);

        $newRoutesContent = str_replace('{{ modelVariable }}', $modelVariable, $newRoutesContent);

        $newRoutesContent = str_replace('{{ controllerName }}', $controllerName . 'Controller', $newRoutesContent);

        $this->files->append(
            app_path('../routes/web.php'),
            $newRoutesContent
        );

        $this->info('Les routes de ' .$modelName. ' ont été bien ajouté');
    }

    public function getMigrationField(string $name)
    {
        $modelName = ucfirst($name);

        $instance = new Mission;

        $table = $instance->getTable();
        $columns = Schema::getColumnListing($table);

        return $columns;
    }

    public function appendForm(string $name)
    {
        $modelName = ucfirst($name);

        // $modelVariable = strtolower($name);

        $formFieldsNames = $this->getMigrationField('Mission');

        foreach ($formFieldsNames as $fieldName) {

        }
        $rowContent = $this->fillFormRow();

        $newFormContent = $this->files->get('stubs/form.view.stub');

        $newFormContent = str_replace('{{ rowContent }}', $rowContent, $newFormContent);

        // Efface le contenu du fichier
        $this->files->replace(
            app_path('../resources/views/'.$modelName.'/form.blade.php'), ''
        );

        $this->files->append(
            app_path('../resources/views/'.$modelName.'/form.blade.php'), $newFormContent
        );

        $this->info("Le formulaire de $modelName.blade.php a été bien mis à jour");
    }

    public function fillFormRow()
    {
        $this->fillFormCol();
    }

    public function fillFormCol()
    {
        $newFormCol = $this->files->get('stubs/form.view.stub');
    }
}

