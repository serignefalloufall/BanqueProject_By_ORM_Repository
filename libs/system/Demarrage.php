<?php
namespace libs\system;
class Demarrage
{
    public function __construct()
    {
        if (isset($_GET["url"])) {

            //echo "Dalal ak diame";
            $url = explode("/", $_GET["url"]);
            //explod permet de convertir une chaine en tableau

            $controller_file = "src/controller/".$url[0]."Controller.php";

            if (file_exists($controller_file)) {
                require_once $controller_file;

                $file = $url[0]."Controller";

                $namespace = "src\controller\\";

                $ok = $namespace.$file;
                

                $controller_object = new $ok();

                if (isset($url[2])) //$url[2] represente les prams du methode
                {
                    $method = $url[1];
                    if (method_exists($controller_object, $method)) {
                        $controller_object->$method($url[2]); //nous permet d'acceder a la methode
                    } else {

                        die($method." n'existe pas dans le controller".$file);
                    }
                } else if (isset($url[1])) //$url[1] represente les methode du controller
                {
                    $method = $url[1];
                    if (method_exists($controller_object, $method)) {
                        $controller_object->$method(); //nous permet d'acceder a la methode
                    } else {

                        die($method." n'existe pas dans le controller".$file);
                    }
                }
            } else {
                die($controller_file."  n'existe pas");
            }
        } else {
            echo "Bienvenue!!!!!!!";
        }
    }
    
}
?>