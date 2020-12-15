<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;

class MakeViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:viewer
        {view}
        {--crud : Create resourceful views at this location}
        {--createView : Append Create view}
        {--deleteView : Append Delete view}
        {--deleteAllView : Append Delete all view}
        {--editView : Append Edit view}
        {--indexView : Append Index view}
        {--showView : Append Show view}
        {--route : Append route}
        {--migration : Create migration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new blade template.';

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
     * @return mixed
     */
    public function handle()
    {
        if ($this->option('createView')) {
            $this->create_view($this->argument('view'));
        }

        if ($this->option('migration')) {
            $this->createMigration($this->argument('view'));
        }

        if ($this->option('deleteView')) {
            $this->delete_view($this->argument('view'));
        }

        if ($this->option('editView')) {
            $this->edit_view($this->argument('view'));
        }

        if ($this->option('indexView')) {
            $this->index_view($this->argument('view'));
        }

        if ($this->option('showView')) {
            $this->show_view($this->argument('view'));
        }

        if ($this->option('deleteAllView')) {
            $this->deleteAll_view($this->argument('view'));
        }

        if ($this->option('route')) {
            $this->appendRoutes($this->argument('view'));
        }
        // Si l'option crud est ajouté
        if ($this->option('crud')) {
            // Transforme le nom du dossier en Maj.
            $folder = ucfirst($this->argument('view'));

            // Contenue des differentes vues qui seront créées
            $views = [
                "$folder.create",
                "$folder.delete_modal",
                "$folder.deleteAll_modal",
                "$folder.edit",
                "$folder.form",
                "$folder.index",
                "$folder.show",
            ];


            foreach ($views as $view) {
                // Stocke dans path le chemin de chaque vue
                $path = $this->viewPath($view);

                // Créés le dossier
                $this->createDir($path);

                // Si la vue existait deja, donne un message d'erreur
                if (File::exists($path))
                {
                    $this->error("File {$path} already exists!");
                }

                // Créés les vues avec un message de succès
                File::put($path, '');

                $this->info("File {$path} created.");
            }
        }
        else {
            // Reccupère le nom de la vue
            $view = $this->argument('view');

            // Ajoute l'extension blade.php au nom et stocke dans path
            $path = $this->viewPath($view);

            // Créés le dossier ou chemin
            $this->createDir($path);

            // Si le fichier existait, donne un message d'erreur
            if (File::exists($path))
            {
                $this->error("File {$path} already exists!");
                return;
            }

            // Sinon crées le fichier + message de succès
            File::put($path, $path);

            $this->info("File {$path} created.");
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

    private function appendRoutes($modelName)
    {
        $modelTitle = ucfirst($modelName);

        $modelName = strtolower($modelName);

        $newRoutes = $this->files->get('stubs/routes.stub');

        $newRoutes = str_replace('|MODEL_TITLE|', $modelTitle, $newRoutes);

        $newRoutes = str_replace('|MODEL_NAME|', $modelName, $newRoutes);

        $newRoutes = str_replace('|CONTROLLER_NAME|', $modelTitle . 'Controller', $newRoutes);

        $this->files->append(
            app_path('../routes/web.php'),
            $newRoutes
        );

        $this->info('Added routes for ' . $modelTitle);

        // $fp = fopen('routes/web.php', 'a'); // opens file in append mode
        // fwrite($fp, PHP_EOL.'this is additional text ');
        // fclose($fp);

        // $this->info($newRoutes);
    }

    private function create_view($modelName)
    {
        $modelTitle = ucfirst($modelName);

        $modelName = strtolower($modelName);

        $newRoutes = $this->files->get('stubs/create.view.stub');

        $newRoutes = str_replace('{{ modelTitle }}', $modelTitle, $newRoutes);

        $this->files->append(
            app_path('../resources/views/'.$modelTitle.'/create.blade.php'),
            $newRoutes
        );

        $this->info('Update ' .$modelTitle. '/create.blade.php');

        // $fp = fopen('routes/web.php', 'a'); // opens file in append mode
        // fwrite($fp, PHP_EOL.'this is additional text ');
        // fclose($fp);

        // $this->info($newRoutes);
    }

    public function delete_view($modelName)
    {
        $modelTitle = ucfirst($modelName);

        $modelName = strtolower($modelName);

        $newRoutes = $this->files->get('stubs/delete_modal.view.stub');

        $newRoutes = str_replace('{{ modelName }}', $modelName, $newRoutes);

        // Efface le contenu du fichier
        $this->files->replace(
            app_path('../resources/views/'.$modelTitle.'/delete_modal.blade.php'), ''
        );

        $this->files->append(
            app_path('../resources/views/'.$modelTitle.'/delete_modal.blade.php'),
            $newRoutes
        );

        $this->info('Update ' .$modelTitle. '/delete_modal.blade.php');
    }

    public function deleteAll_view($modelName)
    {
        $modelTitle = ucfirst($modelName);

        $modelName = strtolower($modelName);

        $newRoutes = $this->files->get('stubs/deleteAll_modal.view.stub');

        $newRoutes = str_replace('{{ modelName }}', $modelName, $newRoutes);

        // Efface le contenu du fichier
        $this->files->replace(
            app_path('../resources/views/'.$modelTitle.'/deleteAll_modal.blade.php'), ''
        );

        // Ajoute le contenu du stub
        $this->files->append(
            app_path('../resources/views/'.$modelTitle.'/deleteAll_modal.blade.php'),
            $newRoutes
        );

        $this->info('Update ' .$modelTitle. '/deleteAll_modal.blade.php');
    }

    public function edit_view($modelName)
    {
        $modelTitle = ucfirst($modelName);

        $modelName = strtolower($modelName);

        $newRoutes = $this->files->get('stubs/edit.view.stub');

        $newRoutes = str_replace('{{ modelTitle }}', $modelTitle, $newRoutes);

        // Efface le contenu du fichier
        $this->files->replace(
            app_path('../resources/views/'.$modelTitle.'/edit.blade.php'), ''
        );

        // Ajoute le contenu du stub
        $this->files->append(
            app_path('../resources/views/'.$modelTitle.'/edit.blade.php'),
            $newRoutes
        );

        $this->info('Update ' .$modelTitle. '/edit.blade.php');
    }

    public function index_view($modelName)
    {
        $modelTitle = ucfirst($modelName);

        $modelName = strtolower($modelName);

        $newRoutes = $this->files->get('stubs/index.view.stub');

        $newRoutes = str_replace('{{ modelName }}', $modelName, $newRoutes);

        // Effaces le contenu du fichier
        $this->files->replace(
            app_path('../resources/views/'.$modelTitle.'/index.blade.php'), ''
        );

        // Ajoute le contenu du stub
        $this->files->append(
            app_path('../resources/views/'.$modelTitle.'/index.blade.php'),
            $newRoutes
        );

        $this->info('Update ' .$modelTitle. '/index.blade.php');
    }

    public function show_view($modelName)
    {
        $modelTitle = ucfirst($modelName);

        $modelName = strtolower($modelName);

        $newRoutes = $this->files->get('stubs/show.view.stub');

        $newRoutes = str_replace('{{ modelTitle }}', $modelTitle, $newRoutes);

        // Effaces le contenu du fichier
        $this->files->replace(
            app_path('../resources/views/'.$modelTitle.'/show.blade.php'), ''
        );

        // Ajoute le contenu du stub
        $this->files->append(
            app_path('../resources/views/'.$modelTitle.'/show.blade.php'),
            $newRoutes
        );

        $this->info('Update ' .$modelTitle. '/show.blade.php');
    }

    private function createMigration($name)
    {
        $filename = $this->buildMigrationFilename($name);

        if ($this->files->exists(database_path($filename))) {
            $this->error('Migration already exists!');
            return false;
        }

        $migration = $this->buildMigration($name);

        $this->files->put(
            database_path('/migrations/' . $filename),
            $migration
        );

        if (env('APP_ENV') != 'testing') {
            $this->composer->dumpAutoloads();
        }

        $this->info('Created migration ' . $filename);

        return true;
    }

    protected function buildMigration($name)
    {
        $stub = $this->files->get('stubs/migration.stub');

        $className = 'Create' . Str::plural($name). 'Table';

        $stub = str_replace('MIGRATION_CLASS_PLACEHOLDER', $className, $stub);

        $table = strtolower(Str::plural($name));

        $stub = str_replace('TABLE_NAME_PLACEHOLDER', $table, $stub);

        $class = 'App\\' . $name;
        $model = new $class;

        $stub = str_replace('MIGRATION_COLUMNS_PLACEHOLDER', $this->buildTableColumns($model->migrationAttributes()), $stub);

        return $stub;
    }

    public function buildTableColumns($attributes)
    {
        return rtrim(collect($attributes)->reduce(function($column, $attribute) {

            $fieldType = $this->getFieldTypeFromProperties($attribute['properties']);

            if ($length = $this->typeCanDefineSize($fieldType)) {
                $length = $this->extractFieldLengthValue($attribute['properties']);
            }

            $properties = $this->extractAttributePropertiesToApply($attribute['properties']);

            return $column . $this->buildSchemaColumn($fieldType, $attribute['name'], $length, $properties);

        }));
    }

    public function buildMigrationFilename($model)
    {
        $table = $this->convertModelToTableName($model);

        return date('Y_m_d_his') . '_create_' . $table . '_table.php';
    }

    public function convertModelToTableName($model)
    {
        return Str::plural(Str::snake($model));
    }

}
