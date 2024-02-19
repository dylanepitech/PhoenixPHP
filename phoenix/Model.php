<?php 
namespace Phoenix;

class Model {
    protected $argument;

    protected function argument()
    {
    echo "\033[32m"; 
    $this->argument = readline("Choisir un nom pour le Model: ");
    echo "\033[0m"; 
    }
    public function MakeModel()
    {
        $this->argument();
        if ($this->argument == "") {
            exit();
        }
       $controller = "<?php 
        namespace Model;
        require_once __DIR__ . '/../vendor/autoload.php';
        
        class ".$this->argument." extends Database {
            protected \$db;

            public function __construct()
            {
                \$this->db = new Database();
            }
        }";
        
       $fichier =  fopen("Model/$this->argument.php", 'w');
        fwrite($fichier,$controller);
        fclose($fichier);

    }
    

}

$newmodel = new Model(); 
$newmodel->MakeModel();