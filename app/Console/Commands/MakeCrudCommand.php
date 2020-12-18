<?php

namespace App\Console\Commands;

use App\Model\Mission;
use Illuminate\Console\Command;
use File;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Schema;
use stdClass;

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
        // $this->createViews($this->argument('name'));

        $this->appendForm($this->argument('name'));

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

        $modelContent = '{' . PHP_EOL . "\t" . 'protected $guarded = [];';

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

        $newViewContent = $this->files->get('stubs/' . $viewName . '.view.stub');

        $newViewContent = str_replace('{{ modelVariable }}', $modelVariable, $newViewContent);

        $newViewContent = str_replace('{{ modelName }}', $modelName, $newViewContent);

        // Efface le contenu du fichier
        $this->files->replace(
            app_path('../resources/views/' . $modelName . '/' . $viewName . '.blade.php'),
            ''
        );

        $this->files->append(
            app_path('../resources/views/' . $modelName . '/' . $viewName . '.blade.php'),
            $newViewContent
        );

        $this->info('La vue ' . $modelName . '/' . $viewName . '.blade.php a été bien mis à jour');
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
        foreach ($files as $file) {
            // Vérifie le model
            if ($file == $fileName) {
                return app_path($fileName);
            }
        }
    }

    public function appendController(string $name)
    {
        $controllerName = ucfirst($name) . 'Controller';

        $modelName = ucfirst($name);

        $modelVariable = lcfirst($name);

        $controllerStub = 'stubs/controller.model.stub';

        $controllerPath = $this->findFilePath(scandir('app/Http/Controllers/'), "$controllerName.php");

        $newControllerContent = $this->files->get($controllerStub);

        $newControllerContent = str_replace('{{ namespace }}', 'App\Http\Controllers', $newControllerContent);

        $newControllerContent = str_replace('{{ namespacedModel }}', 'App\\' . $modelName, $newControllerContent);

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
            $path = $this->viewPath($folder . '.' . $view);

            // Créés le dossier
            $this->createDir($path);

            // Si la vue existait deja, donne un message d'erreur
            if ($this->files->exists($path)) {
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

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
    }

    public function appendRoutes($name)
    {
        $modelName = ucfirst($name);

        $modelVariable = strtolower($name);

        $controllerName = $modelName . 'Controller';

        $newRoutesContent = $this->files->get('stubs/routes.stub');

        $newRoutesContent = str_replace('{{ modelName }}', $modelName, $newRoutesContent);

        $newRoutesContent = str_replace('{{ modelVariable }}', $modelVariable, $newRoutesContent);

        $newRoutesContent = str_replace('{{ controllerName }}', $controllerName, $newRoutesContent);

        $this->files->append(
            app_path('../routes/web.php'),
            $newRoutesContent
        );

        $this->info('Les routes de ' . $modelName . ' ont été bien ajouté');
    }

    public function getMigrationField(string $name)
    {
        $modelName = ucfirst($name);
        $class = "App\\$modelName";

        $instance = new $class;

        $table = $instance->getTable();

        $columns = Schema::getColumnListing($table);

        $columns = $this->ignoreMigrationField(['id', 'created_at', 'updated_at'], $columns);

        return $columns;
    }

    public function ignoreMigrationField(array $ignoreFields, array $data)
    {
        foreach ($ignoreFields as $ignoreField) {
            //delete element in array by value "green"
            if (($key = array_search($ignoreField, $data)) !== false) {
                unset($data[$key]);
            }
        }

        return $data;
    }

    public function appendForm(string $name)
    {
        $modelName = ucfirst($name);

        $modelVariable = lcfirst($name);

        $formInputsNames = [];

        // $rowContent = '';

        // Liste des champs d'une migration spécifique depuis le model
        foreach ($this->getMigrationField($modelName) as $migrationField) {
            $formInputsNames[] = $migrationField . "_" . $modelVariable;
        }

        // Informations sur chaque champs pour le formulaire
        $inputsInformations = $this->formInputsInformations($formInputsNames);
        // $this->info($answers);

        // Lignes du formulaire basé sur les informations des champs de la migration
        $rowContent = $this->getFormRow($inputsInformations, $modelVariable);

        // dd($rowContent);

        // $rowContent = $this->getFormRow($formInputsNames, $modelName);

        // $this->info($rowContent);

        // // Prototype du formulaire
        $newFormContent = $this->files->get('stubs/form.view.stub');

        // // Spécifie le nom du modele lié au formulaire
        $newFormContent = str_replace('{{ modelName }}', $modelName, $newFormContent);

        // // Spécifie lea variable du modele lié au formulaire
        $newFormContent = str_replace('{{ modelVariable }}', $modelVariable, $newFormContent);

        // // Charge les différentes lignes du formulaire
        $newFormContent = str_replace('{{ rowContent }}', $rowContent, $newFormContent);

        // // Efface le contenu du fichier du formulaire
        $this->files->replace(
            app_path('../resources/views/' . $modelName . '/form.blade.php'),
            ''
        );

        // Ajoute les informations du prototype dans le fichier du formulaire
        $this->files->append(
            app_path('../resources/views/' . $modelName . '/form.blade.php'),
            $newFormContent
        );

        $this->info("Le formulaire de $modelName a été bien mis à jour");
    }

    public function array_to_obj($array, &$obj)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $obj->$key = new stdClass();
                $this->array_to_obj($value, $obj->$key);
            } else {
                $obj->$key = $value;
            }
        }
        return $obj;
    }

    public function arrayToObject($array)
    {
        $object = new stdClass();
        return $this->array_to_obj($array, $object);
    }

    public function formInputsInformations(array $formInputsNames)
    {
        $input = [];
        $inputs = [];
        $inputInformations = null;

        foreach ($formInputsNames as $inputName) {
            $inputUserResponse = $this->ask("Attributs du champ <bg=yellow;fg=black>" . strtoupper($inputName) . "</>:\n Exp: label=TEXTE_DU_LABEL|type=TYPE_DU_INPUT|placeholder=PLACEHOLDER_DU_INPUT:|required|size=TAILLE_DU_INPUT_DE_1_A_12|AUTRES_ATTRIBUTS");

            if (!is_null($inputUserResponse)) {

                // Ajout de name aux informations du input
                $inputUserResponse = $inputUserResponse . "|name=$inputName";

                // Séparation des infos en tableai
                $inputInformations = explode("|", $inputUserResponse);

                // Charge et organise les informations du input dans le tableau input
                foreach ($inputInformations as $inputInformationLine) {
                    $inputContent = explode('=', $inputInformationLine);

                    if (array_key_exists(1, $inputContent)) {
                        $input[$inputContent[0]] = $inputContent[1];
                    } else {
                        $input[$inputContent[0]] = null;
                    }
                }

                $inputs[] = $this->arrayToObject($input);
            }
        }

        return $inputs;
    }

    public function getFormRow(array $inputsInformations, string $modelVariable)
    {
        $row["tag_start"] = '<div class="row">';
        $row["tag_end"] = '</div>';
        $inputInfos = '';
        $res = '';
        $inputsCols = '';
        $inputsRow = '';
        $sizeLimit = 0;


        foreach ($inputsInformations as $input) {
            $inputInfos = $this->files->get('stubs/colForm.stub');
            $inputInfos = str_replace('{{ name }}', $input->name, $inputInfos);
            $inputInfos = str_replace('{{ size }}', $input->size, $inputInfos);
            $inputInfos = str_replace('{{ label }}', $input->label, $inputInfos);
            $inputInfos = str_replace('{{ modelVariable }}', $modelVariable, $inputInfos);
            $inputInfos = str_replace('{{ migrationName }}', explode('_', $input->name)[0], $inputInfos);

            foreach ($input as $attribute => $value) {
                $infos = '';

                if ($attribute != 'label' && $attribute != 'size' && $value != null) {
                    $infos = $infos . $attribute . '="' . $value . '" ';
                }

                if ($value == null) {
                    $infos = $infos . $attribute . ' ';
                }
            }
            // dump($infos);

            $inputInfos = str_replace('{{ infos }}', $infos, $inputInfos);

            // $res = $res.$this->formRows($input->size, $inputInfos);

            // dump($inputInfos);


            $sizeLimit += $input->size;

            if ($sizeLimit <= 12) {
                if ($sizeLimit == 12) {
                    $inputsRow = $inputsRow . "<row_start>\n" . $inputsCols . "\n" . $inputInfos . "\t\t\t\t\t<row_end>\n";
                    $sizeLimit = 0;
                } else {
                    $inputsCols = $inputsCols . $inputInfos;
                }
            }
        }

            dump($inputsRow);

        return $inputsRow;
    }

    public function formRows($inputSize, string $inputInformations)
    {
        $sizeLimit = 0;
        $inputsCols = '';
        $inputsRow = '';

        $sizeLimit += $inputSize;

        if ($sizeLimit <= 12) {
            if ($sizeLimit == 12) {
                $inputsRow = $inputsRow . "<row_start>" . $inputsCols . "\n" . $inputInformations . "<row_end>\n";
                $sizeLimit = 0;
            } else {
                $inputsCols = $inputsCols . $inputInformations;
            }
        }

        return $inputsRow;
    }

    public function getFormCol(array $fieldInformation)
    {
        $modelValue = lcfirst($this->argument());

        $modelName = ucfirst($this->argument());

        $explodeInput = explode('=', $fieldInformation);

        $attribute = $explodeInput[0];
        $value = $explodeInput[1];

        $input[$attribute] = $value;

        $newColForm = $this->files->get('stubs/colForm.stub');

        // Applique les modifiactions sur le input en fonction de la valeur des attributs
        if (is_null($input[$attribute])) {
            $newColForm = str_replace('{{ singleAttribute }}', $input[$attribute], $newColForm);
        } else {
            if ($attribute == 'name') {
                $newColForm = str_replace('{{ fieldName }}', $input[$attribute], $newColForm);
                $input[$attribute] = $input[$attribute] . "_" . $modelValue;
            } elseif ($attribute == 'size') {
                $newColForm = str_replace('{{ size }}', $input[$attribute], $newColForm);
            }

            $newColForm = str_replace('{{ attribute }}', $input[$attribute], $newColForm);
            $newColForm = str_replace('{{ value }}', $input[$value], $newColForm);
        }


        // $name = '';

        // $modelValue = 'mission';

        // $newColForm = $this->files->get('stubs/colForm.stub');

        // $size = $this->ask("Taille du champs $name sur 12: ");

        // $newColForm = str_replace('{{ size }}', $size, $newColForm);

        // $newColForm = str_replace('{{ label }}', $this->ask("Entrer le Label du champs $name: "), $newColForm);

        // $newColForm = str_replace('{{ name }}', $name, $newColForm);

        // $newColForm = str_replace('{{ modelValue }}', $modelValue, $newColForm);

        // $newColForm = str_replace('{{ required }}', ($this->ask("Le champs $name est obligatoire ? required/n: ") == 'required') ? 'required':'', $newColForm);

        // $newColForm = str_replace('{{ type }}', $this->ask("Type de $name: "), $newColForm);

        // $newColForm = str_replace('{{ placeholder }}', $this->ask("Placeholder de $name: "), $newColForm);

        return $newColForm;
    }
}
