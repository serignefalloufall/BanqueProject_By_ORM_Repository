<?php
namespace libs\system;

class Model
{
    protected $db;

    public function __construct()
    {
        require_once "bootstrap.php";
        $this->db = getEntity();
    }
    
}
?>