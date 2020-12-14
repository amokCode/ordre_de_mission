<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
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
        {--route : Append route}';

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
                File::put($path, $path);

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

}
