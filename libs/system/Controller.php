<?php

namespace libs\system;
use libs\system\View;

class Controller
{
    protected $view;//cette variable va etre visible au class qui herit de cette class
       
    //ca nous permet aussi de respecter l'architecture MVC c a dir on passe par le controller pour ataindre la view
    
    public function __construct()
    {
        $this->view = new View(); 
    }
}
?>
