<?php
namespace src\controller;
use libs\system\Controller;
use src\model\RegionDB;

class RegionController extends Controller
{
    public function __construct()
    {
        parent::__construct(); //pour faire appelle a notre constructeur parent qui se trouve dans la classe DB

    }
    public function addRegion()
    {
       return $this->view->load("region/add");      
    }

    public function getAll()
    {
        // //$regions = array("r1","r2","r3");
        $rdb = new RegionDB();
        $data['regions'] = $rdb->findAll();
        return $this->view->load("region/getAll",$data);
    }
}

?>