<?php 
namespace Routes;
class Router{
    protected $routes = array();

    public function Route($path, $controller,$method = 'GET'){

        $array = str_replace('@',' ', $controller);
        $array = explode(' ', $array);
        $function = $array[1];
        $controller = $array[0];

       $this->routes[] = array(
        'path'=> $path,
        'controller'=> $controller,
        'function'=> $function,
        'method'=> $method
       );
        $this->Dispatch();
        
    }

    public function dispatch() {
        $url = $_SERVER['REQUEST_URI'];
        $url = str_replace("/PhoenixPHP", "", $url);
    
        foreach ($this->routes as $value) {
            if ($value['path'] == $url && $_SERVER['REQUEST_METHOD'] == $value['method']) {
                $controllerName = "Controller\\" . $value['controller'];
                $action = $value['function'];
                $controllerFile = 'Controller/' . $value['controller'] . ".php";
    
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    if (class_exists($controllerName)) {
                        $controller = new $controllerName();
                        if (method_exists($controller, $action)) {
                            $controller->$action();
                            exit(); 
                        } else {
                            echo 'Erreur: Méthode non trouvée dans le contrôleur';
                        }
                    } else {
                        echo 'Erreur: Contrôleur non trouvé';
                    }
                } else {
                    echo 'Erreur: Fichier de contrôleur non trouvé';
                }
            }
        }
    
        echo '404 - Page non trouvée';
    }
    
}