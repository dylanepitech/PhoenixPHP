<?php 
namespace Phoenix;

class Controller {
    protected $argument;

    protected function argument()
    {
    echo "\033[32m"; 
    $this->argument = readline("Choisir un nom pour le controller: ");
    echo "\033[0m"; 
    }
    public function Makecontroller()
    {
        $this->argument();
        if ($this->argument == "") {
            exit();
        }
       $controller = "<?php 
        namespace Controller;
    require_once __DIR__ . '/../vendor/autoload.php';
        
        class ".$this->argument." {
            public function view() {
                require_once 'chemin/vers/votre/fichier.php';
            }
        }";
        
       $fichier =  fopen("Controller/$this->argument.php", 'w');
        fwrite($fichier,$controller);
        fclose($fichier);

    }
    

}

$newcontroller = new Controller(); 
$newcontroller->MakeController();