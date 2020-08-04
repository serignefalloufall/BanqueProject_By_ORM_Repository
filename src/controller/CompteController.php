<?php
use libs\system\Controller;
use src\model\CompteDB;
use src\model\ClientDB;

   class CompteController extends Controller
   {
        public function __construct(){
            parent::__construct();//pour faire appelle a notre constructeur parent qui se trouve dans la classe DB
        }
        
        public function add()
        {
            $comptedb = new CompteDB();// l'objet $comptedb c pour acceder au methode qui se trouve class TestDB
            $clientdb = new ClientDB();
            $data['listeClient'] = $clientdb->getListClient();
            $data['listeTypeCompte'] = $comptedb->getListTypeComte();
            $data['listeAgence'] = $comptedb->getListAgence();

            //parametrage
            $data['today'] = date("d/m/y"); 
            $data['numcompte'] = 'Cmpt-'.$data['today']; 
            $data['cleRip'] = 'Cle-rip-'.$data['today']; 

            if(isset($_POST['btnAjouter']))
            {
             
                extract($_POST);
                // var_dump($_POST);
                // die;
               
                $compteObject = new Compte();//ici on cree un objet 

                if($_POST['type_compte_id'] == '1')
                {
                  //1 represente typecompte epargne au niveau de la base
                  $compteObject->setNum_compte($num_compte);

                  $agence = $comptedb->getAgenceById($agence_id);

                  $compteObject->setAgence_id($agence);
      
                  $compteObject->setCle_rip($cle_rip);
      
                  $compteObject->setFrais_ouverture($frais_ouverture);
      
                  $compteObject->setDate_ouverture($date_ouverture);

                   //ici je recupere l objet type compte
                  $typecompte = $comptedb->getTypeCompteById($type_compte_id);
 
                  $compteObject->setType_compte_id($typecompte);
      
                   //ici je recupere l objet client
                  $client = $comptedb->getClientById($client_id);
 
                  $compteObject->setClient_id($client);
              
                  $resultat = $comptedb->addCompteEpargne($compteObject);

                  $data['ok'] = $resultat;

                  return $this->view->load("compte/add", $data);

                }else if($_POST['type_compte_id'] == '2')
                {
                  //2 represente typecompte courant au niveau de la base
        
                  $compteObject->setNum_compte($num_compte);

                  $agence = $comptedb->getAgenceById($agence_id);

                  $compteObject->setAgence_id($agence);

                  $compteObject->setCle_rip($cle_rip);

                  $compteObject->setAgio($agio);

                  $compteObject->setDate_ouverture($date_ouverture);

                  //ici je recupere l objet type compte
                  $typecompte = $comptedb->getTypeCompteById($type_compte_id);
 
                  $compteObject->setType_compte_id($typecompte);

                  //ici je recupere l objet client
                  $client = $comptedb->getClientById($client_id);

                  $compteObject->setClient_id($client);
            
                  $resultat = $comptedb->addCompteCourant($compteObject);

                  $data['ok'] = $resultat;

                  return $this->view->load("compte/add", $data);

                }else if($_POST['type_compte_id'] == '3')
                {
                  //3 represente typecompte bloque au niveau de la base
          
                  $compteObject->setNum_compte($num_compte);

                  $agence = $comptedb->getAgenceById($agence_id);

                  $compteObject->setAgence_id($agence);

                  $compteObject->setCle_rip($cle_rip);

                  $compteObject->setFrais_ouverture($frais_ouverture);

                  $compteObject->setDate_ouverture($date_ouverture);

                   //ici je recupere l objet type compte
                   $typecompte = $comptedb->getTypeCompteById($type_compte_id);
 
                   $compteObject->setType_compte_id($typecompte);
 
                   //ici je recupere l objet client
                  $client = $comptedb->getClientById($client_id);  
                  $compteObject->setClient_id($client);
          
                  $resultat = $comptedb->addCompteBloque($compteObject);

                  $data['ok'] = $resultat;

                  return $this->view->load("compte/add", $data);
                }
              
            }else{

                  return $this->view->load("compte/add", $data);

            }
           
        }  
    }
?>