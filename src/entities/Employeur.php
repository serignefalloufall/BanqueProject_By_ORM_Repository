<?php

use \Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="employeur")
 */

class Employeur
{

        /** 
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        private $id;
        /** 
         * @ORM\Column(type="string") 
         */
        private $numIdentification;
        /** 
         * @ORM\Column(type="string") 
         */
        private $raisonSocial;
        /** 
         * @ORM\Column(type="string") 
         */
        private $nom_employeur;
        /** 
         * @ORM\Column(type="string") 
         */
        private $adresse_employeur;

        /**
         * One employeur has many clients. This is the inverse side.
         * @ORM\OneToMany(targetEntity="Client", mappedBy="employeur_id")
         */
        private $clients;


        public function __construct()
        {
                $this->clients = new ArrayCollection();
        }


        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of numIdentification
         */
        public function getNumIdentification()
        {
                return $this->numIdentification;
        }

        /**
         * Set the value of numIdentification
         *
         * @return  self
         */
        public function setNumIdentification($numIdentification)
        {
                $this->numIdentification = $numIdentification;

                return $this;
        }

        /**
         * Get the value of raisonSocial
         */
        public function getRaisonSocial()
        {
                return $this->raisonSocial;
        }

        /**
         * Set the value of raisonSocial
         *
         * @return  self
         */
        public function setRaisonSocial($raisonSocial)
        {
                $this->raisonSocial = $raisonSocial;

                return $this;
        }

        /**
         * Get the value of nom_employeur
         */
        public function getNom_employeur()
        {
                return $this->nom_employeur;
        }

        /**
         * Set the value of nom_employeur
         *
         * @return  self
         */
        public function setNom_employeur($nom_employeur)
        {
                $this->nom_employeur = $nom_employeur;

                return $this;
        }

        /**
         * Get the value of adresse_employeur
         */
        public function getAdresse_employeur()
        {
                return $this->adresse_employeur;
        }

        /**
         * Set the value of adresse_employeur
         *
         * @return  self
         */
        public function setAdresse_employeur($adresse_employeur)
        {
                $this->adresse_employeur = $adresse_employeur;

                return $this;
        }
}
