<?php

namespace libs\system;

class View
{
    public function __construct()
    {
    }

    public function load() //cette fonction nous permet de charger les view
    {
        //quand on charge une view on peut ou ne pas envoyer des donnees

        $num = func_num_args(); // permet de retourner le nomvbre de'argument

        $args = func_get_args(); //permet de recuperer les argument que le user a saisie

        switch ($num) { //nous permet de verifier le nbr d'args passe en pram lors de l'appel

            case 1:

                $file = "src/view/" . $args[0] . ".php"; //args 0 represente le nom du fichier
                // var_dump($file );
                // die();
                if (file_exists($file)) {
                    // echo 1;
                    // die();
                    // echo __DIR__;
                    // require_once "public/web/menu.php";
                    include_once $file; //on inclut ce $file
                } else {

                    die($file . " n'existe pas comme view"); //on affiche une message et arrete l script
                }

                break;

            case 2:

                $file = "src/view/" . $args[0] . ".php"; //args 0 represente le nom du fichier

                if (file_exists($file)) {
                    $data = $args[1]; //represente la 2em prams
                    extract($data);

                    require_once $file; //on inclut ce $file
                } else {

                    die($file . "n'existe pas comme view"); //on affiche une message et arrete l script
                }
                break;
        }
    }
}
