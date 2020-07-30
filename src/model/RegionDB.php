<?php
namespace src\model;
use libs\system\Model;

class RegionDB extends Model
{
  public function __construct()
  {
      parent::__construct(); //pour faire appelle a notre constructeur parent qui se trouve dans la classe DB

  }
    public function addRegion()
    {
      // echo 2;
    }
    public function findAll()
    {
       return $this->entityManager
                   ->createQuery("SELECT r FROM Region r")
                   ->getResult();
       
    }
}




?>