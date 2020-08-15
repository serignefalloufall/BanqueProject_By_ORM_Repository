<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="typecompte")
 */


class Typecompte
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
        private $libelle;

        /**
         * One type_compte has many comptes. This is the inverse side.
         * @ORM\OneToMany(targetEntity="Compte", mappedBy="type_compte_id")
         */
        private $comptes;

        //Definition des constructeur
        public function __construct()
        {
                $this->comptes = new ArrayCollection();
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
         * Get the value of libelle
         */
        public function getLibelle()
        {
                return $this->libelle;
        }

        /**
         * Set the value of libelle
         *
         * @return  self
         */
        public function setLibelle($libelle)
        {
                $this->libelle = $libelle;

                return $this;
        }
}
