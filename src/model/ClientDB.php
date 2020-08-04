<?php
namespace src\model;
use libs\system\Model;

class ClientDB extends Model
{

    public function __construct()
    {
        parent::__construct(); //pour faire appelle a notre constructeur parent qui se trouve dans la classe DB

    }

    public function addEmployeur($employeur)
    {
        $this->db->persist($employeur);
        $this->db->flush();
        return $employeur->getId();
    }

    public function addClientSalarie($client)
    {
        $this->db->persist($client);
        $this->db->flush();
        return $client->getId();
    }

    public function addClientNonSalarie($client)
    {
        $this->db->persist($client);
        $this->db->flush();
        return $client->getId();
    }
    
    public function getListTypeClient()
    {
      $query = $this->db->createQuery("SELECT tc FROM Typeclient tc");
      return $l_typeclients = $query->getResult();
       
       
    }

    public function getListEmployeur()
    {
      $query = $this->db->createQuery("SELECT e FROM Employeur e");
      return $employeurs = $query->getResult();
       
    }

    public function getTypeClientById($id){
		if($this->db != null)
		{
			$tclient = $this->db->find('Typeclient', $id);
			if($tclient != null)
			{
                return $tclient;
			}else {
				die("Objet ".$id." does not existe!");
			}
		}
    }
    
    public function getTypeEmployeurById($id)
    {
		if($this->db != null)
		{
			$emp = $this->db->find('Employeur', $id);
			if($emp != null)
			{
                return $emp;
			}else {
				die("Objet ".$id." does not existe!");
			}
		}
    }
    
    function getListClient()
    {
        return $this->db
        ->createQuery("SELECT cli FROM Client cli")
        ->getResult();
    }

    public function getClientById($id)
    {
		if($this->db != null)
		{
			$cli = $this->db->find('Client', $id);
			if($cli != null)
			{
                return $cli;
			}else {
				die("Objet ".$id." does not existe!");
			}
		}
    }

}
