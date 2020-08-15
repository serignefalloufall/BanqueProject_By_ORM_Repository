<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="region")
 */

class Region
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
        private $nom;

        /**
         * One region has many agences. This is the inverse side.
         * @ORM\OneToMany(targetEntity="Agence", mappedBy="agence_id")
         */
        private $agences;


        //Definition des constructeur
        public function __construct()
        {
                $this->agences = new ArrayCollection();
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
         * Get the value of nom
         */
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get one region has many agences. This is the inverse side.
         */
        public function getAgences()
        {
                return $this->agences;
        }

        /**
         * Set one region has many agences. This is the inverse side.
         *
         * @return  self
         */
        public function setAgences($agences)
        {
                $this->agences = $agences;

                return $this;
        }
}
