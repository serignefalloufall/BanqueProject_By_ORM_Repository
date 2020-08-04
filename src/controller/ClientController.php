<?php
use libs\system\Controller;
use src\model\ClientDB;

   class ClientController extends Controller
   {
        public function __construct(){
            parent::__construct();//pour faire appelle a notre constructeur parent qui se trouve dans la classe DB
        }
        
        public function add()
        {
        
           

            $clientdb = new ClientDB();// l'objet $clientdb c pour acceder au methode qui se trouve class TestDB

            $data['listeTypeClient'] = $clientdb->getListTypeClient();
            $data['listeEmployeur'] = $clientdb->getListEmployeur();

          // $data['tclient'] = $clientdb->getTypeClientById(2);

            // $tclient = $data['tclient'];
            // echo $tclient->getId()." "."<br/>";
            // echo $tclient->getLibelle()." "."<br/>";
            //     echo $r->getNom_employeur()." "."<br/>";
            // foreach( $listes as $r){
            //     echo $r->getId()." "."<br/>";
            //     echo $r->getNom_employeur()." "."<br/>";
                
            // }
            // var_dump($data['tclient']);
            // die;
            if(isset($_POST['btnAjouter']))
            {
                extract($_POST);
                $employeurObject = new Employeur();//ici on cree un objet 

                $clientObject = new Client();//ici on cree un objet 

                if($_POST['type_client_id'] == '3')
                {
                    //8 represente typeclient entreprise au niveau de la base

                    $employeurObject->setNumIdentification($numIdentification);

                    $employeurObject->setRaisonSocial($raisonSocial);

                    $employeurObject->setNom_employeur($nom_employeur);

                    $employeurObject->setAdresse_employeur($adresse_employeur);

                    $resultat = $clientdb->addEmployeur($employeurObject);

                    $data['ok'] = $resultat;

                    return $this->view->load("client/add", $data);

                }else if($_POST['type_client_id'] == '1')
                {
                     //6 represente typeclient salarie au niveau de la base

                     $clientObject->setNom($nom);

                     $clientObject->setPrenom($prenom);
 
                     $clientObject->setAdresse($adresse);
 
                     $clientObject->setTel($tel);
 
                     $clientObject->setEmail($email);
 
                     $clientObject->setSalaire($salaire);
 
                     $clientObject->setProfession($profession);
                    //ici je recupere l objet type client
                     $typeclient = $clientdb->getTypeClientById($type_client_id);
 
                     $clientObject->setType_client_id($typeclient);

                      //ici je recupere l objet employeur
                      $employeur = $clientdb->getTypeEmployeurById($employeur_id);
 
                     $clientObject->setEmployeur_id($employeur);
 
                     $resultat = $clientdb->addClientSalarie($clientObject);

                     $data['ok'] = $resultat;

                     return $this->view->load("client/add", $data);

                }else if($_POST['type_client_id'] == '2')
                {
                     //7 represente typeclient non salarie au niveau de la base

                     $clientObject->setNom($nom);

                     $clientObject->setPrenom($prenom);
 
                     $clientObject->setAdresse($adresse);
 
                     $clientObject->setTel($tel);
 
                     $clientObject->setEmail($email);
 
                     $resultat = $clientdb->addClientNonSalarie($clientObject);

                     $data['ok'] = $resultat;

                     return $this->view->load("client/add", $data);
                }
              
            }else{

                return $this->view->load("client/add", $data);

            }
           
        }  
    }
?>