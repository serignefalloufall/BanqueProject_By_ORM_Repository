<?php 

class Autoloader
{
    //La classe Autoloader a pour role d'inclure seulement les class instancier
    //cette fonction permet de 
    static function register()
    {
        spl_autoload_register(array(__CLASS__, "autoload"));
        //spl_autoload_register recoit en prametre une classe 
    }
// cette fonction recoit en param tout class qui est instancier c a dir il requper son
// namespace ou bien le chemin absolu de la classe
    static function autoload($class) // cette function permet la recuperation des nom des classe 
    {
       //echo $class;
       //echo str_replace("\\","/",$class);
       //require_once "src/model/".$class.".php";

       if(file_exists("src/model/".$class.".php"))
       {
           require_once "src/model/".$class.".php";

       }//on cherche les class dans model ou controller
       else if(file_exists("src/controller/".$class.".php"))
       {
        require_once "src/controller/".$class.".php";
       } //Cas ou on utilise les namespace 
       else if(file_exists(str_replace("\\","/",$class.".php")))
       {
           require_once str_replace("\\","/",$class.".php");

       }else{
           die("Merci d'utiliser le mot cle use suivi de ".$class);
       }
     
    }
}

Autoloader::register();// :: permet d'appeler les methodes static
?> 