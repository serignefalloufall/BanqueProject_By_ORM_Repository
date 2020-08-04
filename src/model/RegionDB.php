<?php
namespace src\model;
use libs\system\Model;


//use Region;
//require_once  "../../bootstrap.php";

class RegionDB extends Model
{
  public function __construct()
  {
      parent::__construct(); //pour faire appelle a notre constructeur parent qui se trouve dans la classe DB

  }
  public function addRegion($region)
  {
    if($this->db != null)
    {
        $this->db->persist($region);
        $this->db->flush();

        return $region->getId();
    }
  }
    public function findAll()
    {
       return $this->db
                   ->createQuery("SELECT r FROM Region r")
                   ->getResult();
       
    }
}




?>